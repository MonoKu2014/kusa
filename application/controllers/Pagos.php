<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

class Pagos extends CI_Controller {


    private $receiverId = 'obtener-al-crear-una-cuenta-de-cobro';
    private $secretKey  = 'obtener-al-crear-una-cuenta-de-cobro';


    public function __construct()
    {
            parent::__construct();
    }


    public function pagar()
    {
        $configuration = new Khipu\Configuration();
        $configuration->setReceiverId($this->receiverId);
        $configuration->setSecret($this->secretKey);
        //$configuration->setDebug(true);

        $client = new Khipu\ApiClient($configuration);
        $banksApi = new Khipu\Client\BanksApi($client);

        try {
            $response = $banksApi->banksGet();
            print_r($response);
        } catch (\Khipu\ApiException $e) {
            echo print_r($e->getResponseBody(), TRUE);
        }

    }


}