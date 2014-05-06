<?php

namespace Acme\ShopBundle\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

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

}
