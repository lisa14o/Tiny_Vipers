<?php
    $to='lforti02@seattlecentral.edu';
	$subject='the subject';
	$headers= 'From:lforti02@seattlecentral.edu' . PHP_EOL . 'Relpy-To:lforti02@seattlecentral.edu' . PHP_EOL . 'X-Mailer:PHP/' . phpversion();
	$myDate= date('Y');
	$message='Hello from Edison! on ' . $myDate;
	mail($to, $subject, $message, $headers);
	
	echo 'Email sent..!';
	
?>