<?php
	$owner_email = "pochaevsky@ukr.net,kean.dev@gmail.com";
	$headers = 'From:' . $_POST["email"];
	$subject = 'Лист від ' . $_POST["name"];
	$messageBody = "";

	if($_POST['name']!='nope'){
		$messageBody .= '<p>Клієнт ' . $_POST["name"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!='nope'){
		$messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	if($_POST['state']!='nope'){
		$messageBody .= '<p>Область: ' . $_POST['state'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['phone']!='nope'){
		$messageBody .= '<p>Телефон: ' . $_POST['phone'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}

	if($_POST['message']!='nope'){
		$messageBody .= '<p>' . $_POST['message'] . '</p>' . "\n";
	}

	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}

	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
		}else{
			echo "{'response':'лист відправлено'}";
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>
