<?php 

include 'includes/final_config.php';
include 'includes/final_credentials.php';

$sql = "select name, merchId, price, picture from tinyMerchFinal";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
include 'includes/final_header.php';

if(mysqli_num_rows($result) > 0)
{#records exist - process
	while($row = mysqli_fetch_assoc($result))
	{# process each row
         echo '<div id="albums"><a href="final_view.php?id=' . $row['merchId'] . '"><img src="images/' . $row['picture'] . ' "></a>';
         echo '<h3>' . $row['name'] . '</h3></div>';
         #echo '<h3> <i>for</i> $' . (int)$row['price'] . '</div><br />';
		#echo '<div id="albums"><img src="images/' . $row['picture'] . '"height="250px" ></a></div>';
 
	} 
/* 	if(mysqli_num_rows($result) > 0)
{#records exist - process
	   	
	   while ($row = mysqli_fetch_assoc($result))
	   {
			$merchName = $row['name'];
			$description = $row['description'];
			$price = (float)$row['price'];
			$type = $row['type'];
			$picture = $row['picture'];
			
		}
}
DOESN'T WORK	if(mysqli_num_rows($result) > 0)
{#records exist - process
	while($row = mysqli_fetch_assoc($result))
	{
		?>
		<div>
	<a href="final_view.php?id=<?=$merchId?>" title="Click to view more details">
	<img src="images/<?=$picture?>" alt="<?=$name?>" width="280"></a>
	<h1><?=$merchName?></h1>
	<p><?=$description?></p>
</div>
<?php 
	} */
}else{#no records
    echo "<div align=center>What! No muffins?  There must be a mistake!!</div>";	
}
@mysqli_free_result($result);

include 'includes/final_footer.php';
?>






