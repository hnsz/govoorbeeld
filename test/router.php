<?php

class RouterTest extends PHPUnit_Framework_TestCase
{
    public function testRoutingTable() {
       $this->assertTrue(is_readable(Router::filename));
       $json = file_get_contents(Router::filename);
       $data = json_decode($json, true);
       $this->assertTrue(is_array($data));
       $this->assertGreaterThanOrEqual(1, count($data));
       
    }
    /*
     * @depends testRoutingTable 
    */
    public function testGetRoute() {
	$r = new Router();
        $route = $r->getRoute("/");
        
        $this->assertInstanceOf(Route::class, $route);
        $this->assertEquals($route->uri, '/');
        $this->assertEquals($route->controller, 'default');
        $this->assertEquals($route->model, 'default');
        $this->assertEquals($route->view, 'default');
        

    }
}
