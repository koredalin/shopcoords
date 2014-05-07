<?php

namespace Acme\ShopBundle\Model;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ShopBundle\Service\ClientService;
use Acme\ShopBundle\Entity\Client;
use Acme\ShopBundle\Entity\Shop;
use Symfony\Component\HttpFoundation\Request;

class MyCalculator {

    private $longitude = 0;
    private $latitude = 0;
    private $radius = 0;
    private $controller = null;

    public function __construct() {
        //$this->controller= new Controller();
    }

    public function findShopsPhp(Array $valid_data, $shops) {
        $client_longitude = $valid_data['longitude'];
        $client_latitude = $valid_data['latitude'];
        $radius = $valid_data['radius'];
        $in_range = array();
        foreach ($shops as $key => $shop) {
            $long_distance = abs($client_longitude - $shop['longitude']);
            $lati_distance = abs($client_latitude - $shop['latitude']);
            $dist = round(sqrt($long_distance * $long_distance + $lati_distance * $lati_distance), 2);
            $shop['distance'] = $dist;
            if ($dist < $radius) {
                $in_range[] = $shop;
            }
        }

        return $in_range;
    }

    public function findShopsMySQL(Array $valid_data) {
        $client_longitude = $valid_data['longitude'];
        $client_latitude = $valid_data['latitude'];
        $radius = $valid_data['radius'];

        try {
            $user='shopcoord';
            $password='scd'; 
            # MySQL with PDO_MYSQL
            $conn = new \PDO("mysql:host=127.0.0.1;dbname=shopcoords", $user, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $query_shops = $conn->query(
                "SELECT * "
                . "FROM `Shop`"
                . "WHERE ");
        
        $shops = $query_shops->fetchAll(\PDO::FETCH_ASSOC);

        var_dump($shops);
        exit;
        return $in_range;
    }

    public function validateEntries(Request $request) {
        $post_vars = $request->request->all();
        foreach ($post_vars as $key => $value) {
            if ($key === 'search_option' && ($value === 'search_with_php' || $value === 'search_with_mysql')) {
                continue;
            }
            if (!is_numeric($value)) {
                return array('error' => 'Error: Insert only numbers - please!');
//                throw new \Exception('Error: Insert only numbers - please!');
            }
        }

        $request_data = $request->request->all();
        foreach ($request_data as $key => $value) {
            if ($key !== 'search_option') {
                $request_data[$key] = intval(trim($value));
                if ($key === 'radius' || $key === 'client_id') {
                    $request_data[$key] = abs($value);
                }
            }
        }

        return $request_data;
    }

}

/*
//$request_data['client']= $this->loadClientByIdAction($request_data['client_id']);
        
        $client_name=$this->get('acme_shop.client')->loadClientByIdAction($request_data['client_id']);
 
/**/