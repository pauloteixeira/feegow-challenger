<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Helpers\ApiHelper;

class FeegowApiController extends Controller {
    private $api;

    public function listSpecialties(Request $request) {
        $this->api          = new ApiHelper(); 
        $this->api->header  = ["x-access-token" => env("FEEGOW_API_TOKEN"), "Content-Type" => "application/json"];
        $this->api->url     = env("FEEGOW_URL_LISTA_ESPECIALIDADES");
        $response           = $this->api->get();
        $contents           = json_decode($response->getBody()->getContents());
        $result             = false;

        if( property_exists($contents, "success") && $contents->success == true )
            $result = $contents->content;
        
        return $result;
    }

    public function listProfessionals(Request $request) {
        $especialidade_id    = $request->post("especialidade_id");
        $this->api          = new ApiHelper(); 
        $this->api->header  = ["x-access-token" => env("FEEGOW_API_TOKEN"), "Content-Type" => "application/json"];
        $this->api->url     = env("FEEGOW_URL_LISTA_PROFISSIONAIS") . "?especialidade_id={$especialidade_id}&ativo=1";
        $response           = $this->api->get();
        $contents           = json_decode($response->getBody()->getContents());
        $result             = false;

        if( property_exists($contents, "success") && $contents->success == true )
            $result = $contents->content;
        
        return $result;
    }

    public function listPatiantSource(Request $request) {
        $this->api          = new ApiHelper(); 
        $this->api->header  = ["x-access-token" => env("FEEGOW_API_TOKEN"), "Content-Type" => "application/json"];
        $this->api->url     = env("FEEGOW_URL_LISTA_PATIENT_SOURCE");
        $response           = $this->api->get();
        $contents           = json_decode($response->getBody()->getContents());
        $result             = false;

        if( property_exists($contents, "success") && $contents->success == true )
            $result = $contents->content;
        
        return $result;
    }
}