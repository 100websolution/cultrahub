<div id="signUpForm" class="modal">
	<div class="modalOverlay"></div>
	<div class="modalBox">
		<span class="modalClose">&times;</span>
		<div class="signup_form_wrap">
			<h2 class="heading center nobrdr">Sign Up, For The Culture!
				<div class="color_dots">
					<span class="green"></span>
					<span class="yellow"></span>
					<span class="red"></span>
					<span class="blue"></span>
				</div>
			</h2>                
			<div class="align_center">
				<h4 class="subheading2 small">YOU CAN REGISTER USING YOUR ACCOUNTS FROM</h4>
				<?php echo do_shortcode('[wordpress_social_login]');?>
				<div class="or"><span>OR</span></div>
			</div>
			<form method="post" id="signup_form" class="form_validation">
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
						<?php /*<li class="col50">
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
						</li>*/ ?>
						<li class="col50">
							<label>E-mail Address</label>
							<input type="email" class="required" id="email_address" name="email_address" placeholder="Write your e-mail address">
						</li>
						<li class="col50">
							<label>Confirm E-mail Address</label>
							<input type="email" class="required" id="confirm_email_address" name="confirm_email_address" placeholder="Write your confirm e-mail address">
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
							<input type="text" class="" id="business" name="business" value="" placeholder="Write the name of your business">
							<div class="helptext"><!--<a href="#">Are you a producer?--> <i class="fa fa-question"></i></a></div>
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
						<li id="<?php echo $post->ID;?>" class="col10">
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
							<input type="submit" id="signup" value="LAUNCHING SOON" class="btnRed w80" />
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