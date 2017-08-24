<?php header('Content-Type: text/html; charset=iso-UTF-8');?>
<?php
//error_reporting(ALL ^ E_STRICT);
require_once("./ControlloreDiBase.php");
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
$pagina = new ControlloreDiBase($fDB=false, $fFastT=true);

// echo "<pre>"; print_r($_REQUEST); echo "</pre>";
$pagina->controlloFlusso($_REQUEST["m"]);
$pagina->destroy();


?>
