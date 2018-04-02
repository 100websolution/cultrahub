jQuery(document).ready(function($){
	var websiteurl = $('#websiteurl').val();
	$.validator.addMethod("validate_email", function(value, element) {
		if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
			return true;
		} else {
			return false;
		}
	}, "Please enter a valid Email.");
	
	/*$.validator.addMethod("culture_empty_validation", function(value, element) {
		if(value == ''){
			$('#culturemsg').html("Please select culture.");
			return false;
		}
		else {
			$('#culturemsg').html("");
			return true;
		}
	}, "Please select culture.");
	*/
	
	//Home page signup section
    $('#signup').click(function(e){
		$("#signup_form").validate({
			rules: {
				email_address: {
					validate_email: true
				},
				gender: {
					validate_test: true
				},
				/*cultureselected: {
					culture_empty_validation: true	
				},*/
				confirm_password: {
					equalTo: "#password"
				},
			}            
		});
		if( $("#signup_form").valid() ) {
			/*var cultureselected = $('#culture_selected').val();
			if(cultureselected == ''){
				$('#culturemsg').html("Please select culture.");
				return false;
			}
			else {
				$('#culturemsg').html("");
				return true;
			}*/
			$('#message').html('<span style="color:#00a74f;font-size:12px; text-align:center;"><img src="'+websiteurl+'/images/loading.gif" /></span>');
			e.preventDefault();
			var firstname 		 = $('#firstname').val();
			var lastname 		 = $('#lastname').val();
			var username 		 = $('#username').val();
			var month 		 	 = $('#month').val();
			var day 		 	 = $('#day').val();
			var year 		 	 = $('#year').val();
			/*var producer		 = '';
			if($('#producer').prop('checked')) {
				producer		 = $('#producer').val();
			} else {
				producer		 = '';
			}*/
			var email_address	 = $('#email_address').val();
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
			var elem = { firstname:firstname, lastname:lastname, username:username, month:month, day:day, year:year, email_address:email_address, business:business, password:password, culture_selected:culture_selected, get_notification:get_notification };
			
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
						$('#message').html('<small style="color:#00a74f;font-size:12px; text-align:center;">Thank you for signing with us.</small>');
						setTimeout(function(){
							$('#message').html('');
						},5000);
					}
					else if( response == 'already exist' ){
						$('#message').html('<small style="color:#eb4034;font-size:12px; text-align:center;">This email address is already registered with us.</small>');
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
	$('.col11').click(function(e){
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