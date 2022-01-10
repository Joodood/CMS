<?php


class Posts extends Controller {

    public function __construct() {
        //check to see if the session user id is there, if it is, that means were logged in
        if(!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');

    }


    public function index() {
        //Get posts
        $posts = $this->postModel->getPosts();
        $data = ['posts'=>$posts];

        $this->view('posts/index', $data);
    }

    public function add() {
        //load the view

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //require_once "PostValidator.php
            require_once "PostValidate.php";
            $guy = new ValidatePost($_POST);
            $err = $guy->validateBlogForm();
//            print_r($err);
            if(in_array("body cannot be empty", $err)){
                $this->view('posts/add', $err);
            } elseif (in_array("title cannot be empty", $err)) {
                $this->view('posts/add', $err);
            } else {
                //push the session_id onto $err
//                array_push($err, $_SESSION['user_id']);
                //Validated
                //SUCCESSFULL
                $this->postModel->addPost($err);
//                $this->view('posts');
                redirect('posts');
            }

        } else {
            $this->view('posts/add');
        }
        $data = [
            'title'=> '',
            'body' => ''
        ];
        $this->view('posts/add', $data);
    }

    public function show($id) {
        //id is of type array, it looks like Array([0]=>16) array
        $post = $this->postModel->getPostById($id[0]);

        $data = ['post'=> $post,
        ];

        $this->view('posts/show', $data);
    }
}
















?>