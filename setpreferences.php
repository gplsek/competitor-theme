<?php
require_once('../../../wp-config.php');
//global $wpdb, $current_site;




$category = get_cat_ID("sports");
$sport_cats = get_categories('hide_empty=0&child_of='.$category);

$reg_category = get_cat_ID("regions");
$regions_cats = get_categories('hide_empty=0&child_of='.$reg_category);


$cookie_sport = "";
$cookie_event = "";
$cookie_activity = "";
$cookie_area = "";
if ($_POST['sport'] != "")
{
		foreach($_POST['sport'] as $key => $value){
		$cookie_sport .= $value . "|";
		
			$cat = get_category($value);
			if (($cat->slug != "uncategorized") && ($cat->slug != "news"))
			{
				$cookie_activity .= $cat->slug .".competitor.com,";
			}
			
		
			switch ($cat->slug) {
			    case "northeast":
			        $cookie_area .= "NE,";
					break;
			    case "southeast":
			        $cookie_area .= "SE,";
					break;
			    case "midwest":
			       $cookie_area .= "MW,";
					break;
				case "southwest":
					$cookie_area .= "SW,";
					break;
				case "rockymountains":
					$cookie_area .= "RM,";
					break;
				case "west":
					$cookie_area .= "WT,";
					break;
				case "northwest":
					$cookie_area .= "NW,";
					break;
			}
		
		}
}
if ($_POST['event'] != "")
{
		foreach($_POST['event'] as $key => $value){
		$cookie_event .= $value . ",";
				}
}
//trim the last | from the end
$cookie_sport = substr($cookie_sport, 0, -1);
$cookie_event = substr($cookie_event, 0, -1);
$cookie_activity = substr($cookie_activity, 0, -1);
$cookie_area = substr($cookie_area, 0, -1);



//if ( SITECOOKIEPATH != COOKIEPATH )
	//setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);
setcookie("Sport", $cookie_sport,time()+(60*60*24*365),"/");
setcookie("Event", $cookie_event,time()+(60*60*24*365),"/");
setcookie("activity", $cookie_activity,time()+(60*60*24*365),"/");
setcookie("area", $cookie_area,time()+(60*60*24*365),"/");
//setcookie("Event", $cookie_event,time()+(60*60*24*365),"/");
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