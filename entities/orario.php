<?php

class OrarioEntity {
    public $idorario;
    public $giornosettimana;
    public $ora;
    public $attivo;

    public static function Lista() {
        try {

            $query = MySQL::getInstance()->query("SELECT * FROM orario");
            $result = $query->fetchAll();

            foreach ($result as $row) {
                $orari[$row['idorario']] = new OrarioEntity();
                $orari[$row['idorario']]->idorario = $row['idorario'];
                $orari[$row['idorario']]->giornosettimana = $row['giornosettimana'];
                $orari[$row['idorario']]->ora = $row['ora'];
                $orari[$row['idorario']]->attivo = $row['attivo'];
            }

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }

        return $orari;
    }

    public static function OrarioAttivo($or, $id) {
        if($or[$id]->attivo == 1) {
            echo "checked";
        } else {
            echo "";
        }
    }
}
