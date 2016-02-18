<?php

define ('DEBUG', TRUE);

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

switch (THIS_PAGE){
	case "final_index.php":
		$title="Tiny Vipers Home";
		$href="css/home.css";
	break;
	case "final_tour.php":
		$title="Tiny Vipers Tour";
		$href="css/tour.css";
		
	break;
	case "final_music.php":	
		$title="Tiny Vipers Music";
		$href="css/music.css";
	break;
	case "final_contact.php":
		$title="Contact Tiny Vipers";
		$href="css/contact.css";
	break;
	//album pages
	case "final_empirePrism.php":
		$title="Empire Prism";
		$href="css/empirePrism.css";
		$album='style="border: 0; width: 470px; height: 590px;" src="https://bandcamp.com/EmbeddedPlayer/album=1855168748/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/transparent=true/" seamless><a href="http://tinyvipers.bandcamp.com/album/empire-prism">Empire Prism by Tiny Vipers</a>';
	break;
	case "final_handsAcross.php":
		$title="Hands Across The Void";
		$href="css/handsAcross.css";
		$album='style="border: 0; width: 470px; height: 590px;" src="https://bandcamp.com/EmbeddedPlayer/album=2698175251/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/transparent=true/" seamless><a href="http://tinyvipers.bandcamp.com/album/hands-accross-the-void">Hands Accross the void by Tiny Vipers</a>';
	break;
	case "final_foreignBody.php":
		$title="Foreign Body";
		$href="css/foreignBody.css";
		$album='width="560" height="315" src="https://www.youtube.com/embed/cTcRCV6fXDY" frameborder="0" allowfullscreen>';
	break;
	case "final_lifeOn.php":
		$title="Life On Earth";
		$href="css/lifeOn.css";
		$album='style="border: 0; width: 470px; height: 590px;" src="https://bandcamp.com/EmbeddedPlayer/album=2469397014/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/transparent=true/" seamless><a href="http://tinyvipers.bandcamp.com/album/life-on-earth">Life on Earth by Tiny Vipers</a>';
	break;
	case "final_testTour.php":
		$title="Test Tour";
		$href="css/testTour.css";
	break;	
	case "final_view.php":
		
		$href="css/empirePrism.css";
	break;		
	default:
		$title=THIS_PAGE;
}
//nav associative array
$nav1["final_index.php"]="Home";
$nav1["final_tour.php"]="Tour";
$nav1["final_music.php"]="Music";
$nav1["final_contact.php"]="Contact";

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