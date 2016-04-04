<?php

define ('DEBUG', TRUE);

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

switch (THIS_PAGE){

	case "index.php":
		$title="Tiny Vipers Home";
		$href="css/home.css";
	break;

	case "tour.php":
		$title="Tour";
		$href="css/styles.css";
		$href_mobile="css/media.css";
	break;	
	
	case "music.php":	
		$title="Tiny Vipers Music";
		$href="css/styles.css";
		$href_mobile="css/media.css";
	break;

	case "contact.php":
		$title="Contact Tiny Vipers";
		$href="css/styles.css";
		$href_mobile="css/media.css";
	break;

	case "view.php":
		$title="test";
		$href="css/styles.css";
		$href_mobile="css/media.css";
	break;	

	default:
		$title=THIS_PAGE;

}
//nav associative array
$nav1["index.php"]="Home";
$nav1["testTour.php"]="Tour";
$nav1["music.php"]="Music";
$nav1["contact.php"]="Contact";

//to display our array
function makeLinks($fooArray)
{
    $myReturn = '';
    foreach($fooArray as $url => $text)
    {
    	if(THIS_PAGE==$url) {
    		$myReturn .= '<li class="current"><a href="' . $url . '">' . $text . '</a></li>';
    	}
		else {
			$myReturn .= '<li><a href="' . $url . '">' . $text . '</a></li>';
		}
         
    }    
    return $myReturn;    
}

function process_post()
{
    $myReturn = ''; 
	foreach($_POST as $varName=> $value) 
	{
    	$strippedVarName = str_replace("_"," ",$varName);
        	if(is_array($_POST[$varName])) {
            	$myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
        	 }else {
             	$myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         			}
    }
    return $myReturn;
}

function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}

?>