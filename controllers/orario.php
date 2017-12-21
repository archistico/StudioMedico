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

class OrarioData {
    function get_xhr($dataselezionata) {
        $dataselezionata = substr($dataselezionata, 0, 4)."-".substr($dataselezionata, 4, 2)."-".substr($dataselezionata, 6, 2);

        $orari = OrarioEntity::Lista();
        $appuntamenti = AppuntamentoEntity::ByData($dataselezionata);

        if($appuntamenti == null) {
            echo json_encode(array("orari" => $orari ));    
        } else {
            echo json_encode(array("orari" => $orari, "appuntamenti" => $appuntamenti ));
        }        
    }

    function get($dataselezionata) {
        $dataselezionata = substr($dataselezionata, 0, 4)."-".substr($dataselezionata, 4, 2)."-".substr($dataselezionata, 6, 2);

        $orari = OrarioEntity::Lista();
        $appuntamenti = AppuntamentoEntity::ByData($dataselezionata);

        if($appuntamenti == null) {
            echo json_encode(array("orari" => $orari ));    
        } else {
            echo json_encode(array("orari" => $orari, "appuntamenti" => $appuntamenti ));
        }        
    }

}