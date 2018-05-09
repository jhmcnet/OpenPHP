<?php 

//getcwd();

//print('<pre>');
//print(scandir(getcwd()));
//print('</pre>');

//session_start();

//ob_start();

if(!isset($_SESSION['erros'])){

  $_SESSION['erros'] = array();

}

if(!isset($_SESSION['sucessos'])){

  $_SESSION['sucessos'] = array();

}

//error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

chdir(dirname(__DIR__));

require_once("src/controller/parameters.php");
require_once("src/functions/permissaoAcesso.php");

$url = explode('/', $_SERVER['REQUEST_URI']);

if(strtoupper($url[1]) == 'CONTROLE'){

  $page = 'src/controller/'.$url[2];

}else{

  $page = 'src/pages/';

  $page .= isset($url[1]) && !empty($url[1]) ? $url[1] : 'home';

} ?>


<!DOCTYPE html>
<html>
<head>

  <?php include('public_html/imports.php'); ?>

</head>

<body>

<?php

  if(!file_exists($page.'.php')){
  
    require_once('src/pages/errors/404.html');
  
  }else{

    require_once("src/functions/connections.php");
    require_once("src/functions/functions.php");

    print('<header class="principal">');

      include_once('src/templates/navbar.php'); 

    print('</header>');

    print('<main>');

    require_once($page.'.php');

    print('</main>');

    include_once('src/templates/footer.html');

  }

?>
<script src="<?php echo $host ?>asset/js/agency.min.js"></script>
</body>
</html>