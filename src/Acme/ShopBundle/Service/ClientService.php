<?php

namespace Acme\ShopBundle\Service;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientService extends Controller {

    protected $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

//    public function addProduct($product) {
//        //Get the array, hydrate the entity and save it, at last.
//        //...
//        $entity = new Product();
//        //...
//        $this->entityManager->persist($entity);
//        $this->entityManager->flush($entity);
//        return $entity;
//
//    }
    
    

}