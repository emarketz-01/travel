<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );

require_once( $parse_uri[0] . 'wp-load.php' );


		if($_POST['email']!="" and $_POST['username']!="")
		{
		require_once 'Mandrill_Api/src/Mandrill.php';
		$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");
		global $wpdb;
		$results = $wpdb->get_row("SELECT * FROM tm_users WHERE user_email='".$_POST['email']."'");
		if($results->ID >0){	
			echo "user_exist";
		}
		else{		
			$_POST['IP_address'] = $_SERVER['REMOTE_ADDR']; // for email
			$name = $_POST['username'];
			$email= $_POST['email'];
			$pass = $_POST['password'];
			
 
			$new_user_id = wp_create_user( $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone_no'] ); 
			
			if($new_user_id >0){
				
			/*Sending mail*/
			$body ='Dear '.$name.'<br/><br/>Thank You for registering with travellinmind. You are successfully registered and your registered details are as follows:<br/><br/>';
			$body.='<strong>UserName: </strong>'.$name.'<br/>';
			$body.='<strong>Email: </strong>'.$email.'<br/>';
			$body.='<strong>Password: </strong>'.$pass.'<br/>';
			$body.='<strong>Mobile No.: </strong>'.$_POST['phone_no'].'<br/><br/>';
			$body .='<br/><br/> Thanks & regards, <br/>Travellinmind<br/>';
			$message = array(
				'html' => $body,
				'subject' => 'Registration Successfull | Travellinmind.com',
				'from_email' => 'info@travellinmind.com',
				'from_name' => 'Travellinmind.com',
				'to' => array(
					array(
							'email' => $email,
							'name' => $name,
							'type' => 'to'
					),
					array(
						'email' => 'd@emarketzindia.com', 				
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