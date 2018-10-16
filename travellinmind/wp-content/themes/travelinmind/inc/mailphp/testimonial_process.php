<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if(  isset($_POST['email1'])  && filter_var($_POST['email1'], FILTER_VALIDATE_EMAIL) ) {
require_once 'Mandrill_Api/src/Mandrill.php';
$mandrill = new Mandrill("6NoCf8QjBNpqq4PP4sQGww");

 if(isset($_FILES['ProfilePic']['name']) and !empty($_FILES['ProfilePic']['name']))
		{
			$my_file = $_FILES['ProfilePic']['name']; 
            $my_path = "doc_folder/";
			$savename=time().str_replace(" ","-",$my_file);
			$newname = $my_path.$savename;
			$f_type=$_FILES['ProfilePic']['type'];
				if(move_uploaded_file($_FILES['ProfilePic']['tmp_name'],$newname))
				{
				 $ProfilePic=$savename;
				}
 		}
		else{
			$ProfilePic="";
		}
		
		if(isset($_FILES['VisitedPlaceImages']['name']) and !empty($_FILES['VisitedPlaceImages']['name']))
		{
			$my_file = $_FILES['VisitedPlaceImages']['name']; 
            $my_path = "doc_folder/";
			$savename=time().str_replace(" ","-",$my_file);
			$newname = $my_path.$savename;
			$f_type=$_FILES['VisitedPlaceImages']['type'];
				if(move_uploaded_file($_FILES['VisitedPlaceImages']['tmp_name'],$newname))
				{
				 $VisitedPlaceImages=$savename;
				}
 		}
		else{
			$VisitedPlaceImages="";
		}
	
	global $wpdb;
	 $db =  $wpdb->insert('tm_testimonial_form',
		array( 
			'first_name' => $_POST["first_name"], 
			'last_name' => $_POST["last_name"], 
			'email' => $_POST["email1"] ,
			'phone' =>  $_POST["phone"],
			'visited_place' => $_POST["visited_place"],
			'month_year_visits' => $_POST["month_year_visits"],
			'ProfilePic' => $ProfilePic,
			'VisitedPlaceImages' => $VisitedPlaceImages,
			'message' => $_POST["message"],
			'writeblog' => $_POST["writeblog"],
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
$body ='Dear '.$_POST["first_name"].'<br/><br/>Your Submitted Details as Follows:<br/><br/>';
$body.='<strong>You have Enquired for Testimonial</strong><br/>';
$body.='<strong>Name: </strong>'.$_POST["first_name"].' '.$_POST["last_name"].'<br/>';
$body.='<strong>Email: </strong>'.$_POST["email1"].'<br/>';
$body.='<strong>Phone: </strong>'.$_POST["phone"].'<br/>';
$body.='<strong>Visited Place: </strong>'.$_POST["visited_place"].'<br/>';
$body.='<strong>Month Year Visits: </strong>'.$_POST["month_year_visits"].'<br/>';
if($ProfilePic)
{
$body.='<strong>Profile Pic: </strong><a href="'.site_url().'/wp-content/themes/travellinmind/inc/mailphp/doc_folder/'.$ProfilePic.'">'.$ProfilePic.'</a><br/>';
}
if($VisitedPlaceImages)
{
$body.='<strong>Visited Place Images: </strong> <a href="'.site_url().'/wp-content/themes/travellinmind/inc/mailphp/doc_folder/'.$VisitedPlaceImages.'">'.$VisitedPlaceImages.'</a><br/>';
}
$body.='<strong>Message: </strong> '.$_POST["message"].'<br/>';
$body.='<strong>Write Blog: </strong> '.$_POST["writeblog"].'<br/>';

$body .='<br/><br/> Thanks & regards, <br/>travellinmind.com<br/>';
 $message = array(
        'html' => $body,
        'subject' => 'Testimonial Form Submitted | Travellinmind.com',
        'from_email' => 'info@travellinmind.com',
        'from_name' => 'travellinmind.com',
        'to' => array(
            array(
					'email' => $_POST["email1"],
					'name' => $_POST["first_name"],
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
	   header("location: ".site_url()."/thank-you/");
 	}
}
 else{
	 	echo '<script>alert("Something Went Wrong, please try after sometime ");window.history.go(-1);</script>';
	}

}


?>