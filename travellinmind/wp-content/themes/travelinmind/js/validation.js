function Validate_excurion_Form() {
    var error = "";
    var email_pattern_match = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phone_pattern_match = /^[0-9]+$/;
    var valid_extensions = /(.doc|.docx|.rtf|.xls|.xlsx|.pdf)$/i;
    var valid_url = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('captcha').value);
    var formdata = $("#excursion_enquiry").serialize();
    
	var templateurl 	= $('#templateurl').val();
	var templatemailurl = $('#templatemailurl').val();
	
	var thisvalue = $('#First_name').val();
    if (thisvalue == "") {
        $('#First_name').css("border-color", "red");
        $('#First_nameErr').html('Enter First Name');
        error = 1;
    }
    var thisvalue = $('#Last_name').val();
    if (thisvalue == "") {
        $('#Last_name').css("border-color", "red");
        $('#Last_nameErr').html('Enter Last Name');
        error = 1;
    }
    var thisvalue = $('#email').val();
    if (thisvalue == "") {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Enter Your Email');
        error = 1;
    }
    if (!email_pattern_match.test($('#email').val())) {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Invalid Email Format');
        error = 1;
    }
    var thisvalue = $('#phone').val();
    if (thisvalue == "") {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Enter Your Phone');
        error = 1;
    }
    if (!phone_pattern_match.test($('#phone').val())) {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Invalid Phone');
        error = 1;
    }
    var thisvalue = $('#no_of_people').val();
    if (thisvalue == "") {
        $('#no_of_people').css("border-color", "red");
        $('#no_of_peopleErr').html('Enter number of people');
        error = 1;
    }
    var thisvalue = $('#tour_date').val();
    if (thisvalue == "") {
        $('#tour_date').css("border-color", "red");
        $('#tour_dateErr').html('Select Date of Tour');
        error = 1;
    }
    var thisvalue = $('#message').val();
    if (thisvalue == "") {
        $('#message').css("border-color", "red");
        $('#messageErr').html('Enter Your Message');
        error = 1;
    }
    if (str1 != str2) {
        $("#captcha").css("border-color", "red")
        $("#captchaErr").html("Captcha code did not match.")
        error = 1;
    }
    if (error == 1) {
        return false;
    } else {
        //$("#excursion_enquiry").submit();
		
		$.ajax({
			type: "POST",
			url: templateurl+'/inc/mailphp/'+templatemailurl,
			data: $('#excursion_enquiry').serialize(),
			beforeSend: function() {
				// setting a timeout
				$('#msgloader').html('<div class="alert alert-primary">Please Wait!</div>');
				$('#sbmtbtn').attr('disabled',true);
			},
			success: function(result){
				//return false;
				if(result=='fail' && result!="")
				{
					$('#msgloader').html('<div class="alert alert-danger">Something Went Wrong Please Try Again Later!</div>');
					
					$('#sbmtbtn').removeAttr('disabled');
				}
				else
				{
					$('input:text').val('');
					
					$('textarea').val('');
					$('select').val('');
					
					$('#msgloader').html('<div class="alert alert-success">Thank You for posting your enquiry. One of our representative will get back to you soon.!</div>');
					$('#sbmtbtn').removeAttr('disabled');
				}
				setTimeout(function(){ $('#msgloader').html(''); }, 5000);
			},
		});
    }
	
	return false;
}

function Validate_cabbook_Form() {
    var error = "";
    var email_pattern_match = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phone_pattern_match = /^[0-9]+$/;
    var valid_extensions = /(.doc|.docx|.rtf|.xls|.xlsx|.pdf)$/i;
    var valid_url = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('captcha').value);
    
	var templateurl 	= $('#templateurl').val();
	
	var thisvalue = $('#name').val();
    if (thisvalue == "") {
        $('#name').css("border-color", "red");
        $('#nameErr').html('Enter Name');
        error = 1;
    }
    var thisvalue = $('#phone').val();
    if (thisvalue == "") {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Enter Your Phone');
        error = 1;
    }
    if (!phone_pattern_match.test($('#phone').val())) {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Invalid Phone');
        error = 1;
    }
    var thisvalue = $('#adults_number').val();
    if (thisvalue == "") {
        $('#adults_number').css("border-color", "red");
        $('#adults_numberErr').html('Enter Number of Adults');
        error = 1;
    }
    var thisvalue = $('#children').val();
    if (thisvalue == "") {
        $('#children').css("border-color", "red");
        $('#childrenErr').html('Enter Number of children');
        error = 1;
    }
    var thisvalue = $('#arrival_date').val();
    if (thisvalue == "") {
        $('#arrival_date').css("border-color", "red");
        $('#arrival_dateErr').html('Enter Date of Arrival');
        error = 1;
    }
    var thisvalue = $('#depature_date').val();
    if (thisvalue == "") {
        $('#depature_date').css("border-color", "red");
        $('#depature_dateErr').html('Enter Date of Departure');
        error = 1;
    }
    var thisvalue = $('#pickup_point').val();
    if (thisvalue == "") {
        $('#pickup_point').css("border-color", "red");
        $('#pickup_pointErr').html('Enter Pickup Point');
        error = 1;
    }
    var thisvalue = $('#depature').val();
    if (thisvalue == "") {
        $('#depature').css("border-color", "red");
        $('#depatureErr').html('Enter Depature');
        error = 1;
    }
    var thisvalue = $('#email').val();
    if (thisvalue == "") {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Enter Your Email');
        error = 1;
    }
    if (!email_pattern_match.test($('#email').val())) {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Invalid Email Format');
        error = 1;
    }
    var thisvalue = $('#message').val();
    if (thisvalue == "") {
        $('#message').css("border-color", "red");
        $('#messageErr').html('Enter Your Message');
        error = 1;
    }
    if (str1 != str2) {
        $("#captcha").css("border-color", "red")
        $("#captchaErr").html("Captcha code did not match.")
        error = 1;
    }
    if (error == 1) {
        return false;
    } else {
        //$("#cab_rent_enquiry").submit();
		$.ajax({
			type: "POST",
			url: templateurl+'/inc/mailphp/bookcabs_mail_process.php',
			data: $('#cab_rent_enquiry').serialize(),
			beforeSend: function() {
				// setting a timeout
				$('#msgloader').html('<div class="alert alert-primary">Please Wait!</div>');
				$('#sbmtbtn').attr('disabled',true);
			},
			success: function(result){
				//return false;
				if(result=='fail' && result!="")
				{
					$('#msgloader').html('<div class="alert alert-danger">Something Went Wrong Please Try Again Later!</div>');
					
					$('#sbmtbtn').removeAttr('disabled');
				}
				else
				{
					$('input:text').val('');
					
					$('textarea').val('');
					$('select').val('');
					
					$('#msgloader').html('<div class="alert alert-success">Thank You for posting your enquiry. One of our representative will get back to you soon.!</div>');
					$('#sbmtbtn').removeAttr('disabled');
				}
				setTimeout(function(){ $('#msgloader').html(''); }, 5000);
			},
		});
	}
}

function Validate_event_Form(id) {
    var error = "";
    var email_pattern_match = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phone_pattern_match = /^[0-9]+$/;
    var valid_extensions = /(.doc|.docx|.rtf|.xls|.xlsx|.pdf)$/i;
    var valid_url = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    var str1 = removeSpaces(document.getElementById('txtCaptcha' + id).value);
    var str2 = removeSpaces(document.getElementById('captcha' + id).value);
    
	var templateurl = $('#templateurl').val();
	
	var thisvalue = $('#name' + id).val();
    if (thisvalue == "") {
        $('#name' + id).css("border-color", "red");
        $('#name' + id + 'Err').html('Enter Name');
        error = 1;
    }
    var thisvalue = $('#email' + id).val();
    if (thisvalue == "") {
        $('#email' + id).css("border-color", "red");
        $('#email' + id + 'Err').html('Enter Your Email');
        error = 1;
    }
    if (!email_pattern_match.test($('#email' + id).val())) {
        $('#email' + id).css("border-color", "red");
        $('#email' + id + 'Err').html('Invalid Email Format');
        error = 1;
    }
    var thisvalue = $('#phone' + id).val();
    if (thisvalue == "") {
        $('#phone' + id).css("border-color", "red");
        $('#phone' + id + 'Err').html('Enter Your Phone');
        error = 1;
    }
    if (!phone_pattern_match.test($('#phone' + id).val())) {
        $('#phone' + id).css("border-color", "red");
        $('#phone' + id + 'Err').html('Invalid Phone');
        error = 1;
    }
    var thisvalue = $('#date' + id).val();
    if (thisvalue == "") {
        $('#date' + id).css("border-color", "red");
        $('#date' + id + 'Err').html('Select Date');
        error = 1;
    }
    if (str1 != str2) {
        $("#captcha" + id).css("border-color", "red")
        $("#captcha" + id + "Err").html("Captcha code did not match.")
        error = 1;
    }
    if (error == 1) {
        return false;
    } else {
        //$('#event_enquiry' + id).submit();
		
		$.ajax({
		type: "POST",
		url: templateurl+'/inc/mailphp/treking_mail_process.php',
		data: $('#event_enquiry' + id).serialize(),
		beforeSend: function() {
			// setting a timeout
			$('#msgloader' + id).html('<div class="alert alert-primary">Please Wait!</div>');
			$('#sbmtbtn' + id).attr('disabled',true);
		},
		success: function(result){
			//return false;
			if(result=='fail' && result!="")
			{
				$('#msgloader' + id).html('<div class="alert alert-danger">Something Went Wrong Please Try Again Later!</div>');
				
				$('#sbmtbtn' + id).removeAttr('disabled');
			}
			else
			{
				$('input:text').val('');
				
				$('textarea').val('');
				$('select').val('');
				
				$('#msgloader' + id).html('<div class="alert alert-success">Thank You for posting your enquiry. One of our representative will get back to you soon.!</div>');
				$('#sbmtbtn' + id).removeAttr('disabled');
			}
			setTimeout(function(){ $('#msgloader' + id).html(''); }, 5000);
		},
	});
    }
	return false;
}

function Validate_contact_Form() {
    var error = "";
    var email_pattern_match = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phone_pattern_match = /^[0-9]+$/;
    var valid_extensions = /(.doc|.docx|.rtf|.xls|.xlsx|.pdf)$/i;
    var valid_url = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('captcha').value);
    
	var templateurl = $('#templateurl').val();
	
	var thisvalue = $('#first_name').val();
    if (thisvalue == "") {
        $('#first_name').css("border-color", "red");
        $('#first_nameErr').html('Enter First Name');
        error = 1;
    }
    var thisvalue = $('#last_name').val();
    if (thisvalue == "") {
        $('#last_name').css("border-color", "red");
        $('#last_nameErr').html('Enter Last Name');
        error = 1;
    }
    var thisvalue = $('#email').val();
    if (thisvalue == "") {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Enter Your Email');
        error = 1;
    }
    if (!email_pattern_match.test($('#email').val())) {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Invalid Email Format');
        error = 1;
    }
    var thisvalue = $('#phone').val();
    if (thisvalue == "") {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Enter Your Phone');
        error = 1;
    }
    if (!phone_pattern_match.test($('#phone').val())) {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Invalid Phone');
        error = 1;
    }
    var thisvalue = $('#message').val();
    if (thisvalue == "") {
        $('#message').css("border-color", "red");
        $('#messageErr').html('Enter Your Message');
        error = 1;
    }
    if (str1 != str2) {
        $("#captcha").css("border-color", "red")
        $("#captchaErr").html("Captcha code did not match.")
        error = 1;
    }
    if (error == 1) {
        return false;
    } else {
        //$("#contact_us").submit();
		
		$.ajax({
			type: "POST",
			url: templateurl+'/inc/mailphp/contactus_mail_process.php',
			data: $('#contact_us').serialize(),
			beforeSend: function() {
				// setting a timeout
				$('#msgloader').html('<div class="alert alert-primary">Please Wait!</div>');
				$('#sbmtbtn').attr('disabled',true);
			},
			success: function(result){
				//return false;
				if(result=='fail' && result!="")
				{
					$('#msgloader').html('<div class="alert alert-danger">Something Went Wrong Please Try Again Later!</div>');
					
					$('#sbmtbtn').removeAttr('disabled');
				}
				else
				{
					$('input:text').val('');
					
					$('textarea').val('');
					$('select').val('');
					
					$('#msgloader').html('<div class="alert alert-success">Thank You for posting your enquiry. One of our representative will get back to you soon.!</div>');
					$('#sbmtbtn').removeAttr('disabled');
				}
				setTimeout(function(){ $('#msgloader').html(''); }, 5000);
			},
		});
    }
	return false;
}

function Validate_book_package_Form() {
    var error = "";
    var email_pattern_match = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phone_pattern_match = /^[0-9]+$/;
    var valid_extensions = /(.doc|.docx|.rtf|.xls|.xlsx|.pdf)$/i;
    var valid_url = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('captcha').value);
    
	var templateurl = $('#templateurl').val();
	
	var thisvalue = $('#name').val();
    if (thisvalue == "") {
        $('#name').css("border-color", "red");
        $('#nameErr').html('Enter Name');
        error = 1;
    }
    var thisvalue = $('#tour_date').val();
    if (thisvalue == "") {
        $('#tour_date').css("border-color", "red");
        $('#tour_dateErr').html('Select Your Tour Date');
        error = 1;
    }
    var thisvalue = $('#from_destination').val();
    if (thisvalue == "") {
        $('#from_destination').css("border-color", "red");
        $('#from_destinationErr').html('Enter Destination From');
        error = 1;
    }
    var thisvalue = $('#to_destination').val();
    if (thisvalue == "") {
        $('#to_destination').css("border-color", "red");
        $('#to_destinationErr').html('Enter Destination To');
        error = 1;
    }
    var thisvalue = $('#email').val();
    if (thisvalue == "") {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Enter Your Email');
        error = 1;
    }
    if (!email_pattern_match.test($('#email').val())) {
        $('#email').css("border-color", "red");
        $('#emailErr').html('Invalid Email Format');
        error = 1;
    }
    var thisvalue = $('#phone').val();
    if (thisvalue == "") {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Enter Your Phone');
        error = 1;
    }
    if (!phone_pattern_match.test($('#phone').val())) {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Invalid Phone');
        error = 1;
    }
    var thisvalue = $('#message').val();
    if (thisvalue == "") {
        $('#message').css("border-color", "red");
        $('#messageErr').html('Enter Your Message');
        error = 1;
    }
    if (str1 != str2) {
        $("#captcha").css("border-color", "red")
        $("#captchaErr").html("Captcha code did not match.")
        error = 1;
    }
    if (document.book_package.termscondition.checked == false) {
        $("#termsconditionErr").html("Please accept terms and condition")
        error = 1;
    }
    if (error == 1) {
        return false;
    } else {
        //$("#book_package").submit();
		
		
		$.ajax({
		type: "POST",
		url: templateurl+'/inc/mailphp/book_package_mail_process.php',
		data: $('#book_package').serialize(),
		beforeSend: function() {
			// setting a timeout
			$('#msgloader').html('<div class="alert alert-primary">Please Wait!</div>');
			$('#sbmtbtn').attr('disabled',true);
		},
		success: function(result){
			//return false;
			if(result=='fail' && result!="")
			{
				$('#msgloader').html('<div class="alert alert-danger">Something Went Wrong Please Try Again Later!</div>');
				
				$('#sbmtbtn').removeAttr('disabled');
			}
			else
			{
				$('input:text').val('');
				
				$('textarea').val('');
				$('select').val('');
				
				$('#msgloader').html('<div class="alert alert-success">Thank You for posting your enquiry. One of our representative will get back to you soon.!</div>');
				$('#sbmtbtn').removeAttr('disabled');
			}
			setTimeout(function(){ $('#msgloader').html(''); }, 5000);
		},
	});
    }
	return false;
}

function ValidateForm() {
    var error = "";
    var email_pattern_match = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phone_pattern_match = /^[0-9]+$/;
    var valid_extensions = /(.doc|.docx|.rtf|.xls|.xlsx|.pdf)$/i;
    var valid_url = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('captcha').value);
    var thisvalue = $('#first_name').val();
    if (thisvalue == "") {
        $('#first_name').css("border-color", "red");
        $('#first_nameErr').html('Enter First Name');
        error = 1;
    }
    if ($('#last_name').val() == "") {
        $('#last_name').css("border-color", "red");
        $('#last_nameErr').html('Enter Last Name');
        error = 1;
    }
    var thisvalue = $('#email1').val();
    if (thisvalue == "") {
        $('#email1').css("border-color", "red");
        $('#email1Err').html('Enter Your Email');
        error = 1;
    }
    if (!email_pattern_match.test($('#email1').val())) {
        $('#email1').css("border-color", "red");
        $('#email1Err').html('Invalid Email Format');
        error = 1;
    }
    var thisvalue = $('#phone').val();
    if (thisvalue == "") {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Enter Your Phone');
        error = 1;
    }
    if (!phone_pattern_match.test($('#phone').val())) {
        $('#phone').css("border-color", "red");
        $('#phoneErr').html('Invalid Phone');
        error = 1;
    }
    var thisvalue = $('#visited_place').val();
    if (thisvalue == "") {
        $('#visited_place').css("border-color", "red");
        $('#visited_placeErr').html('Enter Your visited place');
        error = 1;
    }
    var thisvalue = $('#month_year_visits').val();
    if (thisvalue == "") {
        $('#month_year_visits').css("border-color", "red");
        $('#month_year_visitsErr').html('Enter Your month of visited place');
        error = 1;
    }
    var thisvalue = $('#ProfilePic').val();
    if (thisvalue == "") {
        $('#ProfilePic').css("border-color", "red");
        $('#ProfilePicErr').html('Select profile pic');
        error = 1;
    }
    var thisvalue = $('#VisitedPlaceImages').val();
    if (thisvalue == "") {
        $('#VisitedPlaceImages').css("border-color", "red");
        $('#VisitedPlaceImagesErr').html('Select Visited Place Images');
        error = 1;
    }
    var thisvalue = $('#message').val();
    if (thisvalue == "") {
        $('#message').css("border-color", "red");
        $('#messageErr').html('Enter Message');
        error = 1;
    }
    var thisvalue = $('#writeblog').val();
    if (thisvalue == "") {
        $('#writeblog').css("border-color", "red");
        $('#writeblogErr').html('Enter Write your blog');
        error = 1;
    }
    if (str1 != str2) {
        $("#captcha").css("border-color", "red")
        $("#captchaErr").html("Captcha code did not match.")
        error = 1;
    }
    if (document.submitform.termscondition.checked == false) {
        $("#termsconditionErr").html("Please accept terms and condition")
        error = 1;
    }
    if (error == 1) {
        return false;
    } else {
        $("#submitform").submit();
    }
}

function removeSpaces(string) {
    return string.split(' ').join('');
}