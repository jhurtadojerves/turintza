<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function geography()
    {
        return view('home.geography');
    }

    public function culture()
    {
        return view('home.culture');
    }

    public function how()
    {
        $map = new Map();
        $map->setHtmlId('map');

        $map->setCenter(new Coordinate(-3.046916, -78.004640));
        $map->getOverlayManager()->addMarker(new Marker(new Coordinate(-3.046916, -78.004640)));
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


        return view('home.how', compact(['map', 'mapHelper', 'apiHelper']));
    }

    public function redirect() {
        return redirect(route('news.index'), 301);
    }

}
