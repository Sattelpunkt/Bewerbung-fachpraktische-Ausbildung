<?php


class Navigation {



	public function getAllDropDown() {

		$result = $GLOBALS["DB"]->dbquery("SELECT * FROM shop");
        if($result->num_rows == 0) {return false;}
        $ausgabe['shop'] = $GLOBALS["DB"]->dbmakearry($result);
		$result = $GLOBALS["DB"]->dbquery("SELECT * FROM einkaufkategorien");
        if($result->num_rows == 0) {return false;}
        $ausgabe['einkaufKategorien'] = $GLOBALS["DB"]->dbmakearry($result);
				$result = $GLOBALS["DB"]->dbquery("SELECT * FROM truhekategorien");
		        if($result->num_rows == 0) {return false;}
		        $ausgabe['truheKategorien'] = $GLOBALS["DB"]->dbmakearry($result);
		//dnd($ausgabe);
		return $ausgabe;

	}
}
