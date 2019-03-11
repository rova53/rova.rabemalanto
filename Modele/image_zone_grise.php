<?php
/* Ajout et Suppression d'une image dans la zone grise */

class image_zone_grise {

    private $lnk;
    public $id = 0;
    public $nom_image = '';

    public function __construct(Mysql $_lnk) {
        $this->lnk = $_lnk;
    }

    /* Ouvre image à partir de son id */

    public function open($id) {
        $arr_data = mysqli_fetch_assoc($this->lnk->Query('SELECT * FROM image_zone_grise WHERE img_id = ' . (int) $id . ' LIMIT 1'));
        if (count($arr_data) > 0) {
            $this->openFromArray($arr_data[0]);
        } else {
            return false;
        }
        return true;
    }

    /* Ouvre image à partir d'un tableau */

    public function openFromArray($arr) {
        $this->id = $arr['img_id'];
        $this->nom_image = $arr['img_nom_image'];
		
        return true;
    }
	
	// Insertion d'une image dans la zone grise
    public function insert() {
        $this->lnk->Query("INSERT INTO image_zone_grise SET img_nom_image='$this->nom_image'");
    }

	// Suppression d'une image de la zone grise
    public function delete() {
        $this->lnk->Query('DELETE FROM image_zone_grise WHERE img_id='.$this->id);
    }
	
	// Liste des images présente dans la zone grise
	public function getListe() {
        $res = $this->lnk->Query('SELECT * FROM image_zone_grise');
        $buffer = array();
        while ($row = mysqli_fetch_array($res)) {
            $buffer[] = $row['img_nom_image'];
        }
        return $buffer;
	}

    public function openWithName($name){
        $arr_data = mysqli_fetch_assoc($this->lnk->Query('SELECT * FROM image_zone_grise WHERE img_nom_image = "' . $name . '" LIMIT 1'));
        if (count($arr_data) > 0) {
            $this->openFromArray($arr_data);
        } else {
            return false;
        }
        return true;
    }
}