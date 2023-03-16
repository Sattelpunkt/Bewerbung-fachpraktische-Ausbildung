<?php

class Einkauf
{
    public function getAll()
    {

        $result = $GLOBALS["DB"]->dbquery("SELECT * FROM einkauf WHERE archiv IS NULL ");

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

    public function getStoreAndKategorie()
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT name FROM shop");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe['shop'] = $GLOBALS["DB"]->dbmakearry($result);
        $result = $GLOBALS["DB"]->dbquery("SELECT name FROM einkaufkategorien");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe['kategorie'] = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe;

    }

    public function cleanData($data)
    {

        //dnd($data);
        $k = 0;
        for ($i = 0; $i <= 6; $i++) {
            if (!empty($data['name' . $i])) {
                $result[$k]['anzahl'] = $data['anzahl' . $i];
                $result[$k]['name'] = $data['name' . $i];
                $result[$k]['kategorie'] = $data['kategorie' . $i];
                $result[$k]['shop'] = $data['shop' . $i];
                $result[$k]['gebinde'] = $data['gebinde' . $i];
                $k++;
            }
        }
        //dnd($result);
        for ($i = 0; $i < count($result); $i++) {


            $temp = $GLOBALS["DB"]->dbquery("SELECT id FROM shop WHERE name ='" . $result[$i]['shop'] . "'");

            if ($temp->num_rows == 0) {
                return false;
            }
            $temp = $GLOBALS["DB"]->dbmakearry($temp);
            $result[$i]['shop_id'] = $temp['0']['id'];
            $temp = $GLOBALS["DB"]->dbquery("SELECT id FROM einkaufkategorien WHERE name ='" . $result[$i]['kategorie'] . "'");
            if ($temp->num_rows == 0) {
                return false;
            }
            $temp = $GLOBALS["DB"]->dbmakearry($temp);
            $result[$i]['kategorie_id'] = $temp['0']['id'];
        }
        return $result;
    }

    public function createNew($data)
    {
        //dnd($data);
        for ($i = 0; $i < count($data); $i++) {
            $gebinde = $this->getGebindeIDByName($data[$i]['gebinde']);
            //dnd($gebinde);
            $query = "INSERT INTO einkauf (anzahl, name, shop_id, kategorie_id, gebinde)
			VALUES ('" . $data[$i]['anzahl'] . "', '" . $data[$i]['name'] . "', '" . $data[$i]['shop_id'] . "','" . $data[$i]['kategorie_id'] . "','" . $gebinde . "')";
            $return = $GLOBALS["DB"]->dbquery($query);
        }
        if ($return == false) {
            return false;
        }

        if ($return == true) {
            return true;
        }
    }

    public function getAllbyID($id)
    {

        $temp = $GLOBALS["DB"]->dbquery("SELECT * FROM einkauf WHERE id ='" . $id . "'");
        if ($temp->num_rows == 0) {
            return false;
        }
        $result = $GLOBALS["DB"]->dbmakearry($temp);
        $result[0]['gebinde'] = $this->getGebindeNameByID($result[0]['gebinde']);
        //dnd($result);
        return $result;

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

    public function update($id)
    {
        $data = $_POST;


        $data['gebinde'] = $this->getGebindeIDByName($data['gebinde']);
        //dnd($data);
        //$results = $mysqli->query("UPDATE products SET product_name='52 inch TV', product_code='323343' WHERE ID=24"); name ='".$name."'"
        $data['kategorie_id'] = $this->getKategorieIDByName($data['kategorie']);
        $data['shop_id'] = $this->getStoreIDByName($data['shop']);
        if ($result = $GLOBALS["DB"]->dbquery("
			Update einkauf SET
			anzahl='" . $data['anzahl'] . "',
			name='" . $data['name'] . "',
			shop_id='" . $data['shop_id'] . "',
			kategorie_id='" . $data['kategorie_id'] . "',
			gebinde='" . $data['gebinde'] . "'
			WHERE id = '" . $id . "'")
            == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getStoreIDByName($name)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT id FROM shop WHERE name ='" . $name . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["id"];

    }

    public function getKategorieIDByName($name)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT id FROM einkaufkategorien WHERE name ='" . $name . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["id"];

    }

    public function deleteByID($id)
    {

        $update = $GLOBALS["DB"]->dbquery("DELETE FROM einkauf  WHERE id='" . $id . "'");
        if ($update == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getDateVonHeute()
    {
        $t = time();
        $datum = date("d.m.y", $t);
        return $datum;
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

    public function getAllGebinde()
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT name FROM gebinde");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe;
    }
}
