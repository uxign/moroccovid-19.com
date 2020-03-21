<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        
            $http = new \GuzzleHttp\Client;
            $response = $http->get('https://tram-production.com/covid-api', [
                'headers'=>[
                    'Accept' => 'application/json',
                ]
            ]);

            $json =  json_decode((string) $response->getBody(), true);
            // dd($json);
            $array=[];

            //cases
            $kk['WORLD-CASES'] = $json['WORLD-CASES'];
            $kk['WORLD-DEATHS'] = $json['WORLD-DEATHS'];
            $kk['WORLD-RECOVERED'] = $json['WORLD-RECOVERED'];
            $kk['MACASES'] = $json['MA-CASES'];
            $kk['MA-TODAY-CASES'] = $json['MA-TODAY-CASES'];
            $kk['MA-RECOVERED'] = $json['MA-RECOVERED'];
            $kk['MA-DEATHS'] = $json['MA-DEATHS'];
            $kk['MA-TODAY-DEATHS'] = $json['MA-TODAY-DEATHS'];
            $kk['MA-ACTIVE-CASES'] = $json['MA-ACTIVE-CASES'];
            $kk['MA-EXCLUDED'] = $json['MA-EXCLUDED'];
            $kk['MA-DEATHS-PERCENTAGE'] = $json['MA-DEATHS-PERCENTAGE'];
            $kk['MA-RECEOVRED-PERCENTAGE'] = $json['MA-RECEOVRED-PERCENTAGE'];
            $kk['MA-FIRST-CASE'] = $json['MA-FIRST-CASE']; 
            $kk['REGIONS'] = $json['REGIONS'];
            $kk['CONTACTS'] = $json['CONTACTS'];
            
            $array[] = $kk;

            foreach ($array as $p) {
                
            }

                // dd($p);
         
            return view('home', compact('p'));

        

        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('GET', 'https://tram-production.com/covid-api');

        // echo $response->getStatusCode(); // 200
        // echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        // echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

        // $json = json_decode(file_get_contents('https://tram-production.com/covid-api'), true);

        // return Response()->json($json['MA-CASES']);
    }
}
