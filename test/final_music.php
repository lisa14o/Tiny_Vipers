<?php include 'includes/final_config.php'?>
<?php include 'includes/final_credentials.php'?>

<?php
$sql = "select name, merchId, picture from tinyMerchFinal";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
include 'includes/final_header.php';
if(mysqli_num_rows($result) > 0)
{#records exist - process
	while($row = mysqli_fetch_assoc($result))
	{# process each row
         echo '<div align="center"><a href="final_view.php?id=' . (int)$row['merchId'] . '">' . ($row['name']) . '</a>';
         
 
	} 
}else{#no records
    echo "<div align=center>What! No muffins?  There must be a mistake!!</div>";	
}
if(mysqli_num_rows($result) > 0)
{#records exist - process
	   $foundRecord = TRUE;	
	   while ($row = mysqli_fetch_assoc($result))
	   {
			$merchName = ($row['name']);
			
		}
}
@mysqli_free_result($result);



?>

	<aside>
		<a href="final_view.php" title="Click to view more details">
		<img src="images/<?=$picture?>" alt="<?=$merchName;?>" width="280"></a>
		<h1><?=$merchName;?></h1>
		
	</aside>

	<!--<aside>
		<a href="final_handsAcross.php" title="Click to view more details">
		<img src="images/hands.gif" alt="Hands Across the Void" width="280"></a>
		<h1>Hands Across The Void</h1>
		<p>Subpop Records 2007</p>
	</aside>

	<aside>
		<a href="final_lifeOn.php" title="Click to view more details">
		<img src="images/life.gif" alt="Life on Earth" width="280"></a>
		<h1>Life On Earth</h1>
		<p>Subpop Records 2009 </p>
	</aside >

	<aside>
		<a href="final_foreignBody.php" title="Click to view more details">
		<img src="images/mirroring.gif" alt="Mirroring" width="280"></a>
		<h1>Foreign Body</h1>
		<p>Kranky Records 2012</p>
	</aside>-->
<?php 


include 'includes/final_footer.php';
?>






