<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if(  isset($_POST['email'])  && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
require_once 'Mandrill_Api/src/Mandrill.php';
$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");
	
	global $wpdb;
	 $db =  $wpdb->insert('tm_groupexcursions_form',
		array( 
			'first_name' => $_POST["First_name"], 
			'last_name' => $_POST["Last_name"],
			'email' =>  $_POST["email"],
			'phone' => $_POST["phone"] , 
			'people_number' => $_POST["no_of_people"],
			'date_of_tour' => $_POST["tour_date"],
			'message' => $_POST["message"],
		), 
		array( 
			'%s', 
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		) 
	);
$body ='Dear '.$_POST["First_name"].'<br/><br/>Your Submitted Details as Follows:<br/><br/>';
$body.='<strong>You have Enquired for Undiscover<br/>';
$body.='<strong>First Name: </strong>'.$_POST["First_name"].'<br/>';
$body.='<strong>Last Name: </strong>'.$_POST["Last_name"].'<br/>';
$body.='<strong>Email: </strong>'.$_POST["email"].'<br/>';
$body.='<strong>Phone: </strong>'.$_POST["phone"].'<br/>';
$body.='<strong>No. of People: </strong>'.$_POST["no_of_people"].'<br/>';
$body.='<strong>Date of Tour: </strong>'.$_POST["tour_date"].'<br/>';
$body.='<strong>Message: </strong> '.$_POST["message"].'<br/>';
$body .='<br/><br/> Thanks & regards, <br/>travellinmind.com<br/>';
 $message = array(
        'html' => $body,
        'subject' => 'Undiscover Enquiry Form Submitted | Travellinmind.com',
        'from_email' => 'info@travellinmind.com',
        'from_name' => 'travellinmind.com',
        'to' => array(
            array(
					'email' => $_POST["email"],
					'name' => $_POST["First_name"],
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
 if($result){
	  //header("location: ".site_url()."/thank-you/");
		echo 'success';
	}
 else{
	 	//echo '<script>alert("Something Went Wrong, please try after sometime ");window.history.go(-1);</script>';
		echo 'fail';
	}

}


?>