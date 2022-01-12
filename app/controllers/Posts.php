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
//        print_r($data);

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

//need to know which post to edit so pass in an id
    public function edit($id) {
        //load the view

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //require_once "PostValidator.php
            require_once "PostValidate.php";
            $guy = new ValidatePost($_POST);
            $err = $guy->validateBlogForm();
            print_r($err);
            if(in_array("body cannot be empty", $err)){
                $this->view('posts/edit', $err);
            } elseif (in_array("title cannot be empty", $err)) {
                $this->view('posts/edit', $err);
            } else {
                //push the session_id onto $err
//                array_push($err, $_SESSION['user_id']);
                //Validated
                //SUCCESSFULL

//                $this->postModel->addPost($err);
                $post = $this->postModel->getPostById($id[0]);
                //
//                print_r($post);
                if($post->user_id != $_SESSION['user_id']) {
//                    echo " sorry" ;
                    redirect('posts');
                } else {
                    //add id onto the perfarray, aka err
                    $err['id'] = $id[0];

//                    array_push($err, $id[0]);
                      print_r($err);
//                    echo gettype($err);
//                    $title = $_POST['title'];
//                    $vars = get_object_vars($post);
//                    print_r($vars);
                    if($this->postModel->updatePost($err)) {
                        redirect('posts');
                    }
                }
            }

        } else {

            $post = $this->postModel->getPostById($id[0]);
            //
            if($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            } else {
            $data = [
                //we get the id from what we passed in
                'id'=>$id[0],
                //we get these from the post we just fetched
                'title'=>$post->title,
                'body'=>$post->body

            ];
            $this->view('posts/edit', $data);
            }
        }
    }





    public function show($id) {
        //id is of type array, it looks like Array([0]=>16) array
        $post = $this->postModel->getPostById($id[0]);

        $data = ['post'=> $post,
        ];

        $this->view('posts/show', $data);
    }


    public function delete($id) {
        $post = $this->postModel->getPostById($id[0]);
        //
        if($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
        }

        if(isset($_POST['Delete'])){
            print_r($_POST);
            echo "The delete key was set";
            echo '<br>';
              if($this->postModel->deletePost($id[0])) {
                  redirect('posts');
              }
        }
    }
}
















?>