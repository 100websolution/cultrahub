<?php
/*
Template Name: Welcome
*/
//get_header('culture');
if( isset($_GET) && $_GET['id'] != '' ){
	$first_name = get_user_meta( base64_decode($_GET['id']), 'first_name', true );
	$last_name = get_user_meta( base64_decode($_GET['id']), 'last_name', true );
	$user_name = $first_name.' '.$last_name;
}else{
	$user_name = 'Customer';
}
?>
<!--MAIN CONTAINER START-->
<div style="text-align: center;">
	<table width="800" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;font-family: Arial, Helvetica, sans-serif;background: url(<?php echo get_template_directory_uri();?>/template_images/bg-welcome-emktg.jpg) no-repeat top center;">
		<tr>
			<td style="padding: 0 0 20px;">
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
					<tr>
						<td style="padding: 10px 0;font-size: 10px;line-height: 15px; color: #58595b;">
							<p style="padding: 0;margin: 0;float: left;">Welcome to Cultrahub!</p>
							<p style="padding: 0;margin: 0;float: right;"><a href="<?php echo get_permalink( 3811 );?>?id=<?php echo $_GET['id'];?>" style="text-decoration: none;color: #1755ca;">View in your browser</a></p>
						</td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<a href="<?php echo site_url();?>" style="text-decoration: none;color: #1755ca;">
								<img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="" width="290" />
							</a>
						</td>
					</tr>
					<tr>
						<td style="text-align: center;padding: 45px 0 0;">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
								<tr>
									<td align="center" style="padding:0;">
										<a href="<?php echo get_permalink( 2543 );?>" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
											<img src="<?php echo get_template_directory_uri();?>/template_images/icon_popular_store.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Popular Stores
										</a>
									</td>
									<td align="center" style="padding:0;">
										<a href="<?php echo get_permalink( 2499 );?>" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
											<img src="<?php echo get_template_directory_uri();?>/template_images/icon_trending_now.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Trending Now
										</a>
									</td>
									<td align="center" style="padding:0;">
										<a href="<?php echo get_permalink( 2671 );?>" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
											<img src="<?php echo get_template_directory_uri();?>/template_images/icon_exclusive.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Exclusive
										</a>
									</td>
									<td align="center" style="padding:0;">
										<a href="<?php echo get_permalink( 2444 );?>" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
											<img src="<?php echo get_template_directory_uri();?>/template_images/icon_custom.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Customs
										</a>
									</td>
									<td align="center" style="padding:0;">
										<a href="<?php echo get_permalink( 2770 );?>" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
											<img src="<?php echo get_template_directory_uri();?>/template_images/icon_share_quote.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Share a Quote
										</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td>
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;color: #414042;text-align: center;">
					<tr>
						<td style="padding: 45px 0 0;font-size: 12px;line-height: 18px;">
							<p style="margin:0;padding: 0 0 2px;font-size: 16px;line-height: 20px;">GREAT TO HAVE YOU ON BOARD!</p>
							<p style="margin:0 0 20px;padding: 0 0 20px;font-size: 36px;line-height: 36px;font-weight: bold;border-bottom: 1px solid #d1d3d4;">Welcome To Cultrahub</p>
							<p style="margin:0;padding: 0 0 25px;">Hi <span><?php echo $user_name;?></span>, Welcome to Cultrahub! We have everything you could possibly need for you to learn, shop and sell online. From the latest videos by your favourite cultural scholars, to the newest trending<br> accessories, fashion garments and electronics. If its Cultural based, we have it here!</p>
							<p style="margin:0 -100px;padding: 0 0 35px;"><img src="<?php echo get_template_directory_uri();?>/template_images/laptop_banner.png" alt="" width="100%" style="display: block;margin:0;" /></p>
							
							<p style="margin:0;padding: 0 0 15px;"><img src="<?php echo get_template_directory_uri();?>/template_images/learn-sell-shop.png" alt="" width="400" style="display: block;margin:0 auto;" /></p>
							<p style="margin:0;padding: 0 0 30px;">The best place to start exploring our platform is from the "About us" page.  Here you'll find more details on our great team, and the wonderful work we aim to achieve. If you need any help, just let us know, <br>we'll be happy to assist!</p>
							<p style="margin:0;padding: 0;"><a href="<?php echo get_permalink( 3054 );?>" style="text-decoration: none;color: #fff;line-height:30px;font-weight: bold;background: #ec4034;display: inline-block;padding: 0 30px;">Take a Look Around</a></p>
						</td>
					</tr>
					
					<tr>
						<td style="padding: 30px 0 0;font-size: 12px;line-height: 18px;">
							<p style="margin:0;padding: 0 0 40px;font-size: 24px;line-height: 34px;font-weight: bold;">Here is our Top 4 Services to Quench Your <br>Cultural Thirst. Enjoy!</p>
							
							<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
								<tr>
									<td style="padding: 0 0 35px;font-size: 12px;line-height: 18px;">
										<p style="padding: 30px 0;margin: 0 20px 0 0;float: left;width: 150px;border-right: 5px solid #e6e7e9;text-align: center;"><img src="<?php echo get_template_directory_uri();?>/template_images/icon_learn.png" alt="" height="90" /></p>
										<p style="padding: 6px 0 3px;margin: 0;font-size: 21px;line-height: 26px;font-weight: bold;text-align: left;">LEARN CULTURES</p>
										<p style="padding: 0 0 3px;margin: 0;font-size: 16px;line-height: 26px;text-align: left;">Ready to Learn Something New?</p>
										<p style="padding: 0 0 5px;margin: 0;text-align: left;">We have carefully curated our cultural content to bring you the very best articles, news, and video clips from top cultural leaders, businessmen, and producers in your community. </p>
										<p style="padding: 0;margin: 0;font-size: 10px; line-height: 20px;text-align: left;"><a href="<?php echo get_permalink( 3075 );?>" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
									</td>
								</tr>
								<tr>
									<td style="padding: 0 0 35px;font-size: 12px;line-height: 18px;">
										<p style="padding: 33px 0;margin: 0 0 0 20px;float: right;width: 150px;border-left: 5px solid #e6e7e9;text-align: center;"><img src="<?php echo get_template_directory_uri();?>/template_images/icon_sell.png" alt="" height="84" /></p>
										<p style="padding: 6px 0 3px;margin: 0;font-size: 21px; line-height: 26px;font-weight: bold;text-align: right;">SELL ON OUR PLATFORM</p>
										<p style="padding: 0 0 3px;margin: 0;font-size: 16px;line-height: 26px;text-align: right;">Who Said Starting A Business Would Be Hard?</p>
										<p style="padding: 0 0 5px;margin: 0;text-align: right;">Diversify your revenue streams by joining a global platform and reaching millions of new customers. Cultrahub provides you with everything you need to become a success!</p>
										<p style="padding: 0;margin: 0;font-size: 10px;line-height: 20px;text-align: right;"><a href="<?php echo get_permalink( 2362 );?>" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
									</td>
								</tr>
								<tr>
									<td style="padding: 0 0 35px;font-size: 12px;line-height: 18px;">
										<p style="padding: 30px 0;margin: 0 20px 0 0;float: left;text-align: center;width: 150px;border-right: 5px solid #e6e7e9;text-align: center;"><img src="<?php echo get_template_directory_uri();?>/template_images/icon_shop.png" alt="" height="90" /></p>
										<p style="padding: 6px 0 3px;margin: 0;font-size: 21px; line-height: 26px;font-weight: bold;text-align: left;">SHOP AMONG CULTURES</p>
										<p style="padding: 0 0 3px;margin: 0;font-size: 16px; line-height: 26px;text-align: left;">Find What You Need at A Price You Can\'t Resist.</p>
										<p style="padding: 0 0 5px;margin: 0;font-size: 12px; line-height: 18px;text-align: left;">Celebrate diversity with a selection of the hottest swag, and authentic handcrafted cultural products you won\'t find anywhere else! Get your hands on the latest and most unique set of products specially grouped by culture.</p>
										<p style="padding: 0;margin: 0;font-size: 10px; line-height: 20px;text-align: left;"><a href="<?php echo get_permalink( 3062 );?>" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
									</td>
								</tr>
								<tr>
									<td style="padding: 0;font-size: 12px;line-height: 18px;">
										<p style="padding: 40px 0;margin: 0 0 0 20px;float: right;text-align: center;width: 150px;border-left: 5px solid #e6e7e9;text-align: center;"><img src="<?php echo get_template_directory_uri();?>/template_images/icon_social.png" alt="" height="70" /></p>
										<p style="padding: 6px 0 3px;margin: 0;font-size: 21px; line-height: 26px;font-weight: bold;text-align: right;">SOCIAL-COMMERCE</p>
										<p style="padding: 0 0 3px;margin: 0;font-size: 16px;line-height: 26px;text-align: right;">Socialise & Make New Friends</p>
										<p style="padding: 0 0 5px;margin: 0;text-align: right;">Create & share quotes, reviews and viral Memes with sellers, cultural groups and friends. Or, why not become the next social media influencer by building a network of groups and followers interested in your say.</p>
										<p style="padding: 0;margin: 0;font-size: 10px;line-height: 20px;text-align: right;"><a href="<?php echo site_url();?>" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td style="padding: 40px 0 0;font-size: 12px;line-height: 18px;">
							<p style="margin:0;padding: 0 0 12px;font-size: 24px;line-height: 34px;font-weight: bold;">What Happens Now?</p>
							<p style="margin:0;padding: 0;">We will be going live very soon! In the meantime, keep an eye on your inbox, we'll keep you updated on our progress. If you would like to share your thoughts, comments or recommendations for our site, please get in touch <a href="<?php echo site_url();?>#share_thought" style="text-decoration: none;color: #1755ca;">here</a> our team will be delighted to hear from you.</p>
						</td>
					</tr>
					
					<tr>
						<td style="padding: 45px 0 0;">
							<p style="margin:0;padding: 0 0 3px;font-size: 20px;line-height: 22px;">The World's First Online Marketplace</p>
							<p style="margin:0;padding: 0 0 18px;font-size: 24px;line-height: 30px;">Focused On Culture, Community And Commerce!</p>
							
							<table width="450" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
								<tr>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/african-american/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_african_american.png" alt="African American Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/african/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_african.png" alt="African Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/american/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_american.png" alt="American Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/asian/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_asian.png" alt="Asian Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/business/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_business.png" alt="Business Culture" height="75" /></a>
									</td>
								</tr>
								<tr>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/canadian/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_canadian.png" alt="Canadian Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/christianity/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_christianity.png" alt="Christianity Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/great-britain/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_great_britain.png" alt="Great Britain Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/hip-hop/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_hiphop.png" alt="Hip-Hop Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/indian/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_indian.png" alt="Indian Culture" height="75" /></a>
									</td>
								</tr>
								<tr>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/islamic/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_islamic.png" alt="Islamic Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/island/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_island.png" alt="Island Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/judaism/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_judaism.png" alt="Judaism Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/latin/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_latin.png" alt="Latin Culture" height="75" /></a>
									</td>
									<td align="center" style="padding: 0 0 15px;">
										<a href="<?php echo site_url();?>/culture/mexican/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_mexican.png" alt="Mexican Culture" height="75" /></a>
									</td>
								</tr>
								<tr>
									<td align="center">
										<a href="<?php echo site_url();?>/culture/middle-eastern/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_middie_eastern.png" alt="Middie Eastern Culture" height="75" /></a>
									</td>
									<td align="center">
										<a href="<?php echo site_url();?>/culture/pop/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_pop.png" alt="Pop Culture" height="75" /></a>
									</td>
									<td align="center">
										<a href="<?php echo site_url();?>/culture/pride/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_pride.png" alt="Pride Culture" height="75" /></a>
									</td>
									<td align="center">
										<a href="<?php echo site_url();?>/culture/school/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_school.png" alt="School Culture" height="75" /></a>
									</td>
									<td align="center">
										<a href="<?php echo site_url();?>/culture/street/" style="text-decoration: none;display: inline-block;"><img src="<?php echo get_template_directory_uri();?>/template_images/badge_street.png" alt="Street Culture" height="75" /></a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td>
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;color: #414042;text-align: center;">
					<tr>
						<td style="padding: 30px 0;">
							<p style="margin:0;padding: 0 0 28px;"><img src="<?php echo get_template_directory_uri();?>/template_images/color_dots.png" alt="" height="6" /></p>
							<p style="margin:0;padding: 0 0 30px;font-size: 24px;line-height: 30px;font-weight: bold;">Our Social Media Channels</p>
							<p style="margin:0;padding: 0;">
								<a href="http://www.facebook.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="<?php echo get_template_directory_uri();?>/template_images/social_facebook.png" alt="Facebook" height="25" /></a>
								<a href="http://www.twitter.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="<?php echo get_template_directory_uri();?>/template_images/social_twitter.png" alt="Twitter" height="25" /></a>
								<a href="http://www.instagram.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="<?php echo get_template_directory_uri();?>/template_images/social_instagram.png" alt="Instagram" height="25" /></a>
								<a href="http://www.youtube.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="<?php echo get_template_directory_uri();?>/template_images/social_ytube.png" alt="You Tube" height="25" /></a>
								<a href="http://www.linkedin.com" target="_blank" style="display: inline-block;vertical-align: top;"><img src="<?php echo get_template_directory_uri();?>/template_images/social_linkedin.png" alt="Linkedin" height="25" /></a>
							</p>
						</td>
					</tr>
					
					<tr>
						<td style="padding: 0 0 45px;">
							<p style="margin:0;padding: 0 0 6px;font-size: 10px;line-height: 16px;">You are reciving this email because you subscribed at <a href="<?php echo site_url();?>" style="color: inherit;text-decoration: none;">www.cultrahub.com</a>, To opt-out of receiving<br> future email, you may do so here.</p>
							<p style="margin:0;padding: 0 0 6px;font-size: 10px;line-height: 16px;color: #1755ca;">350 Massachusetts Avenue, 3rd Floor, Indianapolis, IN - 46204.</p>
							<p style="margin:0;padding: 0;font-size: 10px;line-height: 16px;">This email was sent from a notification-only address that cannot accept incoming emails.<br>Please do not reply to this message. If you have any questions or concerns, please contact us at <a href="mailto:support@cultrahub.com" style="text-decoration: none;color: #1755ca;">support@cultrahub.com</a></p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<!--MAIN CONTAINER END-->