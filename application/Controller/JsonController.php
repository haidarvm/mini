<?php

namespace Mini\Controller;

use Mini\Model\Post;
// use Mini\Model\Postc;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class JsonController {
    protected $request;
    protected $posts;
    protected $postc;
    public function __construct() {
        $this->post = new Post();
        // $this->postc = new Postc();
        $this->request =  Request::createFromGlobals();
    }
    public function index() {
        $data['post'] = $this->post->getAllPost();
        view('templates/header.php');
        view('home/json.php', $data);
        view('templates/footer.php');
    }

    public function datas()  {
        // print_r($this->$request->get('message'));
        $data = $this->post->getAllPost();
        $response = new JsonResponse([$data]);
        return $response->send();
    }

    public function raw() {
        $raw = json_decode($this->request->getContent(), true);
        if(!empty($raw)) {
            // print_r($raw);
            $headers = $this->request->headers->all();
            // $this->post->headers = json_encode($headers); 
            $this->post->body = json_encode($raw);
            $this->post->insert();
            $raw['message'] = "success";
        } else {
            $raw['message'] = 'empty';
        }
        $response = new JsonResponse($raw);
        return $response->send();
    }

    public function hello() {
        $response = new JsonResponse(['Hello' => "World"]);
        return $response->send();
    }

    public function geta() {
        $data['headers'] = $this->request->headers->all();
        $data['message'] = $this->request->get('message');
        print_r($data);
        $response = new JsonResponse($data);
        return $response->send();
    }
    
}
