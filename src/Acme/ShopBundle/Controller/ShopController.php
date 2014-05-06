<?php

namespace Acme\ShopBundle\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use Acme\DemoBundle\Entity\Client;

class ShopController extends ShopMainController {

    public function indexAction() {
        $this->data['name'] = 'Shoes';
//        $this->data['ajax_request_path']=$this->generateUrl('calc_path', 
//                array('slug' => 'my-blog-post'), true);
        return $this->render('AcmeShopBundle:Shop:index.html.twig', $this->data); // 
    }

    public function calcShopsAction() {
        $this->data['page_title'] = 'Shoes';
        $this->data['client_id'] = 8;
        $this->data['my_name'] = 'Hristo';


        // create a JSON-response with a 200 status code
        $response = new Response(json_encode($this->data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
        // return $this->render('AcmeShopBundle:Shop:index.html.twig', $this->data); // 
    }

    public function insertClientAction() {
        $client = new Client();
        $client->setFirstName('Dimitar');
        $client->setLastName('Ivanov');
        $client->setEmail('divanov@yahoo.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($client);
        $em->flush();
        return new Response('Created product id ' . $client->getId());
    }

    public function loadClientByIdAction($id) {
        $client = $this->getDoctrine()
                        ->getRepository('AcmeDemoBundle:Client')->find($id);
        if (!$client) {
            throw $this->createNotFoundException(
                    'No product found for id ' . $id);
        }
        return new Response('Client first name is: ' . $client->getFirstName());
// ... do something, like pass the $product object into a template
    }

}
