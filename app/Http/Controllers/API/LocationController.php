<?php

namespace App\Http\Controllers\API;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{

    public function mapMarker()
    {
        $locations = Location::all();
        $map_markes = array ();
        foreach ($locations as $key => $location) {
            $map_markes[] = (object)array(
                'location_title' => $location->location_title,
                'coords_lat' => $location->coords_lat,
                'coords_lng' => $location->coords_lng,
                'number' => $location->number,
                'location_email' => $location->location_email,
                'addressline1' => $location->addressline1,
                'addressline2' => $location->addressline2,
                'city' => $location->city,
                'country' => $location->country,
            );
        }
        return response()->json($map_markes);
    }

    public function getLocation(Request $request){
        $closer = array(
            "place" => "",
            "coords" => "",
            "id" => ""
        );
        $model = Location::all();
        $coord = 0;
        foreach ($model as $item) {
            $dist = $this->lat_long_dist_of_two_points($request->lat,$request->lng,$item->coords_lat,$item->coords_lng);

            if($coord > $dist){
                $coord = $dist;
                $closer["place"] = $item->location_title;
                $closer["coords"] = $item->coords_lat.",".$item->coords_lng;
                $closer["id"] = $item->id;
            }
            elseif ($coord == 0){
                $coord = $dist;
                $closer["place"] = $item->location_title;
                $closer["id"] = $item->id;
            }
        }
        return response()->json($closer);

    }

    public function lat_long_dist_of_two_points($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo){
        $longitudeTo = floatval($longitudeTo);
        $latitudeTo = floatval($latitudeTo);
        $pi = pi();
        $x = sin($latitudeFrom * $pi/180) *
        sin($latitudeTo * $pi/180) +
        cos($latitudeFrom * $pi/180) *
        cos($latitudeTo * $pi/180) *
        cos(($longitudeTo * $pi/180) - ($longitudeFrom * $pi/180));
        $x = atan((sqrt(1 - pow($x, 2))) / $x);
        return abs((1.852 * 60.0 * (($x/$pi) * 180)) / 1.609344);
    }
    // Distance from New York to London
//    echo lat_long_dist_of_two_points(40.7127, 74.0059, 51.5072, 0.1275).' mi'."\n";

}
