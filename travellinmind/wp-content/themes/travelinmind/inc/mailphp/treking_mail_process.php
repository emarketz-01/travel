<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if(  isset($_POST['email'])  && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
require_once 'Mandrill_Api/src/Mandrill.php';
$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");
	
	global $wpdb;
	 $db =  $wpdb->insert('tm_trekking_form',
		array( 
			'trekking_name' => $_POST["trekking_name"], 
			'name' => $_POST["name"], 
			'phone' => $_POST["phone"] ,
			'email' =>  $_POST["email"],
			'adult' => $_POST["adult"],
			'child' => $_POST["child"],
			'date' => $_POST["date"],
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
$body ='Dear '.$_POST["name"].'<br/><br/>Your Submitted Details as Follows:<br/><br/>';
$body.='<strong>You have Enquired for Event<br/>';
$body.='<strong>Name: </strong>'.$_POST["name"].'<br/>';
$body.='<strong>Email: </strong>'.$_POST["email"].'<br/>';
$body.='<strong>Phone: </strong>'.$_POST["phone"].'<br/>';
$body.='<strong>Trekking Name: </strong>'.$_POST["trekking_name"].'<br/>';
$body.='<strong>Adult: </strong>'.$_POST["adult"].'<br/>';
$body.='<strong>Child: </strong>'.$_POST["child"].'<br/>';
//$body.='<strong>Infant: </strong> '.$_POST["infant"].'<br/>';
$body.='<strong>Date: </strong> '.$_POST["date"].'<br/>';

$body .='<br/><br/> Thanks & regards, <br/>travellinmind.com<br/>';
 $message = array(
        'html' => $body,
        'subject' => 'Trekking Enquiry Form Submitted | Travellinmind.com',
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