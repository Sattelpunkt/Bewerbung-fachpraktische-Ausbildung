<?php

class einkaufKategorien
{
    public function getAll()
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT * FROM einkaufkategorien");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe;
    }

    public function insertNew($name)
    {

        $query = "INSERT INTO einkaufkategorien (name)
				VALUES ('" . $name . "')";
        $return = $GLOBALS["DB"]->dbquery($query);
        if ($return == false) {
            return false;
        }
        if ($return == true) {
            return true;
        }

    }

    public function getAllbyID($id)
    {

        $temp = $GLOBALS["DB"]->dbquery("SELECT * FROM einkaufkategorien WHERE id ='" . $id . "'");
        if ($temp->num_rows == 0) {
            return false;
        }
        $result = $GLOBALS["DB"]->dbmakearry($temp);
        return $result;

    }

    public function getUpdateByID($id)
    {

        $name = $_POST['name'];
        $update = $GLOBALS["DB"]->dbquery("UPDATE einkaufkategorien SET name='" . $name . "'
                       WHERE id='" . $id . "'");
        if ($update == true) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteByID($id)
    {

        //$query = "DELETE FROM inhalt  WHERE id=".$inhaltsID;
        $update = $GLOBALS["DB"]->dbquery("DELETE FROM einkaufkategorien  WHERE id='" . $id . "'");
        if ($update == true) {
            return true;
        } else {
            return false;
        }

    }

    public function updateKategorie($id)
    {
        $temp = $GLOBALS["DB"]->dbquery("SELECT id FROM einkauf WHERE  kategorie_id ='" . $id . "'");
        $result = $GLOBALS["DB"]->dbmakearry($temp);
        if ($temp->num_rows == 0) {
            return true;
        }
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {
                $update = $GLOBALS["DB"]->dbquery("UPDATE einkauf SET kategorie_id=1
                       WHERE id='" . $result[$i]["id"] . "'");
            }
            return true;
        } else {
            return true;
        }

    }

    public function getStoreNameByID($id)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT name FROM shop WHERE id ='" . $id . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["name"];

    }

    public function getKategorieNameByID($id)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT name FROM einkaufkategorien WHERE id ='" . $id . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["name"];

    }

    public function getAllbyKategorieID($id)
    {


        $result = $GLOBALS["DB"]->dbquery("SELECT * FROM einkauf WHERE archiv IS NULL AND kategorie_id ='" . $id . "'");

        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        //dnd($ausgabe);
        if ($ausgabe == 0) {
            return true;
        }

        for ($i = 0; $i < count($ausgabe); $i++) {
            $ausgabe[$i]['gebinde'] = $this->getGebindeNameByID($ausgabe[$i]['gebinde']);
            $ausgabe[$i]['kategorie'] = $this->getKategorieNameByID($ausgabe[$i]['kategorie_id']);
            $ausgabe[$i]['shop'] = $this->getStoreNameByID($ausgabe[$i]['shop_id']);
        }
        return $ausgabe;
    }

    public function getGebindeNameByID($id)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT name FROM gebinde WHERE id ='" . $id . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["name"];
    }

    public function getGebindeIDByName($name)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT id FROM gebinde WHERE name ='" . $name . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["id"];
    }
}
