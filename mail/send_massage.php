<?php

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
      $secret = '6Lf_V5wUAAAAAGFIQq3B3W9AO97TdH0pm9mJ8KZe';
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      $responseData = json_decode($verifyResponse);
      if($responseData->success)
      {
      		$name = htmlspecialchars(strip_tags(trim($_POST['name'])), ENT_QUOTES, 'UTF-8');
      		$email = htmlspecialchars(strip_tags(trim($_POST['email'])), ENT_QUOTES, 'UTF-8');
      		$phone = htmlspecialchars(strip_tags(trim($_POST['phone'])), ENT_QUOTES, 'UTF-8');
      		$message = htmlspecialchars(strip_tags(trim($_POST['message'])), ENT_QUOTES, 'UTF-8');

			$to = 'cellparts.lk@gmail.com';

			$subject = 'New customer Request';


			//$body = 'Name: '.$name."\r\n".'Contact no:'.$phone."\r\n".'E-mail: '.$mail."\r\n".'Message:'.$message;


			$a = 'Name- '.$name . "\n";

			$b = ' Email- ' . $mail. "\n";

			$c = ' Phone no- '.$phone  . "\n";

			$d = ' Message-'.$message  . "\n";



			//$msg = 'Name- '.$name . ' Email- ' . $mail .' Phone no- '.$phone . ' Message-'.$message;

			$msg=$a.$b.$c.$d;

			mail($to, $subject, $msg); //$name=subject


			echo "<script>alert('Mail Successfully sent')</script>";
			$redirectUrl = "../index.php"; //refresh page

			echo "<script type=\"text/javascript\">";

			echo "window.location.href = '$redirectUrl'";

			echo "</script>";
		}

}else{
    echo "<script>alert('Robot verification failed, please try again.')</script>";


    $redirectUrl = "../contact-us-sumedacellular-kurunegala-srilanka.php";

    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";

   }



?> 