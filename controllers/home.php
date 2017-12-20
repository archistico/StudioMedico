<?php

class Home extends Controller {
    function __construct() {
        parent::__construct(get_class());
    }

    function get() {
        
        $todosDottoressa = TodoEntity::Lista('todo_dottoressa');
        $todosCollaboratrice = TodoEntity::Lista('todo_collaboratrice');
        include("views/home.php");
    }
}