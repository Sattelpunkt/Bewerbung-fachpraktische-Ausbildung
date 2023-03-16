<?php


class Archiv
{
    public function deleteArtikelByID($id)
    {
        # Wert auf 2 setzen by id = $id
        if ($result = $GLOBALS["DB"]->dbquery("
			Update einkauf SET
			archiv = 2
			WHERE id = '" . $id . "'")
            == true) {
            return true;
        } else {
            return false;
        }
    }

    public function buyArtikelByID($id)
    {

        # Wert auf 1 setzen by id = $id
        if ($result = $GLOBALS["DB"]->dbquery("
			Update einkauf SET
			archiv = 1
			WHERE id = '" . $id . "'")
            == true) {
            return true;
        } else {
            return false;
        }

    }

    public function getAllArchiv($archiv)
    {

        $result = $GLOBALS["DB"]->dbquery("SELECT * FROM einkauf WHERE archiv =" . $archiv . " ORDER BY einkauf.last_update DESC");

        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        //dnd($ausgabe);

        for ($i = 0; $i < count($ausgabe); $i++) {

            $ausgabe[$i]['gebinde'] = $this->getGebindeNameByID($ausgabe[$i]['gebinde']);
            ///dnd($ausgabe);

            $result = $GLOBALS["DB"]->dbquery("SELECT name FROM shop WHERE id =" . $ausgabe[$i]['shop_id']);
            if ($result->num_rows == 0) {
            }
            $result = $GLOBALS["DB"]->dbmakearry($result);
            $ausgabe[$i]['shop'] = $result['0']['name'];
            $result = $GLOBALS["DB"]->dbquery("SELECT name FROM einkaufkategorien WHERE id =" . $ausgabe[$i]['kategorie_id']);
            if ($result->num_rows == 0) {
            }
            $result = $GLOBALS["DB"]->dbmakearry($result);
            $ausgabe[$i]['kategorie'] = $result['0']['name'];
        }
        //dnd($ausgabe);
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

    public function deleteArchiv($archiv)
    {
        if ($archiv == 1) {
            $query = $GLOBALS["DB"]->dbquery("Update einkauf SET
			archiv = 2
			WHERE archiv = 1");
            $update = $GLOBALS["DB"]->dbquery($query);
            //dnd($update);
        }else {
            $update = $GLOBALS["DB"]->dbquery("DELETE FROM einkauf  WHERE archiv= 2");
        }
        return true;

    }



}