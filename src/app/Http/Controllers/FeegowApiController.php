<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class FeegowApiController extends Controller {
    use \App\Http\Helpers\ApiHelper;
    
    public function listSpecialties(Request $request) {
        $this->header  = ["x-access-token" => env("FEEGOW_API_TOKEN"), "Content-Type" => "application/json"];
        $this->url     = env("FEEGOW_URL_LISTA_ESPECIALIDADES");
        $response           = $this->get();
        $contents           = json_decode($response->getBody()->getContents());
        $result             = false;

        if( property_exists($contents, "success") && $contents->success == true )
            $result = $contents->content;
        
        return $result;
    }

    public function listProfessionals(Request $request) {
        $especialidade_id    = $request->post("especialidade_id");
        $this->header  = ["x-access-token" => env("FEEGOW_API_TOKEN"), "Content-Type" => "application/json"];
        $this->url     = env("FEEGOW_URL_LISTA_PROFISSIONAIS") . "?especialidade_id={$especialidade_id}&ativo=1";
        $response           = $this->get();
        $contents           = json_decode($response->getBody()->getContents());
        $result             = false;

        if( property_exists($contents, "success") && $contents->success == true )
            $result = $contents->content;
        
        return $result;
    }

    public function listPatiantSource(Request $request) {
        $this->header  = ["x-access-token" => env("FEEGOW_API_TOKEN"), "Content-Type" => "application/json"];
        $this->url     = env("FEEGOW_URL_LISTA_PATIENT_SOURCE");
        $response           = $this->get();
        $contents           = json_decode($response->getBody()->getContents());
        $result             = false;

        if( property_exists($contents, "success") && $contents->success == true )
            $result = $contents->content;
        
        return $result;
    }
}