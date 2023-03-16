<?php

class Truhe
{
    public function getAllKategorie()
    {

        $result = $GLOBALS["DB"]->dbquery("SELECT * FROM truhekategorien");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe;

    }

    public function getDateVonHeute()
    {
        $t = time();
        $datum = date("d.m.y", $t);
        return $datum;
    }

    public function cleanData()
    {
        //dnd($_POST);
        $data = $_POST;
        $k = 0;
        for ($i = 0; $i <= 6; $i++) {
            if (!empty($data['name' . $i])) {
                $result[$k]['anzahl'] = $data['anzahl' . $i];
                $result[$k]['name'] = $data['name' . $i];
                $result[$k]['kategorie'] = $data['kategorie' . $i];
                $result[$k]['reingelegt'] = $this->datetoTimestamp($data['reingelegt' . $i]);
                $result[$k]['abgelaufen'] = $this->datetoTimestamp($data['abgelaufen' . $i]);
                $k++;
            }
        }


        for ($i = 0; $i < count($result); $i++) {
            $result[$i]['kategorieID'] = $this->getKategorieIDByName($result[$i]['kategorie']);
        }
        //dnd($result);
        return $result;

    }

    public function getKategorieIDByName($name)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT id FROM truhekategorien WHERE name ='" . $name . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["id"];

    }

    public function createNew($data)
    {
        //dnd($data);
        $aktiv = 1;
        for ($i = 0; $i < count($data); $i++) {
            $query = "INSERT INTO truhe (anzahl, name, reingelegt, abgelaufen, kategorie_id, aktiv)
    VALUES ('" . $data[$i]['anzahl'] . "', '" . $data[$i]['name'] . "', '" . $data[$i]['reingelegt'] . "','" . $data[$i]['abgelaufen'] . "','" . $data[$i]['kategorieID'] . "','" . $aktiv . "')";
            $return = $GLOBALS["DB"]->dbquery($query);
        }
        if ($return == false) {
            return false;
        }

        if ($return == true) {
            return true;
        }
    }

    public function getKategorieNameByID($id)
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT name FROM truhekategorien WHERE id ='" . $id . "'");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        return $ausgabe[0]["name"];

    }

    public function getAll($was = 0, $wie = 0)
    {
        if (!empty($was)) {
            $sql = "SELECT * FROM truhe WHERE aktiv = 1  ORDER BY " . $was . " " . $wie;
            $result = $GLOBALS["DB"]->dbquery("$sql");
        } else {
            $result = $GLOBALS["DB"]->dbquery("SELECT * FROM truhe WHERE aktiv = 1");
        }


        //$result = $GLOBALS["DB"]->dbquery("SELECT * FROM truhe WHERE aktiv = 1 ");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);

        for ($i = 0; $i < count($ausgabe); $i++) {
            $ausgabe[$i]['kategorie'] = $this->getKategorieNameByID($ausgabe[$i]['kategorie_id']);
            $temp = $ausgabe[$i]['reingelegt'];
            $ausgabe[$i]['reingelegt'] = date("d.m.y", $ausgabe[$i]['reingelegt']);
            $ausgabe[$i]['reingelegttimestamp'] = $temp;


            $ausgabe[$i]['abgelaufen'] = date("m.y", $ausgabe[$i]['abgelaufen']);
            $ausgabe[$i]['abgelaufentimestamp'] = $temp;
            $temp = 0;
        }
        //dnd($ausgabe);
        return $ausgabe;
    }

    public function getAllArchiv()
    {
        $result = $GLOBALS["DB"]->dbquery("SELECT * FROM truhe WHERE aktiv = 0 ");
        if ($result->num_rows == 0) {
            return false;
        }
        $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
        //  dnd($ausgabe);
        for ($i = 0; $i < count($ausgabe); $i++) {
            $ausgabe[$i]['kategorie'] = $this->getKategorieNameByID($ausgabe[$i]['kategorie_id']);
            $temp = $ausgabe[$i]['reingelegt'];
            $ausgabe[$i]['reingelegt'] = date("d.m.y", $ausgabe[$i]['reingelegt']);
            $ausgabe[$i]['reingelegttimestamp'] = $temp;


            $ausgabe[$i]['abgelaufen'] = date("m.y", $ausgabe[$i]['abgelaufen']);
            $ausgabe[$i]['abgelaufentimestamp'] = $temp;

        }
        return $ausgabe;
    }

    public function deleteByID($id)
    {
        $aktiv = 0;
        $update = $GLOBALS["DB"]->dbquery("DELETE FROM einkauf  WHERE id='" . $id . "'");
        $update = $GLOBALS["DB"]->dbquery("UPDATE truhe SET aktiv='" . $aktiv . "'
                     WHERE id='" . $id . "'");
        if ($update == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllbyID($id)
    {

        $temp = $GLOBALS["DB"]->dbquery("SELECT * FROM truhe WHERE id ='" . $id . "'");
        if ($temp->num_rows == 0) {
            return false;
        }
        $result = $GLOBALS["DB"]->dbmakearry($temp);
        //dnd($result);
        $result[0]['kategorie'] = $this->getKategorieNameByID($result[0]['kategorie_id']);
        $result[0]['reingelegt'] = $result[0]['reingelegt'] = date("d.m.y", $result[0]['reingelegt']);
        $result[0]['abgelaufen'] = $result[0]['abgelaufen'] = date("m.y", $result[0]['abgelaufen']);
        return $result;

    }

    public function update($id)
    {
        $data = $_POST;

        //$results = $mysqli->query("UPDATE products SET product_name='52 inch TV', product_code='323343' WHERE ID=24"); name ='".$name."'"
        $data['kategorie_id'] = $this->getKategorieIDByName($data['kategorie']);
        if ($result = $GLOBALS["DB"]->dbquery("
    Update truhe SET
    anzahl='" . $data['anzahl'] . "',
    name='" . $data['name'] . "',
    reingelegt='" . $this->datetoTimestamp($data['reingelegt']) . "',
    abgelaufen='" . $this->datetoTimestamp($data['abgelaufen']) . "',
    kategorie_id='" . $data['kategorie_id'] . "'
    WHERE id = '" . $id . "'")
            == true) {
            return true;
        } else {
            return false;
        }
    }

    public function newFromEinkauf($id)
    {
        $data = $_POST;
        $data['kategorie_id'] = $this->getKategorieIDByName($data['kategorie']);
        $aktiv = 1;

        $query = "INSERT INTO truhe (anzahl, name, reingelegt, abgelaufen, kategorie_id, aktiv)
    VALUES ('" . $data['anzahl'] . "', '" . $data['name'] . "', '" . $this->datetoTimestamp($data['reingelegt']) . "','" . $this->datetoTimestamp($data['abgelaufen']) . "','" . $data['kategorie_id'] . "','" . $aktiv . "')";
        $return = $GLOBALS["DB"]->dbquery($query);
        if ($return == true) {
            if ($this->deleteEinkaufByID($id)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteEinkaufByID($id)
    {
        $update = $GLOBALS["DB"]->dbquery("DELETE FROM einkauf  WHERE id='" . $id . "'");
        return true;
    }

    public function deleteArchiv()
    {
        $aktiv = 0;
        $update = $GLOBALS["DB"]->dbquery("DELETE FROM truhe  WHERE aktiv='" . $aktiv . "'");
        if ($update == true) {
            return true;
        } else {
            return false;
        }

    }

    public function datetoTimestamp($date)
    {
        $timedata = explode(".", $date);
        //dnd($timedata);
        if (count($timedata) == 2) {
            //dnd($timedata);
            //echo $timedata['0']; die();
            $jahr = "20" . $timedata['1'];
            $timestamp = mktime(00, 00, 0, $timedata['0'], 10, $jahr);


        } else {
            $timestamp = mktime(00, 00, 0, $timedata['1'], $timedata['0'], $timedata['2']);
        }

        //	$timestamp = mktime(00,00,0,10,01,2019);

        return $timestamp;


    }

}
