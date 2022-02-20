<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;
// use Mini\Model\Song;
use Mini\Model\Posts;

class HomeController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        view('_templates/header.php');
        view('home/index.php');
        view('_templates/footer.php');

    }

    public function hello() {
        echo 'Hello World';
    }

    public function news() {
        $data['number'] = rand(1, 7050);
        $posts = new Posts();
        $data['post'] = $posts->getPost($data['number'])->data;
        // var_dump($data['post']);
        view('template/header.php');
        view('template/menu.php');
        view('news_view.php', $data);
        view('template/footer.php');
    }

    public function news_json() {
        $number = rand(1, 7050);
        $posts = new Posts();
        $post = $posts->getPost($data['number'])->data;
        header('Content-Type: application/json');
        echo json_encode($post);
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        view('_templates/header.php');
        view('home/example_one.php');
        view('_templates/footer.php');
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        view('_templates/header.php');
        view('home/example_two.php');
        view('_templates/footer.php');
    }
}
