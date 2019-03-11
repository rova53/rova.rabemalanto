    <div class="col col-lg-10 container">
    <?php foreach($listOfImg as $imPath){ ?>
    
    <div class="pull-left col col-lg-2 col-md-auto">
      <img nomIm="<?php echo $imPath;?>" class="addImage" src="<?php echo $this->getBaseUrl().IMG_DIR.$imPath; ?>" width="100px" height="100px" style="margin:5px;" />
      
    </div>
    <?php } ?>
    </div>
    <div class="col-fixed-240 gris">
    <?php foreach($listOfImgGris as $im){ 
        ?>
    <div class="col">
    <a href="#" class='delete' nomIm="<?php echo $im;?>">X</a>
     <img src="<?php echo $this->getBaseUrl().IMG_DIR.$im; ?>" width="100px" height="100px" style="margin:5px;" />
    </di>
    <?php } ?>
    </div>