<?php include 'includes/final_config.php'?>
<?php include 'includes/final_header.php'?>
<?php
DEFINE('THIS_PAGE1' , basename($_SERVER['PHP_SELF']));
   if(isset($_POST['name'])) 
   	{
   	$to='lisa.fortino06@gmail.com';
	$subject='Message from ' . $_POST['name'];
	$headers= 'From:Tiny Viper\'s Website' . PHP_EOL . 'Relpy-To:' . $_POST['email'] . PHP_EOL . 'X-Mailer:PHP/' . phpversion();
	$myDate= date('Y');
	$message=process_post();
	
	mail($to, $subject, $message, $headers);
	echo 
	' 
	<h1>Thank you for contacting Tiny Vipers!</h1>
	</div>';
		// way to debug code-----var_dump($_POST);
		
	}
   else{//more to add
   	echo 
   	'
<body>
	<form action=" '.THIS_PAGE1.' " method="post" >
		<fieldset>
			<legend>Contact Tiny Vipers</legend>
				<label>name</label>
					<input type="text" name="name" id="name">
				<label>email</label>
					<input type="email" name="email" id="email">
				<label>comments</label>
					<textarea name="comments" rows="8" id="comments"></textarea>
				<label>want to join the Tiny Vipers mailing list?</label>
					<p><input type="radio" name="mailinglist" value="yes" id="radio1"> Yes!</p>
					<p><input type="radio" name="mailinglist" value="no" id="radio1"> No</p>
				<label>What\'s this in reference to?</label>
					<p><input type="checkbox" name="reference" value="booking " id="check1">  Booking</p>
					<p><input type="checkbox" name="refernce" value="writing " id="check1">  Writing about Tiny Vipers</p>
					<p><input type="checkbox" name="refernce" value="orders " id="check1">  Orders</p>
				<label>What is your Favorite Animal?</label><select name="favoriteAnimal">
  						<option value="">Select...</option>
  						<option value="Kitties">Kitties</option>
  						<option value="Eagles">Eagles</option>
  						<option value="Snales">Snales</option>
  						<option value="Vipers">Vipers</option>
  						<option value="Puppies">Puppies</option></select></p>
				<input type="submit" value="  Send  " id="submit">
		</fieldset>
	</form>

</div> <!--end main-->
';
}

 include 'includes/final_footer.php';
?>
