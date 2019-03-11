<?php
/**
 * Description of Home
 *
 * @author rova
 */

class Home extends BaseController {
	public function Index() {
            $imageZone = new image_zone_grise(new Mysql());
            $imZoneList = $imageZone->getListe();
            $listOfImg = array();
            $listFile = scandir(IMG_DIR);
            foreach ($listFile as $file){
                if(!in_array($file,$imZoneList) && file_exists(dirname(__file__)."/../img/".$file) && $file != "." && $file != "..")
                $listOfImg[] = $file;
            }
            return $this->ReturnView(
                array(
                    'listOfImg' => $listOfImg,
                    'listOfImgGris' => $imZoneList
                )
                );
	}
        public function saveImg(){
            $imageZone = new image_zone_grise(new Mysql());
            $imageZone->nom_image = $_POST["Img"];
            $imageZone->insert();
        }
        
        public function deleteImg(){
            $imageZone = new image_zone_grise(new Mysql());
            $imageZone->openWithName($_POST["Img"]);
            $imageZone->delete();
        }
}

