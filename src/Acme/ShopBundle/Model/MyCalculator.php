<?php

namespace Acme\ShopBundle\Model;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ShopBundle\Service\ClientService;
use Acme\ShopBundle\Entity\Client;
use Acme\ShopBundle\Entity\Shop;
use Symfony\Component\HttpFoundation\Request;

class MyCalculator{

    private $longitude = 0;
    private $latitude = 0;
    private $radius = 0;
    private $controller=null;


    public function __construct() {
        $this->controller= new Controller();
    }

    public function calculateShopsByCoordinates(Request $request) {
        
        
        //$request_data['client']= $this->loadClientByIdAction($request_data['client_id']);
        
        $client_name=$this->get('acme_shop.client')->loadClientByIdAction($request_data['client_id']);
        
        var_dump($client_name);
        exit;
    }

    public function validateEntries(Request $request) {
        $post_vars = $request->request->all();
        foreach ($post_vars as $key => $value) {
            if (!is_numeric($value)) {
                return array('error' => 'Error: Insert only numbers - please!');
//                throw new \Exception('Error: Insert only numbers - please!');
            }
        }
        
        $request_data=$request->request->all();
        foreach ($request_data as $key => $value) {
            $request_data[$key]= intval(trim($value));
            if ($key==='radius' || $key==='client_id') {
                    $request_data[$key]= abs($value);
            }
        }

        return $request_data;
    }

    
    
}
