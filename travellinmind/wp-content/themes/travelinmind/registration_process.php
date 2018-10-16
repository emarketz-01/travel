<?php
$con=mysqli_connect("localhost","fivedya_travelin","Lpfs8Ioz17OV","fivedya_travelin");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

require_once 'inc/mailphp/Mandrill_Api/src/Mandrill.php';
$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");

		if($_POST['email']!="" and $_POST['username']!="")
		{
		$sql =  "SELECT * FROM tm_users WHERE user_email='".$_POST['email']."'";
		$id = mysqli_query($con,$sql);
		if($id->num_rows > 0){	
			echo "user_exist";
		}
		else{		
			$_POST['IP_address'] = $_SERVER['REMOTE_ADDR']; // for email
			$name = $_POST['username'];
			$email= $_POST['email'];
			$pass = $_POST['password'];
			
			$hasspass = md5($_POST['password']);

		$inseted =mysqli_query($con,"INSERT INTO tm_users (user_login,user_pass,user_nicename,user_email,user_registered,display_name) VALUES ('".$_POST['username']."','".$hasspass."','".$_POST['username']."','".$_POST['email']."','".date('Y-m-d h:m:s')."','".$_POST['username']."')");
			if($inseted >0){
				
			/*Sending mail*/
			$body ='Dear '.$name.'<br/><br/>Thank You for registering with Travelinmind. You are successfully registered and your registered details are as follows:<br/><br/>';
			$body.='<strong>UserName: </strong>'.$name.'<br/>';
			$body.='<strong>Email: </strong>'.$email.'<br/>';
			$body.='<strong>Password: </strong>'.$pass.'<br/><br/>';
			$body .='<br/><br/> Thanks & regards, <br/>Travelinmind<br/>';
			$message = array(
				'html' => $body,
				'subject' => 'Registration Successfull | Travelinmind.in',
				'from_email' => 'info@travelinmind.in',
				'from_name' => 'travelinmind.in',
				'to' => array(
					array(
							'email' => $email,
							'name' => $name,
							'type' => 'to'
					),
					array(
						'email' => 'sanjay.kumar@redmarkediting.com', 				
						'name' => 'Admin',
						'type' => 'bcc'
					)
				)
			);
			$async = false;
			$ip_pool = '';
			$result = $mandrill->messages->send($message, $async, $ip_pool);
			echo 'success';	
			}
		}
		  
	}
	else{
		 echo "wrong";
		  }
?>