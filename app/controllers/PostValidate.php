<?php


class ValidatePost {
    private $data;
    private $errors = [];
    private static $fields = ['title', 'body'];
    protected $perfpost = [];

    public function __construct($post) {
            $this->data = $post;
    }

    public function validateBlogForm() {

        foreach (self::$fields as $field) {
            if(!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validatetitle();
        $this->validatebody();
        $new = array_merge($this->errors, $this->perfpost);
        return $new;
        //validate title
        //validate body

    }
    private function validatetitle() {
        $va = trim($this->data['title']);
        $vas = htmlspecialchars($va);

        if(empty($vas)) {
            $this->addError('title', 'title cannot be empty');
        } else {
           //check type of $val title to then filter it correctly
//            require_once "QuickieBlogFilter.php";
//            $val = new Quickie($vas);
            //val is now the filtered title
            $this->addPerfPost('title', $vas);
        }
    }
    private function validatebody() {
        $va = trim($this->data['body']);
        $vas = htmlspecialchars($va);

        if(empty($vas)) {
            $this->addError('body', 'body cannot be empty');
        } else {
//            require_once "QuickieBlogFilter.php";
//            $val = new Quickie($vas);
            $this->addPerfPost('body', $vas);
        }
    }

    private function addError($key, $value) {
        $this->errors[$key] = $value;
    }

    private function addPerfPost($key, $value) {
        $this->perfpost[$key] = $value;
    }

}