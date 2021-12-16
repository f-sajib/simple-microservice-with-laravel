<?php

namespace App\Services;

use App\Traits\ConsumeService;

Class RegistrationService {

    use ConsumeService;

    public $baseUri;

    public function __construct(){
        $this->baseUri = config('services.registration.base_uri');
    }

    public function registerUser($data){
        return $this->performRequest('POST', '/api/register', $data);
    }

}
