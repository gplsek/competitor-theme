<?php
$cookie_sport = "";
foreach($_POST['sport'] as $key => $value){
$cookie_sport .= $value . "|";}
//trim the last | from the end
$cookie_sport = substr($cookie_sport, 0, -1);
setcookie("Sport", $cookie_sport,time()+(60*60*24*365),"/");

if (isset($_COOKIE['Custom']))
{
	header("Location: http://{$_SERVER['SERVER_NAME']}/");
			// echo "cookie set";
			// 			$sport_arr = explode("|", $_COOKIE['Custom']);
			// 			echo "<br>".$cookie_sport;
			// 			print_r($sport_arr);
}
else
{
	echo "did not set the cookie";
	return;
}


?>