<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function geojson()
    {
        $data = array(
            'title' => 'GeoJSON (Polygon) ',
            'isi' => 'bali.blade.php'
        );
    }
}

?>