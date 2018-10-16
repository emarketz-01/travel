<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
include( $parse_uri[0] . 'wp-load.php' );
echo "hihih";
die;
require_once 'inc/mailphp/Mandrill_Api/src/Mandrill.php';
$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");

		if($_POST['email']!="" and $_POST['username']!="")
		{
		global $wpdb;
		//echo "SELECT * FROM tm_users WHERE user_email='".$_POST['email']."'";
		$results = $wpdb->get_row("SELECT * FROM '".$wpdb->prefix."'_users WHERE user_email='".$_POST['email']."'");
		if($results->ID !=""){	
			echo "user_exist";
		}
		else{		
			$_POST['IP_address'] = $_SERVER['REMOTE_ADDR']; // for email
			$name = $_POST['username'];
			$email= $_POST['email'];
			$pass = $_POST['password'];
			

			
			$new_user_id = wp_create_user( $_POST['username'], $_POST['password'], $_POST['email'] ); 
			
			if($new_user_id >0){
				
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