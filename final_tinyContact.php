<?php
   //form1.php
   //creating a variable -THIS_PAGE1 which gets the url and reproduces it as page you are on
   DEFINE('THIS_PAGE1' , basename($_SERVER['PHP_SELF']));
   if(isset($_POST['MyName'])) 
   	{
   	$to='lforti02@seattlecentral.edu';
	$subject='the subject';
	$headers= 'From:lforti02@seattlecentral.edu' . PHP_EOL . 'Relpy-To:lforti02@seattlecentral.edu' . PHP_EOL . 'X-Mailer:PHP/' . phpversion();
	$myDate= date('Y');
	$message='Hello from Edison! on ' . $myDate;
	mail($to, $subject, $message, $headers);
	
	echo 'Email sent..!';
		
		// way to debug code-----var_dump($_POST);
		
	}
   else{
   		echo
   		'
   			<form action=" '.THIS_PAGE1.' " method="post" >
			My Name:<input type="text" name="MyName" required/><br/>
			My Email:<input type="email" name="MyEmail" /><br/>
 			<input type="submit"/>
 			</form>
		';
   }
?>  


<!doctype html>
<!--web110-->
<html>
<head>
<meta charset="utf-8">
<title>Contact</title>
<link href="css/contact.css" type="text/css" rel="stylesheet"  >
 

</head>
<body>
<div id="wrapper">

<header> 
<nav>
<ul>
<li class="big"><a href="final_index.html">HOME</a></li>
<li class="big"><a href="final_music.html">MUSIC</a></li>
<li class="big"><a href="final_tour.html">TOUR</a></li>
<li class="big"><a href="final_contact.html">CONTACT</a></li>

</ul>
</nav>
</header>

<div id="main">
<body>
<form action="testcontact.php" method="post" id="form">
<fieldset>
<legend>
Contact Tiny Vipers
</legend>

<label>
name
</label>
<input type="text" name="MyName" id="MyName">

<label>
email
</label>
<input type="email" name="MyEmail" id="MyEmail">

<label>comments</label>
<textarea name="comments" rows="8" id="comments">

</textarea>

<label>
want to join the Tiny Vipers mailing list?
</label>
<p>
<input type="radio" name="mailinglist" value="yes" id="radio1"> Yes!
</p>

<input type="submit" value="  Send  " id="submit">



</fieldset>




</form>
</div> <!--end main-->








<div id="footer">
<ul>
<li>&copy; Copyright 2015</li>
<li>All Rights Reserved</li>
<li><a href="../index.html">Web design by Lisa</a></li>
</ul>
</div> <!--end footer-->

<p>
 <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fedison.seattlecentral.edu%2F~lforti02%2Fweb110%2Ffinal%2Ftour.html"><img src="images/html5.png" alt="validator" title="click to view"
      width="88" /></a>
  </p>
</div> <!--end wrapper-->
</body>
</html>
