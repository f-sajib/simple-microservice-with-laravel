<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{


    /**
     * Find match for specific division by given latitude and longitude
     * @param Request $request
     * @return Application|Factory|View
     * @throws FileNotFoundException
     */
    public function task2(Request $request)
    {
        $api_key = env('GOOGLE_API_KEY');
        $sheets = [
//            [
//                'id' => '1AWJebYApWjJZ985Cxi7sIVHctvdLC7UPBDilPOuUXdo',
//                'name' => 'TestDataSets'
//            ],
            [
                'id' => '1AWJebYApWjJZ985Cxi7sIVHctvdLC7UPBDilPOuUXdo',
                'name' => 'Dhaka'
            ],
            [
                'id' => '1AWJebYApWjJZ985Cxi7sIVHctvdLC7UPBDilPOuUXdo',
                'name' => 'Chattogram'
            ],
            [
                'id' => '1AWJebYApWjJZ985Cxi7sIVHctvdLC7UPBDilPOuUXdo',
                'name' => 'Rajshahi'
            ],

        ];
        $data = [];
        foreach ($sheets as $sheet) {
            $file_name = $sheet['name'].'.json';
            if(!file_exists(public_path('storage/'.$sheet['name'].'.json'))) {
                $url = sprintf('https://sheets.googleapis.com/v4/spreadsheets/'.$sheet['id'].'/values/'.$sheet['name'].'?key=%s',$api_key);
                $rows = json_decode(file_get_contents($url))->values;
                Storage::disk('public')->put($file_name, json_encode($rows));
            }

            array_push($data,[
                'sheet' => $sheet['name'],
                'value' => json_decode(Storage::disk('public')->get($file_name))
            ]);
        }


        $lat = $request->lat ?: null;
        $lng = $request->lng ?: null;
        $result[0] = [false];

        if($lat && $lng) {
            $result[0] = [true];
            foreach ($data as $key => $value) {
                foreach ($value['value'] as $location) {
                    if($location[0] == $lat && $location[1] == $lng) {
                        array_push($result,[
                            'division' => $value['sheet'],
                            'lat' => $lat,
                            'lng' => $lng
                        ]);
                        break;
                    }
                }
            }
        }
        return view('task2',compact('result'));
    }

    /**
     * Rotate a 2d array into 90degree
     * @return array
     */
    public function task4()
    {
        $matrix = [[1,2,3],[4,5,6],[7,8,9]];
        $input_matrix = $matrix;

        array_unshift($matrix, null);

        $matrix = call_user_func_array('array_map', $matrix);

        $matrix = array_map('array_reverse', $matrix);

        return [
            'Input' => $input_matrix,
            'Output' => $matrix
        ];
    }
}
