<?php
/*
Template Name: Language
*/
get_header('culture');
$banner_image					= get_field( 'community_page_banner', $post->ID );
$community_page_heading 		= get_field( 'community_page_heading', $post->ID );
$community_page_description 	= get_field( 'community_page_description', $post->ID );
$community_page_image 			= get_field( 'community_page_image', $post->ID );
$community_page_description_2 	= get_field( 'community_page_description_2', $post->ID );
$community_page_posts 			= get_field( 'community_page_posts', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="seller_banner help_banner">
				<div class="border_line top">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
				<img src="<?php echo get_template_directory_uri();?>/images/language_banner.jpg" alt="" />
                <div class="border_line">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
			</div>
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
                    
                    <div>
                        <h2 class="heading center">Cultrahub Languages</h2>
                        <div class="heading_tag">Whatever your first language might be, we are dedicated to helping you navigate our marketplace providing translations of our content into numerous languages from around the world. So let’s get started!</div>
                        
                        <div class="seller_fees clanguage">
                            <div class="seller_fees_head">
                                <h2 class="heading2">THE IMPORTANCE OF LEARNING A SECOND LANGUAGE</h2>
                            </div>
                            <div class="seller_fees_text">
                                <ul class="bullet bullet2">
                                    <li>
                                        <h3 class="subheading2">For A Better Aociety</h3>
                                        <p>Learn to communicate effectively with your neighbors and loved ones both locally and across the globe.</p>
                                    </li>
                                    <li>
                                        <h3 class="subheading2">Brush Up On Your Mother Tongue</h3>
                                        <p>Growing up in a place dominated by a different language may cause you to forget or be out of practice of your own.</p>
                                    </li>
                                    <li>
                                        <h3 class="subheading2">Improve Your Business Prospects</h3>
                                        <p>The ability to communicate in multiple languages is becoming more and more important in the global business community.</p>
                                    </li>
                                    <li>
                                        <h3 class="subheading2">Become Smarter</h3>
                                        <p>Learning a new language is not just about vocabulary, it’s about learning new gestures, sounds, and ways of thinking.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
			</div>
			<hr class="mt70 mb70">
			<div class="innerContainer">
			    <div class="communityList odd">
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_language1.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">PICK A LANGUAGE, <br>ANY LANGUAGE</h2>
			                <p>Never miss out on what’s happening.<br> Users can select the language of their choice for all content on the site, no matter who posted it!</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_language2.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">START SPEAKING LIKE <br>THE LOCAL!</h2>
			                <p>We have a variety of ways to learn a new language on Cultrahub, from online classes, to full courses, to helping you find the best tutors in your locale.</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_language3.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">SELL YOUR PRODUCTS GLOBALLY WITH EASE</h2>
			                <p>We automatically convert your product description and content into any desired language making sure you don’t miss out on that valuable sale.</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_language4.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">JUST <br>GET STUCK IN!</h2>
			                <p>Drive straight into the deep end and start interacting with other users from different cultures. Learn the language and make new friends! It’s a win win!</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			    </div>
			</div>
			<hr class="mt70 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');