<?php
$cookie_sport = "";
foreach($_POST['sport'] as $key => $value){
$cookie_sport .= $value . "|";}
//trim the last | from the end
$cookie_sport = substr($cookie_sport, 0, -1);
setcookie("Sport", $cookie_sport,time()+(60*60*24*365),"/");
header("Location: http://{$_SERVER['SERVER_NAME']}/");


?>