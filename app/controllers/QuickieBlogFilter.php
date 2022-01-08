<?php


class Quickie {
    protected $final;
    protected $data;
    public function __construct($value) {
        $this->data = $value;
        switch($this->data) {
            case is_int($this->data):
                $this->final = filter_var($this->data, FILTER_SANITIZE_NUMBER_INT);
                return $this->final;
                break;
            default:
                $this->final = filter_var($this->data, FILTER_SANITIZE_STRING);
                $this->final = filter_var($this->data, FILTER_SANITIZE_SPECIAL_CHARS);
                return $this->final;
        }
    }
}

public function quick($data) {
    if(is_int($data)) {

    }
}





?>