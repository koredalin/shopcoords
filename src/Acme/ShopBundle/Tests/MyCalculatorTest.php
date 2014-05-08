<?php

namespace Acme\ShopBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShopControllerTest extends WebTestCase {

    public function testIndex() {
        $client = parent::createClient();

        // Submit a raw JSON string in the request body
        $crawler=$client->request(
                'POST', '/shop/calcShops', array(), array(), array('CONTENT_TYPE' => 'application/json'), '{"longitude":4, "latitude": 5, "radius": 7}'
        );

        // Assert that the "Content-Type" header is "application/json"
        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 'application/json'
                )
        );
        
        // Checks result
        $this->assertRegExp('/{"result":16}/', $client->getResponse()->getContent());
    }

}