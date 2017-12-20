<?php
class Orario {
    function get_xhr() {
        echo json_encode(array("orari" => OrarioEntity::Lista()));
    }

    /*
    function get() {
        echo json_encode(array("orari" => OrarioEntity::Lista()));
    }
    */
}