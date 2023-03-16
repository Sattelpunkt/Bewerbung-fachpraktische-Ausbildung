<?php


class Gebinde
{

    public function getAll()
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT * FROM gebinde");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe;
    }

    public function insertNew($name)
    {

        $query = "INSERT INTO gebinde (name)
				VALUES ('" . $name . "')";
        $return = $GLOBALS["DB"]->dbquery($query);
        if ($return == false) {
            return false;
        }
        if ($return == true) {
            return true;
        }

    }

    public function deleteByID($id)
    {

        //$query = "DELETE FROM inhalt  WHERE id=".$inhaltsID;
        $update = $GLOBALS["DB"]->dbquery("DELETE FROM gebinde  WHERE id='" . $id . "'");
        if ($update == true) {
            return true;
        } else {
            return false;
        }

    }

    public function updateGebindeAfterDeleteGebinde($id)
    {
        $temp = $GLOBALS["DB"]->dbquery("SELECT id FROM einkauf WHERE gebinde ='" . $id . "'");
        $result = $GLOBALS["DB"]->dbmakearry($temp);
        if ($temp->num_rows == 0) {
            return true;
        }
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {
                $update = $GLOBALS["DB"]->dbquery("UPDATE einkauf SET gebinde=1
                       WHERE id='" . $result[$i]["id"] . "'");
            }
            return true;
        } else {
            return true;
        }

    }

    public function getAllbyID($id)
    {

        $temp = $GLOBALS["DB"]->dbquery("SELECT * FROM gebinde WHERE id ='" . $id . "'");
        if ($temp->num_rows == 0) {
            return false;
        }
        $result = $GLOBALS["DB"]->dbmakearry($temp);
        return $result;

    }

    public function getUpdateByID($id)
    {

        $name = $_POST['name'];
        $update = $GLOBALS["DB"]->dbquery("UPDATE gebinde SET name='" . $name . "'
                       WHERE id='" . $id . "'");
        if ($update == true) {
            return true;
        } else {
            return false;
        }

    }


}