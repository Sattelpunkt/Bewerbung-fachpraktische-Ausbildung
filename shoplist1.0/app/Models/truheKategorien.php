<?php

class truheKategorien {

    public function getAll() {

      $result = $GLOBALS["DB"]->dbquery("SELECT * FROM truhekategorien");
            if($result->num_rows == 0) {return false;}
            $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
			
            return $ausgabe;
    }
    public function insertNew($name) {

      $query =  "INSERT INTO truhekategorien (name)
          VALUES ('".$name."')";
          $return =  $GLOBALS["DB"]->dbquery($query);
          if($return == false){ return false;}
          if($return == true){ return true;}

    }
    public function getAllbyID($id){

      $temp = $GLOBALS["DB"]->dbquery("SELECT * FROM truhekategorien WHERE id ='".$id."'");
          if($temp->num_rows == 0) {return false;}
		  $result = $GLOBALS["DB"]->dbmakearry($temp);
          return $result;

    }
    public function getUpdateByID($id) {

      $name = $_POST['name'];
      $update = $GLOBALS["DB"]->dbquery("UPDATE truhekategorien SET name='".$name."'
                         WHERE id='".$id."'");
      if($update == true){ return true;} else { return false;}

    }
    public function deleteByID($id) {

       //$query = "DELETE FROM inhalt  WHERE id=".$inhaltsID;
      $update = $GLOBALS["DB"]->dbquery("DELETE FROM truhekategorien  WHERE id='".$id."'");
      if($update == true){ return true;} else { return false;}

    }
    public function getKategorieNameByID($id) {
      $result = $GLOBALS["DB"]->dbquery("SELECT name FROM truhekategorien WHERE id ='".$id."'");
          if($result->num_rows == 0) {return false;}
          $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
          return $ausgabe[0]["name"];

    }
    public function getAllbyKategorieID($id) {
      $aktiv = 1;

      $result = $GLOBALS["DB"]->dbquery("SELECT * FROM truhe WHERE kategorie_id ='".$id."' AND aktiv=1");
      $ausgabe = $GLOBALS["DB"]->dbmakearry($result);
      if($ausgabe == 0) { return true;}


      $k = 0;
      if($ausgabe == 0) { return true;}
      for($i=0;$i<count($ausgabe); $i++) {
        if($ausgabe[$i]['aktiv'] == 1)
        {
          $return[$k] = $ausgabe[$i];
          $temp = $return[$k]['reingelegt'];
          $return[$k]['reingelegt'] =date("d.m.y", $ausgabe[$i]['reingelegt']);
          $return[$k]['reingelegttimestamp'] = $temp;
          $temp = "";
          $temp = $return[$k]['abgelaufen'];
          $return[$k]['abgelaufen'] =date("m.y", $ausgabe[$i]['abgelaufen']);
          $return[$k]['abgelaufentimestamp'] = $temp;
          $temp = "";
          $k++;
        }
      }
      //dnd($return);

		return $return;
		}
    public function updateKategorie($id) {
      $temp = $GLOBALS["DB"]->dbquery("SELECT id FROM truhe WHERE kategorie_id ='".$id."'");
          $result = $GLOBALS["DB"]->dbmakearry($temp);
          if($temp->num_rows == 0) {return true;}
          if(count($result) >0) {
            for($i=0;$i<count($result); $i++) {
              $update = $GLOBALS["DB"]->dbquery("UPDATE truhe SET kategorie_id=1
                         WHERE id='".$result[$i]["id"]."'");
            }
            return true;
          }else {
            return true;
          }

    }
}
