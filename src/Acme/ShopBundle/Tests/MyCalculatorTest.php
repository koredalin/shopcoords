<?php

namespace Acme\ShopBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MyCalculatorTest extends WebTestCase {

    public function testIndex() {
        $client = parent::createClient();

        // Submit a raw JSON string in the request body
        $crawler=$client->request(
                'POST', 'http://localhost/sc231/web/app_dev.php/calc/searchShops', array(), array(), array('CONTENT_TYPE' => 'application/json'), 
                '{"longitude":100000, "latitude":100000, "radius":100, "client_id":2, "search_option":"search_with_php"}'
        );

        // Assert that the "Content-Type" header is "application/json"
        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 
                        'application/json'
                )
        );
        
        // Checks result
        $this->assertRegExp('/"distance":31.62/', $client->getResponse()->getContent());
    }

}