<?php

class Todo extends Controller {
    
        function __construct() {
            parent::__construct(get_class());
        }
        
        function get($soggetto) {
            if($soggetto == 'dottoressa') {
                $tabella = "todo_dottoressa";
            } else {
                $tabella = "todo_collaboratrice";
            }
            $todos = TodoEntity::Lista($tabella);
            include("views/todo.php");
        }  
        
}

/* -------------------------------------------------
 *                      ADD
 * -------------------------------------------------
 */

class TodoAdd extends Controller {
    function __construct() {
        parent::__construct(get_class());
    }

    function post($soggetto) {

        $errors = [];

        if (isset($_POST['todo']) && strlen(trim($_POST['todo'])) > 0) {
            $todo = Utilita::PULISCISTRINGA($_POST['todo']);
        } else {
            $errors[] = 'Todo non passato';
        }

        if($soggetto == 'dottoressa') {
            $tabella = "todo_dottoressa";
        } else {
            $tabella = "todo_collaboratrice";
        }

        if(empty($errors)) {

            if(!TodoEntity::Add($tabella, $todo)) {
                $errors[] = 'Errore inserimento nella base dati';
            } else {
                Flashmessage::ADD(Autaut::LOGGATO(), 'home', 'ok', 'Aggiunto', 'SUCCESS');
            }
        }

        if(!empty($errors)) {
            foreach($errors as $testo) {
                Flashmessage::ADD(Autaut::LOGGATO(), 'home', 'Attenzione', $testo, 'ALERT');
            }
        }

        // Rinvia alla pagina
        header("Location: /");
    }
}

/* -------------------------------------------------
 *                      DELETE
 * -------------------------------------------------
 */

class TodoDelete extends Controller {
    
    function __construct() {
        parent::__construct(get_class());
    }

    function post($soggetto) {

        $errors = [];

        if (isset($_POST['id']) && strlen(trim($_POST['id'])) > 0) {
            $id = Utilita::PULISCISTRINGA($_POST['id']);
        } else {
            $errors[] = 'ID non passato';
        }

        if($soggetto == 'dottoressa') {
            $tabella = "todo_dottoressa";
        } else {
            $tabella = "todo_collaboratrice";
        }

        if(empty($errors)) {

            if(!TodoEntity::DELETE($tabella, $id)) {
                $errors[] = 'Errore inserimento nella base dati';
            } else {
                Flashmessage::ADD(Autaut::LOGGATO(), 'home', 'ok', 'cancellato', 'SUCCESS');
            }
        }

        if(!empty($errors)) {
            foreach($errors as $testo) {
                Flashmessage::ADD(Autaut::LOGGATO(), 'home', 'Attenzione', $testo, 'ALERT');
            }
        }

        // Rinvia alla pagina
        header("Location: /");
    }

    function get($soggetto, $id) {
        
        if($soggetto == 'dottoressa') {
            $tabella = "todo_dottoressa";
        } else {
            $tabella = "todo_collaboratrice";
        }

        $todo = TodoEntity::ID($tabella, $id);

        $messaggio = "Attenzione";
        $elemento = "Cancellare #".$todo['id'].": ".Utilita::DB2HTML($todo['descrizione'])." ?";
        $linkAnnulla = "/";

        include("views/tododelete.php");
    }
}

/* -------------------------------------------------
 *                      MODIFY
 * -------------------------------------------------
 */

class TodoModify extends Controller {
    
    function __construct() {
        parent::__construct(get_class());
    }

    function post($soggetto) {
        
        $errors = [];

        if (isset($_POST['id']) && strlen(trim($_POST['id'])) > 0) {
            $id = Utilita::PULISCISTRINGA($_POST['id']);
        } else {
            $errors[] = 'ID non passato';
        }

        if (isset($_POST['todo']) && strlen(trim($_POST['todo'])) > 0) {
            $todo = Utilita::PULISCISTRINGA($_POST['todo']);
        } else {
            $errors[] = 'Todo non passato';
        }

        if($soggetto == 'dottoressa') {
            $tabella = "todo_dottoressa";
        } else {
            $tabella = "todo_collaboratrice";
        }

        if(empty($errors)) {

            if(!TodoEntity::MODIFY($tabella, $id, $todo)) {
                $errors[] = 'Errore modifica base dati';
            } else {
                Flashmessage::ADD(Autaut::LOGGATO(), 'home', 'ok', 'Modificato', 'SUCCESS');
            }
        }

        if(!empty($errors)) {
            foreach($errors as $testo) {
                Flashmessage::ADD(Autaut::LOGGATO(), 'home', 'Attenzione', $testo, 'ALERT');
            }
        }

        // Rinvia alla pagina
        header("Location: /");
    }

    function get($soggetto, $id) {
        
        if($soggetto == 'dottoressa') {
            $tabella = "todo_dottoressa";
        } else {
            $tabella = "todo_collaboratrice";
        }

        $todo = TodoEntity::ID($tabella, $id);
        $linkAnnulla = "/";
        include("views/todomodify.php");
    }
}

