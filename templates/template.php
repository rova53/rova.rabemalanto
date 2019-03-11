<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="manga">
    <meta name="author" content="Rova Rabemalanto">

    <title><?php echo $titre ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->getBaseUrl(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <?php $this->renderCss(); ?>
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   
  </head>
  <body>

		<?php 
                include $viewloc;
            $this->renderJs();
        ?>

  </body>
  </html>