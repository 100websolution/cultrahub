<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cultrahub
 */
?>
<footer>
	<div class="border_line">
		<span class="b_yellow"></span>
		<span class="b_red"></span>
		<span class="b_blue"></span>
		<span class="b_green"></span>
	</div>
	
	<div class="container">
		<div class="logo">
			<a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt=""></a>
			<div class="color_dots mt15">
				<span class="yellow"></span>
				<span class="red"></span>
				<span class="blue"></span>
				<span class="green"></span>
			</div>
		</div>
		<?php wp_nav_menu( array( 'menu' => 'footer-menu', 'menu_class'=>'fnav') ); ?>
		<div class="social">
			<?php echo add_social_links_icons();?>
		</div>
		<div class="app_block">
			<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/apple_store.png" alt=""></a>
                <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/google_play.png" alt=""></a>
		</div>
		<div class="copyright">
			<div class="align_center">
				<ul class="borderbar_list clearfix">
					<li>Copyright &copy; <?php echo date( 'Y' );?> <a href="<?php echo site_url();?>">Cultrahub™</a></li>
	                    <li>Designed &amp; Developed by <a href="<?php echo site_url();?>">Cultrahub</a>.</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<input type="hidden" id="websiteurl" value="<?php echo get_template_directory_uri();?>" />
</footer>

<div id="signUpForm" class="modal">
	<div class="modalOverlay"></div>
	<div class="modalBox">
		<span class="modalClose">&times;</span>
		<div class="signup_form_wrap">
			<h2 class="subheading">Sign-Up For Free!
				<div class="color_dots">
					<span class="green"></span>
					<span class="yellow"></span>
					<span class="red"></span>
					<span class="blue"></span>
				</div>
			</h2>                
			<div class="align_center">
				<h4 class="subheading2 small">YOU CAN REGISTER USING YOUR ACCOUNTS FROM</h4>
				<ul class="ul row social_login">
					<li class="col33">
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/signup_fb.png" alt="Sign Up with Facebook"></a>
					</li>
					<li class="col33">
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/signup_tw.png" alt="Sign Up with Twitter"></a>
					</li>
					<li class="col33">
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/signup_ins.png" alt="Sign Up with Instagram"></a>
					</li>
				</ul>
				<div class="or"><span>OR</span></div>
			</div>
			<form method="post" id="signup_form">
				<div class="border_btm">
					<ul class="ul row">
						<li class="col50">
							<label>First Name</label>
							<input type="text" class="required" placeholder="Write your first name" id="firstname" name="firstname">
						</li>
						<li class="col50">
							<label>Last Name</label>
							<input type="text" class="required" placeholder="Write your last name" id="lastname" name="lastname">
						</li>
						<li class="col50">
							<label>Username</label>
							<input type="text" class="required" name="username" id="username" placeholder="Write your username">
							<!--<div class="helptext"><img src="<?php echo get_template_directory_uri();?>/images/icon_unavailable.png" alt="Unavailable" /></div>-->
							<div class="helptext uservalidate"></div>
						</li>
						<li class="col50">
							<label>Birthdate</label>
							<div class="dob">
								<select class="required" id="month" name="month">
									<option value="">Month</option>
									<option value="01">January</option>
									<option value="02">February</option>
									<option value="03">March</option>
									<option value="04">April</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">August</option>
									<option value="09">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
								<select class="required" id="day" name="day">
									<option value="">Date</option>
								<?php
								for( $m=1; $m<=31; $m++ ){
								?>
									<option value="<?php echo $m;?>"><?php echo $m;?></option>
								<?php
								}
								?>
								</select>
								<select class="required" id="year" name="year">
									<option value="">Year</option>
								<?php
								for( $n=1950; $n<=date('Y'); $n++ ){
								?>
									<option value="<?php echo $n;?>"><?php echo $n;?></option>
								<?php
								}
								?>
								</select>
							</div>
						</li>
						<li class="col50">
							<label>E-mail Address</label>
							<input type="email" class="required" id="email_address" name="email_address" placeholder="Write your e-mail address">
						</li>
						<li class="col50">						
							<label>Gender</label>
							<div class="input_radio inline f14">
								<label class="">
									<input type="radio" name="gender" id="gender_male" value="Female" class="required gen"><em></em>
									<span>Female</span>
								</label>
								<label class="">
									<input type="radio" name="gender" id="gender_female" value="Male" class="required gen"><em></em>
									<span>Male</span>
								</label>
							</div>
							<input type="hidden" value="" name="gender_selected" id="gender_selected" class="selectgender" />
							<span id="culturemsg_gender"></span>
						</li>
						<li class="col100">
							<label>What’s Your Business?</label>
							<input type="text" class="required" id="business" name="business" placeholder="Write the name of your business">
							<div class="helptext"><a href="#">Are you a producer? <i class="fa fa-question"></i></a></div>
						</li>
						<li class="col50">
							<label>Password</label>
							<div class="showPass">
								<input type="password" class="required" name="password" id="password" placeholder="Write your password">
								<span class="showPassIcon"></span>
							</div>
						</li>
						<li class="col50">
							<label>Confirm Password</label>
							<div class="showPass">
								<input type="password" class="required" name="confirm_password" id="confirm_password" placeholder="Rewrite your password">
								<span class="showPassIcon"></span>
							</div>
						</li>
						<!--<li class="col50">
							<div class="input_checkbox">
								<label>
									<input type="checkbox" name="producer" value="producer"><em></em>
									<span>Are you a producer?</span>
								</label>
							</div>
						</li>-->
					</ul>
				</div>

				<div class="border_btm">
					<h4 class="subheading2 small">Pick the Cultures that represent you better</h4>
					<ul class="ul row pick_badge">
					<?php
					query_posts('post_type=culture&order=asc&orderby=id');
					if (have_posts()) : while (have_posts()) : the_post();
						$culture_icon = get_field( 'icon', $post->ID );
					?>
						<li id="<?php echo $post->ID;?>" class="col11">
							<label class="label_badge">
								<input id="check_<?php echo $post->ID;?>" type="checkbox">
								<span><img src="<?php echo $culture_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>" /></span>
							</label>
						</li>
					<?php
					endwhile; endif;
					wp_reset_query();
					?>
				   </ul>
				   <span id="culturemsg"></span>
				</div>
				<input type="hidden" value="" name="culture_selected" id="culture_selected" class="selectculture" />

				<div class="align_center">
					<ul class="ul row">
						<li class="col100">
							<div class="input_checkbox inline">
								<label class="">
									<input type="checkbox" id="notification" name="notification" value="Yes" checked="checked"><em></em>
									<span>I would like to receive occasionally, an email newsletter with trends, news and more.</span>
								</label>
							</div>
						</li>
						<li class="col100">
							<input type="submit" id="signup" value="LAUNCHING SOON" class="btnRed w80 />
						</li>
						<li class="col100 align_center">
							<small>By clicking this button, you agree to our <a href="#">Terms of Service</a>.</small>
						</li>
						<li class="align_center" id="message"></li>
				   </ul>
				</div>
			</form>
		</div>
	</div>
</div>

    <?php wp_footer(); ?>
</body>
</html>
