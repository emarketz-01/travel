<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if(  isset($_POST['email'])  && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
require_once 'Mandrill_Api/src/Mandrill.php';
$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");
	
	global $wpdb;
	 $db =  $wpdb->insert('tm_bookpackage_form',
		array( 
			'package_name' => $_POST["package_name"],
			'name' => $_POST["name"], 
			'phone' => $_POST["phone"] ,
			'email' =>  $_POST["email"],
			'tour_date' => $_POST["tour_date"],
			'from_destination' => $_POST["from_destination"],
			'to_destination' => $_POST["to_destination"],
			
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
if($db>0){
$body ='Dear '.$_POST["name"].'<br/><br/>Thank you for sharing your requirements with us. Travellinmind is glad to serve you better. Our team will get back to you soon.<br/><br/>';
$body.='<strong>Your details as follows <br/>';
$body.='<strong>Name: </strong>'.$_POST["name"].'<br/>';
$body.='<strong>Email: </strong>'.$_POST["email"].'<br/>';
$body.='<strong>Phone: </strong>'.$_POST["phone"].'<br/>';
$body.='<strong>Tour Date: </strong>'.$_POST["tour_date"].'<br/>';
$body.='<strong>Destination From: </strong>'.$_POST["from_destination"].'<br/>';
$body.='<strong>Destination To: </strong> '.$_POST["to_destination"].'<br/>';
$body.='<strong>Book For Package: </strong> '.$_POST["package_name"].'<br/>';
$body .='<br/><br/> Thanks & regards <br/>travellinmind.com<br/>';
 $message = array(
        'html' => $body,
        'subject' => 'Book Package Form Submitted | Travellinmind.com',
        'from_email' => 'info@travellinmind.com',
        'from_name' => 'travellinmind.com',
        'to' => array(
            array(
					'email' => $_POST["email"],
					'name' => $_POST["name"],
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
}
 else{
	 	//echo '<script>alert("Something Went Wrong, please try after sometime ");window.history.go(-1);</script>';
		echo 'fail';
	}

}
?>