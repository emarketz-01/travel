<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if(  isset($_POST['email'])  && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
require_once 'Mandrill_Api/src/Mandrill.php';
$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");
	
	global $wpdb;
	 $db =  $wpdb->insert('tm_bookcabs_form',
		array( 
			'name' => $_POST["name"], 
			'phone' => $_POST["phone"] ,
			'email' =>  $_POST["email"],
			'adults_number' => $_POST["adults_number"],
			'children' => $_POST["children"],
			'arrival_date' => $_POST["arrival_date"],
			'depature_date' => $_POST["depature_date"],
			'pickup_point' => $_POST["pickup_point"],
			'depature' => $_POST["depature"],
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
			'%s',
			'%s',
			'%s',
		) 
	);
if($db>0){
$body ='Dear '.$_POST["name"].'<br/><br/>Your Submitted Details as Follows:<br/><br/>';
$body.='<strong>You have Enquired for Book Cabs<br/>';
$body.='<strong>Name: </strong>'.$_POST["name"].'<br/>';
$body.='<strong>Email: </strong>'.$_POST["email"].'<br/>';
$body.='<strong>Phone: </strong>'.$_POST["phone"].'<br/>';
$body.='<strong>Adults: </strong>'.$_POST["adults_number"].'<br/>';
$body.='<strong>Children: </strong>'.$_POST["children"].'<br/>';
$body.='<strong>Arrival Date: </strong> '.$_POST["arrival_date"].'<br/>';
$body.='<strong>Depature Date: </strong> '.$_POST["depature_date"].'<br/>';
$body.='<strong>Pickup Point: </strong> '.$_POST["pickup_point"].'<br/>';
$body.='<strong>Depature: </strong> '.$_POST["depature"].'<br/>';
$body.='<strong>Message: </strong> '.$_POST["message"].'<br/>';
$body .='<br/><br/> Thanks & regards, <br/>travellinmind.com<br/>';
 $message = array(
        'html' => $body,
        'subject' => 'Book Cabs Form Submitted | Travellinmind.com',
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
	    // header("location: ".site_url()."/thank-you/");
		echo 'success';
	}
}
 else{
	 	//echo '<script>alert("Something Went Wrong, please try after sometime ");window.history.go(-1);</script>';
		echo 'fail';
	}

}


?>