<?php
namespace App\Http\Helpers;

use \GuzzleHttp\Exception\GuzzleException;
use \GuzzleHttp\Client;

trait ApiHelper {
    public $header;
    public $body;
    public $url;
    public $client;
    public $baseUri;

    public function client() {
        if( $this->client instanceof Client ) return $this->client;

        $this->client = new Client();
    }

    public function get() {
        if( true == empty($this->url) ) throw new \Exception("Atributo URL é obrigatório.");
        if( true == empty($this->header) ) $this->header = [];
        if( false == $this->client instanceof Client ) $this->client();

        return $this->client->get($this->url, ["headers" => $this->header]);
    }

    public function post() {
        if( true == empty($this->url) ) throw new \Exception("Atributo URL é obrigatório.");
        if( true == empty($this->header) ) $this->header    = [];
        if( true == empty($this->body) ) $this->body        = null;
        if( false == $this->client instanceof Client ) $this->client();

        return $this->client->post($this->url,["headers" => $this->header, $this->body]);
    }
}