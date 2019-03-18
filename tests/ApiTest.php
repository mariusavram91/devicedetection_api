<?php

class ApiTest extends TestCase
{
    /**
     * A basic Api test for GET method.
     *
     * @return void
     */
    public function testApi()
    {
        $this->get('/');

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
}
