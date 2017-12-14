<?php

class Home extends Controller {
    function __construct() {
        parent::__construct(get_class());
    }

    function get() {
        $todos = TodoEntity::Lista();
        include("views/home.php");
    }
}