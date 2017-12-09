<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Center;
use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;

use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Base\Coordinate;

use Ivory\GoogleMap\Control\ControlPosition;
use Ivory\GoogleMap\Control\ZoomControl;
use Ivory\GoogleMap\Control\ZoomControlStyle;

use Ivory\GoogleMap\Control\ScaleControl;
use Ivory\GoogleMap\Control\ScaleControlStyle;

use Ivory\GoogleMap\Overlay\Marker;
use Ivory\GoogleMap\Helper\Builder\ApiHelperBuilder;
use Ivory\GoogleMap\Helper\Builder\MapHelperBuilder;


class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::paginate();

        return view('centers.index', compact('centers'));
    }

    public function show(Center $center, $slug) {
        if ($center->slug != $slug) {
            \Alert::info("El centro turístico $center->name se movió permanentemente a esta dirección");
            return redirect($center->url, 301);
        }
        $comments = Comment::where('center_id', '=', $center->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        $images = $center->images()->get();
        $map = new Map();
        $map->setHtmlId('map');

        $map->setCenter(new Coordinate($center->geolocation));
        $map->getOverlayManager()->addMarker(new Marker(new Coordinate($center->geolocation)));
        $map->setMapOption('zoom', 9);

        $zoomControl = new ZoomControl(
            ControlPosition::TOP_LEFT,
            ZoomControlStyle::DEFAULT_
        );

        $scaleControl = new ScaleControl(
            ControlPosition::BOTTOM_LEFT,
            ScaleControlStyle::DEFAULT_
        );

        $map->getControlManager()->setZoomControl($zoomControl);
        //$map->getControlManager()->setScaleControl($scaleControl);

        $mapHelper = MapHelperBuilder::create()->build();
        $apiHelper = ApiHelperBuilder::create()
            ->setKey('AIzaSyCSlaE2htDqFC-acT2vS_nXdlFClj12KU8')
            ->setLanguage('es')
            ->build();
        $map->setStylesheetOptions(array(
            'max-width'  => '700px',
            'height' => '500px',
        ));


        return view('centers.show', compact(['center', 'comments', 'images', 'map', 'mapHelper', 'apiHelper']));
    }

    public function edit(Center $center, $slug){
        $this->authorize('create', Center::class);

        if ($center->slug != $slug) {
            \Alert::info("El centro turístico $center->name se movió permanentemente a esta dirección");
            return redirect(route('centers.edit', [$center, $center->slug]), 301);
        }

        return view('centers.edit', compact(['center',]));
    }

    public function update(Request $request, Center $center, $slug)
    {

        $this->authorize('create', Center::class);

        $this->validate($request, [
            'name' => 'required',
            'geolocation' => 'required',
            'owner' => 'required',
            'description' => 'required',
        ]);

        $converter = new HtmlConverter(array('strip_tags' => true));
        $description = $converter->convert($request->get('description'));
        $center->fill($request->all())
            ->update([
            'description' => $description
        ]);
        \Alert::success("El centro turístico $center->name se actualizó correctamente");
        return redirect($center->url);

    }

}
