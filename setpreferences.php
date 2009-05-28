<?php
$cookie_sport = "";
$cookie_event = "";
if ($_POST['sport'] != "")
{
		foreach($_POST['sport'] as $key => $value){
		$cookie_sport .= $value . "|";}
}
if ($_POST['event'] != "")
{
		foreach($_POST['event'] as $key => $value){
		$cookie_event .= $value . ",";}
}
//trim the last | from the end
$cookie_sport = substr($cookie_sport, 0, -1);
$cookie_event = substr($cookie_event, 0, -1);
setcookie("Sport", $cookie_sport,time()+(60*60*24*365),"/");
setcookie("Event", $cookie_event,time()+(60*60*24*365),"/");
header("Location: http://{$_SERVER['SERVER_NAME']}/");




// if (isset($_COOKIE['Sport']))
// {
// 	header("Location: http://{$_SERVER['SERVER_NAME']}/");
// 			// echo "cookie set";
// 			// 			$sport_arr = explode("|", $_COOKIE['Custom']);
// 			// 			echo "<br>".$cookie_sport;
// 			// 			print_r($sport_arr);
// }
// else
// {
// 	echo "did not set the cookie";
// 	return;
// }


?>