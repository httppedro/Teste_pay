<?php

class AuthControllerTest extends \Laravel\Lumen\Testing\TestCase
{

        public function createApplication()
        {
            return require './bootstrap/app.php';
        }


        public function testprovidercerto()
        {
            $request = $this->post(route('authenticate', ['provider' => 'teste de rota']));

            $request->assertResponseStatus(422);
            $request->seeJson(['errors' => ['main' => 'erro de parametro']]);
        }

        public function testUserOn()
        {

        }
}
