<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Center;
use Illuminate\Http\Request;

use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Base\Coordinate;
use Ivory\GoogleMap\Base\Size;

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
            'width'  => '700px',
            'height' => '500px',
        ));


        return view('centers.show', compact(['center', 'comments', 'images', 'map', 'mapHelper', 'apiHelper']));
    }


}
