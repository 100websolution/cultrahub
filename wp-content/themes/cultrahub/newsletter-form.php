<div class="section newsletter">
	<div class="container">
		<div class="color_dots">
			<span class="yellow"></span>
			<span class="red"></span>
			<span class="blue"></span>
			<span class="green"></span>
		</div>
		<h2 class="subheading"><strong class="blue"><?php _e('Interested?','cultrahub');?></strong> <?php _e('Leave us your email below to stay tuned and get more info!','cultrahub');?></h2>
		<div class="newsletter_form">
			<?php echo eemail_show(); ?>
			<!--<div class="rbNote">We promise to never to spam you!</div>-->
			<span id="eemail_msg" style="display:none;"></span>
		</div>
	</div>
</div>
<?php /**/ ?><div class="homeForm mt0">
	<?php echo eemail_show(); ?>
	<div id="eemail_msg" style="display:none;"></div>
</div>