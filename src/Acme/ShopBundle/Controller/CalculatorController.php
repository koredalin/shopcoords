<?php

namespace Acme\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\BrowserKit\Request;
use Acme\ShopBundle\Model\MyCalculator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CalculatorController extends Controller {

    protected $data = array();

    public function __construct() {
        $this->data['page_title'] = 'Търсене магазини';
    }

    public function indexAction() {
//        $this->data['ajax_request_path']=$this->generateUrl('calc_path', 
//                array('slug' => 'my-blog-post'), true);
        return $this->render('AcmeShopBundle:Calculator:index.html.twig', $this->data); // 
    }

    public function calculateShopsByCoordinatesAction(Request $request) {

        $calculator = new MyCalculator();

        $valid_data = $calculator->validateEntries($request);
        if (isset($valid_data['error'])) {
            $this->data['error'] = $valid_data['error'];
            $response = new Response(json_encode($this->data));
            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }

        $this->data['client_name'] = $this->get('acme_shop.client')->
                    loadClientByIdAction($valid_data['client_id']);
        
        if ($valid_data['search_option'] === 'search_with_php') {
            $shops = $this->get('acme_shop.shop')->getWholeTable();
            $this->data['calculator_response'] = $calculator->findShopsPhp($valid_data, $shops);
        } else {
            $this->data['calculator_response'] = $calculator->findShopsMySQL($valid_data);
        }
        // create a JSON-response with a 200 status code
        $response = new Response(json_encode($this->data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function insertClientAction() {
        $client = new Client();
        $client->setFirstName('Dimitar');
        $client->setLastName('Iliev');
        $client->setEmail('diliev@yahoo.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($client);
        $em->flush();
        return new Response('Created product id ' . $client->getId());
    }

}
