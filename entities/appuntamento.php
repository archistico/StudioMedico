<?php

class AppuntamentoEntity {
    public $idapp;
    public $data;
    public $fkorario;
    public $nome;
    public $note;
    public $cancellato;

    //`idapp`, `data`, `fkorario`, `nome`, `note`, `cancellato`

    public static function Lista() {
        $apps = [];

        try {

            $query = MySQL::getInstance()->query("SELECT * FROM app");
            $result = $query->fetchAll();

            foreach ($result as $row) {
                $apps[$row['idapp']] = new AppuntamentoEntity();
                $apps[$row['idapp']]->idapp = $row['idapp'];
                $apps[$row['idapp']]->data = $row['data'];
                $apps[$row['idapp']]->fkorario = $row['fkorario'];
                $apps[$row['idapp']]->nome = $row['nome'];
                $apps[$row['idapp']]->note = $row['note'];
                $apps[$row['idapp']]->cancellato = $row['cancellato'];
            }

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }

        return $apps;
    }

    public static function ByData($dataselezionata) {
        $apps = [];
        
        try {

            $query = MySQL::getInstance()->query("SELECT * FROM app WHERE data = '$dataselezionata'");
            $result = $query->fetchAll();

            foreach ($result as $row) {
                $apps[$row['idapp']] = new AppuntamentoEntity();
                $apps[$row['idapp']]->idapp = $row['idapp'];
                $apps[$row['idapp']]->data = $row['data'];
                $apps[$row['idapp']]->fkorario = $row['fkorario'];
                $apps[$row['idapp']]->nome = $row['nome'];
                $apps[$row['idapp']]->note = $row['note'];
                $apps[$row['idapp']]->cancellato = $row['cancellato'];
            }

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }
        
        return $apps;
    }
}
