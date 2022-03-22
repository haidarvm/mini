<?php

namespace Mini\Controller;

use Mini\Model\Posts;
// use Mini\Model\Postc;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\JsonResponse;
// use Symfony\Component\HttpFoundation\Request;

class NewsController {
    protected $request;
    protected $posts;
    protected $postc;
    public function __construct() {
        $this->posts = new Posts();
        // $this->postc = new Postc();
        // $this->request =  Request::createFromGlobals();
    }
    public function index() {
        $data['number'] = rand(1, 7050);
        // $data['post'] = $this->posts->getPost($data['number'])->data;
        $data['post'] = $this->postc->getPostc($data['number']);
        // var_dump($data['post']);
        view('template/header.php');
        view('template/menu.php');
        view('news_view.php', $data);
        view('template/footer.php');
    }

    public function req() {
        $all = $this->request->request->all(); // form body
        // echo $all['name'];
        $content = $this->request->getContent();
        // $json = $this->request->toArray(); // if json
        // echo $json['name'];
        // $decode_content = json_decode($content); // for json raw body
        $response = new JsonResponse($all);
        return $response->send();
    }

    public function hello() {
        $response = new JsonResponse(['Hello' => "World"]);
        return $response->send();
    }

    # response to json symfony
    public function sjson() {
        $number = rand(1, 7050);
        $data = $this->posts->getPost($number)->data;
        $response = new JsonResponse($data);
        return $response->send();
    }

    public function json() {
        $number = rand(1, 7050);
        $data['number'] = $number;
        $data['data'] = $this->posts->getPosts($number)->data;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function jsonc() {
        $number = rand(1, 7050);
        $data['number'] = $number;
        $data['data'] = $this->postc->getPostc($number);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function one($id) {
        $post = $this->posts->getPostOne($id)->data;
        header('Content-Type: application/json');
        echo json_encode($post);
    }
}
