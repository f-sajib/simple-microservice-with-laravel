<?php

namespace App\Traits;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

trait ConsumeService {

    public function performRequest($method, $requestUrl, $formParams = []){
        return Http::$method($this->baseUri.$requestUrl,$formParams);
    }

}
