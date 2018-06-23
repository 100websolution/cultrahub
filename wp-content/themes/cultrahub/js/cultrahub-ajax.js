jQuery(document).ready(function($){
	var websiteurl = $('#websiteurl').val();
	
	//Checking username
	$("#username").blur(function(){
        var user_name = $(this).val();
		var count = user_name.length;
		if( user_name != '' ){
			jQuery.ajax({
				url : cultrahub_ajax_object.ajax_url,
				type : 'POST',
				data : {
					action 	: 'checking_username', 
					postdata: user_name
				},
				beforeSend: function() {
					$('.uservalidate').html('<img src="'+websiteurl+'/images/loading.gif" />');
				},
				success : function( response ) {
					if( response == 'success' ){
						$('.uservalidate').html('<img src="'+websiteurl+'/images/icon_available.png" alt="Username available" /> Username available');
					}
					else if( response == 'already exist' ){
						$('#username').val('');
						$('.uservalidate').html('<img src="'+websiteurl+'/images/icon_unavailable.png" alt="Username Unavailable" /> Username Unavailable');
					}
					else{
						$('.uservalidate').html('<small style="color:#eb4034;font-size:12px; text-align:center;">Some error occurred.</small>');
						setTimeout(function(){
							$('.uservalidate').html('');
						},5000);
					}
				}
			});
		}
    });
	
	$.validator.addMethod("validate_email", function(value, element) {
		if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
			return true;
		} else {
			return false;
		}
	}, "Please enter a valid Email.");
	
	$.validator.addMethod("validate_gender", function(value, element) {
		if(value == ''){
			$('#culturemsg_gender').html("Please select gender");
			return false;
		}
		else {
			$('#culturemsg_gender').html("");
			return true;
		}
	}, "Please select gender");
	
	$.validator.addMethod("culture_empty_validation", function(value, element) {
		if(value == ''){
			$('#culturemsg').html("Please select culture");
			return false;
		}
		else {
			$('#culturemsg').html("");
			return true;
		}
	}, "Please select culture");
	
	//Home page popup signup section
	$('.gen').click(function(){
		var gender_value = $(this).val();
		$('#gender_selected').val(gender_value);
	});
	$('#signup_partone').click(function(e){
		$("#signup_partone_form").validate({
			rules: {
				signup_partone_email: {
					validate_email: true
				}
			}
		});
		if( $("#signup_partone_form").valid() ) {
			//$('#emailmsg').show();
			//$('#emailmsg').html('<span style="color:#00a74f;font-size:12px; text-align:center;"><img src="'+websiteurl+'/images/loading.gif" /></span>');
			$('#signup_partone').addClass('clicked');
			e.preventDefault();
			var signup_partone_email = $('#signup_partone_email').val();
			jQuery.ajax({
				url : cultrahub_ajax_object.ajax_url,
				type : 'POST',
				data : {
					action : 'cultrahub_signup_partone', 
					submission : signup_partone_email
				},
				success : function( response ) {
					if( response == 'success' ){
						$('#emailmsg').html('');
						$('#signup_partone').removeClass('clicked');
						$('#email_address').val(signup_partone_email);
						$('body').addClass('modalOpen');
						$('#signUpForm').addClass('opened').slideDown();
						if($('.modalBox').outerHeight() > $(window).height()){
							$('.modalOpen').css('padding-right','17px');
							$('.modalOpen .modal').css('padding-right','17px');
						}					
					}
					else if( response == 'already exist' ){
						$('#signup_partone').removeClass('clicked');
						$('#emailmsg').html('<small style="color:#eb4034;font-size:12px; text-align:center;">This email address is already registered with us.</small>').slideDown(300);
						setTimeout(function(){
							$('#emailmsg').slideUp(300).html('');
						},5000);
					}
					else{
						$('#emailmsg').html('<small style="color:#eb4034;font-size:12px; text-align:center;">Some error occurred.</small>');
						setTimeout(function(){
							$('#emailmsg').html('');
						},5000);
					}
				}
			});
		}
    });
    $('#signup').click(function(e){
		$("#signup_form").validate({
			rules: {
				email_address: {
					validate_email: true
				},
				confirm_email_address: {
					equalTo: "#email_address"
				},
				gender_selected: {
					validate_gender: true
				},
				culture_selected: {
					culture_empty_validation: true	
				},
				confirm_password: {
					equalTo: "#password"
				},
			}            
		});
		if( $("#signup_form").valid() ) {
			var cultureselected = $('#culture_selected').val();
			if(cultureselected == ''){
				$('#culturemsg').html("Please select culture.");
				return false;
			}
			else {
				$('#culturemsg').html("");
				//return true;
			}
			$('#message').html('<span style="color:#00a74f;font-size:12px; text-align:center;"><img src="'+websiteurl+'/images/loading.gif" /></span>');
			e.preventDefault();
			var firstname 		 = $('#firstname').val();
			var lastname 		 = $('#lastname').val();
			var username 		 = $('#username').val();
			//var month 		 	 = $('#month').val();
			//var day 		 	 = $('#day').val();
			//var year 		 	 = $('#year').val();
			/*var producer		 = '';
			if($('#producer').prop('checked')) {
				producer		 = $('#producer').val();
			} else {
				producer		 = '';
			}*/
			var email_address	 = $('#email_address').val();
			var gender			 = $('#gender_selected').val();
			var business 		 = $('#business').val();
			var password	 	 = $('#password').val();
			var confirm_password = $('#confirm_password').val();
			var culture_selected = $('#culture_selected').val();
			var get_notification = '';
			if($('#notification').prop('checked')) {
				get_notification = $('#notification').val();
			} else {
				get_notification = '';
			}
			//var elem = { firstname:firstname, lastname:lastname, username:username, month:month, day:day, year:year, email_address:email_address, gender:gender, business:business, password:password, culture_selected:culture_selected, get_notification:get_notification };
			var elem = { firstname:firstname, lastname:lastname, username:username, email_address:email_address, gender:gender, business:business, password:password, culture_selected:culture_selected, get_notification:get_notification };
			
			jQuery.ajax({
				url : cultrahub_ajax_object.ajax_url,
				type : 'POST',
				data : {
					action : 'cultrahub_signup', 
					post_datas : elem
				},
				success : function( response ) {
					if( response == 'success' ){
						$("#signup_form")[0].reset();
						$('#gender_selected').val('');
						$('#culture_selected').val('');
						$('#message').html('<small style="color:#00a74f;font-size:12px; text-align:center;">Thank you for signing with us.</small>');
						setTimeout(function(){
							$('#message').html('');
						},5000);
					}
					else if( response == 'already exist' ){
						$('#message').html('<small style="color:#eb4034;font-size:12px; text-align:center;">This email address or username is already registered with us.</small>');
						setTimeout(function(){
							$('#message').html('');
						},5000);
					}
					else{
						$('#message').html('<small style="color:#eb4034;font-size:12px; text-align:center;">Some error occurred.</small>');
						setTimeout(function(){
							$('#message').html('');
						},5000);
					}
				}
			});
		}
    });
	
	//Select Culture
	var culture_array = [];
	$('.col10').click(function(e){
		var current_culture = $(this).attr("id");
		if($('#check_'+current_culture).prop('checked')) {
			if (jQuery.inArray(current_culture, culture_array)=='-1') {
				culture_array.push(current_culture);
				culture_array.sort();
				$('#culture_selected').val(culture_array);
			}
		}
		else {
			/*if (jQuery.inArray(current_culture, culture_array)=='-1') {
				culture_array.splice(culture_array.indexOf(current_culture),1);
				$('#culture_selected').val(culture_array);
			}*/
			for( var i = culture_array.length; i--;){
				if( culture_array[i] == current_culture ) culture_array.splice(i, 1);
			}
			culture_array.sort();
			$('#culture_selected').val(culture_array);
		}
	});
	
	//Get in touch
	$('#get_in_touch').click(function(e){
		$("#getintouch_form").validate({
			rules: {
				email_id: {
					validate_email: true
				}
			}            
		});
		if( $("#getintouch_form").valid() ) {
			$('#getintouch_msg').html('<span style="color:#00a74f;font-size:12px; text-align:center;"><img src="'+websiteurl+'/images/loading.gif" /></span>');
			e.preventDefault();
			var fname 		 	= $('#fname').val();
			var lname 		 	= $('#lname').val();
			var email_id	 	= $('#email_id').val();
			var phone_number 	= $('#phone_number').val();
			var businessname	= $('#businessname').val();
			var topics 		 	= $('#topics').val();
			var ymessage 		= $('#ymessage').val();
			
			var elem = { fname:fname, lname:lname, email_id:email_id, phone_number:phone_number, businessname:businessname, topics:topics, ymessage:ymessage };
			
			jQuery.ajax({
				url : cultrahub_ajax_object.ajax_url,
				type : 'POST',
				data : {
					action : 'cultrahub_getintouch', 
					post_datas : elem
				},
				success : function( response ) {
					if( response == 'success' ){
						$("#getintouch_form")[0].reset();
						$('#getintouch_msg').html('<small style="color:#00a74f;font-size:12px; text-align:center;">Thank you for your submission, we will get back to you soon.</small>');
						setTimeout(function(){
							$('#getintouch_msg').html('');
						},5000);
					}
					else{
						$('#getintouch_msg').html('<small style="color:#eb4034;font-size:12px; text-align:center;">Some error occurred.</small>');
						setTimeout(function(){
							$('#getintouch_msg').html('');
						},5000);
					}
				}
			});
		}
    });
	
	//Share your thought
	$('.md').click(function(){
		var value = $(this).val();
		$('#mood_selected').val(value);
	});
	$('#submit_sharethought').click(function(e){
		$("#sharethought_form").validate({
			rules: {
				email_sharethought: {
					validate_email: true
				}
			}            
		});
		if( $("#sharethought_form").valid() ) {
			var moodselected = $('#mood_selected').val();
			if(moodselected == ''){
				$('#sharethought_mood').show();
				$('#sharethought_mood').html("Please select mood.");
				return false;
			}
			else {
				$('#sharethought_mood').hide();
				$('#sharethought_mood').html("");
				//return true;
			}
			$('#submit_sharethought').addClass('clicked');
			e.preventDefault();
			var firstname_sharethought 	= $('#firstname_sharethought').val();
			var lastname_sharethought 	= $('#lastname_sharethought').val();
			var email_sharethought	 	= $('#email_sharethought').val();
			var feedback_sharethought 	= $('#feedback_sharethought').val();
			var mood_sharethought 		= $('#mood_selected').val();
			
			var elem = { firstname_sharethought:firstname_sharethought, lastname_sharethought:lastname_sharethought, email_sharethought:email_sharethought, feedback_sharethought:feedback_sharethought, mood_sharethought:mood_sharethought };
			
			jQuery.ajax({
				url : cultrahub_ajax_object.ajax_url,
				type : 'POST',
				data : {
					action : 'cultrahub_sharethoughts', 
					post_datas : elem
				},
				success : function( response ) {
					$('#mood_selected').val('');
					$('#submit_sharethought').removeClass('clicked');
					if( response == 'success' ){
						$("#sharethought_form")[0].reset();
						$('#sharethought_message').html('<small style="color:#00a74f;font-size:12px; text-align:center;">Thank you for your submission, we will get back to you soon.</small>');
						setTimeout(function(){
							$('#sharethought_message').html('');
						},5000);
					}
					else{
						$('#sharethought_message').html('<small style="color:#eb4034;font-size:12px; text-align:center;">Some error occurred.</small>');
						setTimeout(function(){
							$('#sharethought_message').html('');
						},5000);
					}
				}
			});
		}
    });
	
	
	//select_culture
	/*var culture_array = [];
	$('.select_culture').click(function(e){
		var current_culture = $(this).attr("id");
		if (jQuery.inArray(current_culture, culture_array)=='-1') {
			if( culture_array.length < 5 ){
				culture_array.push(current_culture);
				$('#culture_selected').val(culture_array);
				
				jQuery.ajax({
					url : cultrahub_ajax_object.ajax_url,
					type : 'POST',
					data : {
						action : 'cultrahub_selected_cultures', 
						post_datas : culture_array
					},
					success : function( response ) {
						if( response != 'error' ){
							$('#cultures').html( response );						
						}					
					}
				});	
			}
        }
	});*/
	
	   	
	
});