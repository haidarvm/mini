<?php

namespace Mini\Controller;

// use Mini\Model\Posts;
// use Mini\Model\Postc;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class JsonController {
    protected $request;
    protected $posts;
    protected $postc;
    public function __construct() {
        // $this->posts = new Posts();
        // $this->postc = new Postc();
        $this->request =  Request::createFromGlobals();
    }
    public function index() {
        $message = $this->request->get('message');
        // print_r($this->$request->get('message'));
        $response = new JsonResponse([$message]);
        return $response->send();
    }

    public function raw() {
        $raw = json_decode($this->request->getContent(), true);
        $raw['pesan'] = "berhasil";
        $response = new JsonResponse($raw);
        return $response->send();
    }

    public function hello() {
        $response = new JsonResponse(['Hello' => "World"]);
        return $response->send();
    }

    
}
