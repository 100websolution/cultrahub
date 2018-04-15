<?php
/*
Template Name: Help & Contact
*/
get_header('culture');

//Banner Slider
$help_contact_banner_image			= get_field( 'help_contact_banner_image', $post->ID );
$help_contact_banner_description	= get_field( 'help_contact_banner_description', $post->ID );
//Heading and details
$contact_methods					= get_field( 'contact_methods', $post->ID );
$quote								= get_field( 'quote', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
		<?php
		if( !empty($help_contact_banner_image) ){
		?>
			<div class="seller_banner help_banner">
				<div class="border_line top">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
				<img src="<?php echo $help_contact_banner_image['url'];?>" alt="" />
			<?php
			if($help_contact_banner_description != ''){
			?>
				<div class="seller_banner_text">
					<?php echo $help_contact_banner_description;?>
				</div>
			<?php
			}
			?>
				<div class="border_line">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
			</div>
		<?php
		}
		?>
			<hr class="mt35 mb35">
			<div class="innerContainer">
                <div class="">
                    <div class="heading_block">
                        <div class="heading2 center small"><img src="<?php echo get_template_directory_uri();?>/images/learn_sell_shop.png" alt=""></div>
                        <div class="color_dots">
                            <span class="yellow"></span>
                            <span class="red"></span>
                            <span class="blue"></span>
                            <span class="green"></span>
                        </div>
                    </div>
                <?php
                if( !empty($contact_methods) ){
                ?>
                    <div class="">
                        <ul class="row ul iconList">
                <?php
                        foreach( $contact_methods as $key_cm => $val_cm ){
                ?>
                            <li class="col33">
                                <div class="iconBlock contact_info">
                                    <div class="iconImg"><img src="<?php echo $val_cm['method_image']['url'];?>" alt=""></div>
                                    <div class="iconText">
                                        <h3 class="subheading2"><?php echo $val_cm['method_heading'];?></h3>
                                        <?php echo $val_cm['method_short_description'];?>
                                    </div>
                                </div>
                            </li>
                <?php
                        }
                ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
                </div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="sliderblockWrap rev odd">
					<div class="sliderblock contact_form_block">
						<div class="sliderText2 ptb50">
							<div class="table_box">
								<div class="table_cell">
								<?php
								query_posts('page_id=2584');
								if ( have_posts() ) while ( have_posts() ) : the_post();
									the_content();
								endwhile;
								wp_reset_query();
								?>
								</div>
							</div>
						</div>
						<div class="sliderImg2">
							<div class="contact_form">
								<h2 class="subheading">Get In Touch With Us</h2>
								<form method="post" enctype="multipart/form-data" id="getintouch_form" class="form_validation">
									<ul class="ul row">
										<li class="col50">
											<label>First Name</label>
											<input type="text" class="required" name="fname" id="fname" placeholder="Write your name..." />
										</li>
										<li class="col50">
											<label>Last Name</label>
											<input type="text" class="required" name="lname" id="lname" placeholder="Write your last name..." />
										</li>
										<li class="col100">
											<label>Email Address</label>
											<input type="text" class="required" name="email_id" id="email_id" placeholder="Write your email address..." />
										</li>
										<li class="col50">
											<label>Phone Number</label>
											<input type="text" class="required" name="phone_number" id="phone_number" placeholder="Write your phone..." />
										</li>
										<li class="col50">
											<label>Business Name</label>
											<input type="text" class="required" name="businessname" id="businessname" placeholder="Write your business name..." />
										</li>
										<li class="col100">
											<label>Topics</label>
											<select class="required" name="topics" id="topics">
												<option value="">Please, choose a topic to discuss about it...</option>
												<option value="Option 1">Option 1</option>
												<option value="Option 2">Option 2</option>
											</select>
										</li>
										<li class="col100">
											<label>Your Message</label>
											<textarea class="required" name="ymessage" id="ymessage" onKeyUp="check_message_length(this.form);" autocomplete="off" placeholder="Please, leave us your message..."></textarea>
											<div class="align_right">
												<small><span id="message_count">0</span>/500 Characters</small>
											</div>
										</li>
										<li class="col100">
											<input type="submit" name="submit" value="SUBMIT" id="get_in_touch" class="btnRed">
											<div class="align_center mt10">
												<small>You can also email us at <a href="#">info@cultrahub.com</a>.</small>
											</div>
											<div class="align_center" id="getintouch_msg"></div>
										</li>
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="social_block" style="background-image: url(<?php echo get_template_directory_uri();?>/images/bg_social.jpg);">
					<h2 class="heading center">Our Social Media Channels</h2>
					<div class="social">
						<?php echo add_social_links_icons();?>
					</div>
				</div>				
			</div>
		<?php
		if( !empty($quote) ){
		?>
			<div class="innerContainer mt70">
				<div class="quote"><?php echo $quote;?></div>
			</div>
		<?php
		}
		?>
			<hr class="mt50 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<script>
function check_message_length(getintouch_form){
    maxLen = 500;
    var message_length = document.getElementById('ymessage').value.length;
	if(message_length >= maxLen){
        // Reached the Maximum length so trim the textarea
        getintouch_form.ymessage.value = getintouch_form.ymessage.value.substring(0, maxLen);
        document.getElementById('message_count').innerHTML = 500;
    }
    else{
        // Maximum length not reached so update the value of my_text counter
        document.getElementById('message_count').innerHTML = message_length;
    }
}
</script>
<?php
get_footer('other');