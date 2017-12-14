<?php

/* -------------------------------------------------
 *                      ENTITY
 * -------------------------------------------------
 */

class TodoEntity {
    public static function Add($tabella, $todo) {
        $result = false;
        try {

            $query = MySQL::getInstance()->prepare("INSERT INTO $tabella (descrizione) VALUES (:descrizione)");
            $query->bindValue(':descrizione', Utilita::HTML2DB($todo), PDO::PARAM_STR);
            $result = $query->execute();

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }

        return $result;
    }

    public static function Lista($tabella) {
        try {

            $query = MySQL::getInstance()->query("SELECT id, descrizione FROM $tabella ORDER BY id ASC");
            $todos = $query->fetchAll();

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }

        return $todos;
    }

    public static function ID($tabella, $id) {
        try {

            $query = MySQL::getInstance()->prepare("SELECT id, descrizione FROM $tabella WHERE id = :id");
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $todo = $query->fetch(PDO::FETCH_ASSOC);

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }

        return $todo;
    }

    public static function DELETE($tabella, $id) {
        $result = false;
        try {

            $query = MySQL::getInstance()->prepare("DELETE FROM $tabella WHERE id = :id");
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $result = $query->execute();

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }

        return $result;
    }

    public static function MODIFY($tabella, $id,$todo) {
        $result = false;
        try {

            $query = MySQL::getInstance()->prepare("UPDATE $tabella SET descrizione = :descrizione WHERE id = :id");
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':descrizione', Utilita::HTML2DB($todo), PDO::PARAM_STR);
            $result = $query->execute();

        }  catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }

        return $result;
    }
}
