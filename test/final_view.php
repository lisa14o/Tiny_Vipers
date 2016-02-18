<?php require 'includes/final_config.php';
	  require 'includes/final_credentials.php';

/*if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{#send the user to a safe location!
	header("Location:final_music.php");
}*/
$myID= $_GET['id'];//new code to replace unsafe code commented out above
//sql statement to select individual item
$sql = "SELECT name,type,description,price,bandCamp,picture FROM tinyMerchFinal WHERE merchId = " . $myID;
echo $sql;//new code

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


include 'includes/final_header.php'; #header must appear before any HTML is printed by PHP

?>

<iframe <?=$album?></iframe>
<h2> <?=$merchName?></h2>
<h2> <?=$type?></h2>
<h3> <?=$description?></h3>
<h2> <?=$price?></h2>
</div> <!--end main-->

<?php include 'includes/final_footer.php'?>








