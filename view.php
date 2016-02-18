<?php require 'includes/config.php';
	  require 'includes/credentials.php';
	 

/*if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{#send the user to a safe location!
	header("Location:final_music.php");
}*/


function dbOut($data){
	return $data;
}

$myID= $_GET['id'];//new code to replace unsafe code commented out above
//sql statement to select individual item
$sql = "SELECT name,type,description,price,bandCamp,picture FROM tinyMerchFinal WHERE merchId = " . $myID;
//echo $sql;//new code

$foundRecord = FALSE; # Will change to true, if record found!
   
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	   $foundRecord = TRUE;	
	   while ($row = mysqli_fetch_assoc($result))
	   {
			$merchName = dbOut($row['name']);
			$description = dbOut($row['description']);
			$price = (float)$row['price'];
			$type = dbOut($row['type']);
			$picture = dbOut($row['picture']);
			$player = dbOut($row['bandCamp']);
		}
}


@mysqli_free_result($result); # We're done with the data!

if($foundRecord)
{#only load data if record found
	$title = $merchName . " album made with PHP & love!"; #overwrite title with Muffin info!
}

#<iframe style="border: 0; width: 350px; height: 470px;" src="https://bandcamp.com/EmbeddedPlayer/album=1855168748/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/transparent=true/" seamless><a href="http://tinyvipers.bandcamp.com/album/empire-prism">Empire Prism by Tiny Vipers</a></iframe>

include 'includes/header.php'; #header must appear before any HTML is printed by PHP
if($foundRecord)
{#only load data if record found
?>


<h2 align="center"><?=$merchName?></h2>
<!--<img align="center" src="images/<?=$picture?>" width="280"></a>-->
<div class="player"><iframe  <?=$player?></iframe></div>
<h3 align="center"> <?=$description?></h3>
<h4 align="center"><?=$type?></h4>
<h5 align="center"><i>$<?=$price?>.00</i></h5>
</div> <!--end main-->
<?php
}else{//no such merch!
    echo '<div align="center">What! No such muffin? There must be a mistake!!</div>';
    echo '<div align="center"><a href="ass_list.php">Another Muffin?</a></div>';
}

include 'includes/footer.php'; 
?>






