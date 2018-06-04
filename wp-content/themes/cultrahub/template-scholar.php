<?php
/*
Template Name: Scholar
*/
get_header('culture');
$banner_image				= get_field( 'gb_page_banner_image', $post->ID );
//Section 1
$gb_page_heading 			= get_field( 'gb_page_heading', $post->ID );
$gb_page_short_description 	= get_field( 'gb_page_short_description', $post->ID );
//Post 1
$gb_page_posts1			= get_field( 'gb_page_posts1', $post->ID );
//Post 2
$gb_page_posts2			= get_field( 'gb_page_posts2', $post->ID );

$quote					= get_field( 'quote', $post->ID );
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
				<img src="<?php echo get_template_directory_uri();?>/images/scholar_banner.jpg" alt="" />
				<div class="border_line">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
			</div>
			<hr class="mt35 mb35">
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
                    <h2 class="heading center">Cultural Scholars</h2>
                    <div class="heading_tag">Connect with influencers and other likeminded individuals from around the world. Be inspired by their stories and challenged by the seminars <br>from your favorite, activists and speakers.</div>
                    <div class="innerContainer2">
                        <div class="schlar_icon_wrap">
                            <ul class="ul row">
                                <li class="col50">
                                    <div class="schlar_block">
                                        <div class="schlar_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_browse_find.png" alt=""></div>
                                        <div class="schlar_text">
                                            <h3 class="subheading2">Browse & Find:</h3>
                                            <p>Interesting topics and discussions from influencers from different cultures and backgrounds covering a wide range of subjects and interests.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="col50">
                                    <div class="schlar_block">
                                        <div class="schlar_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_have_question.png" alt=""></div>
                                        <div class="schlar_text">
                                            <h3 class="subheading2">Have a Question?</h3>
                                            <p>Do not guess or assume, find a qualified scholar and join the discussions where you can engage and have your own inquiries satisfied.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="col50">
                                    <div class="schlar_block">
                                        <div class="schlar_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_become_scholar.png" alt=""></div>
                                        <div class="schlar_text">
                                            <h3 class="subheading2">Become a Scholar:</h3>
                                            <p>Create and customize your profile page to attract a large following and where you can share your knowledge and experience with the world.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="col50">
                                    <div class="schlar_block">
                                        <div class="schlar_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_knowledge.png" alt=""></div>
                                        <div class="schlar_text">
                                            <h3 class="subheading2">Increase your Knowledge:</h3>
                                            <p>Connect and follow influencers and learn from their expertise</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
			</div>
			<hr class="mt70 mb70">		
			<div class="innerContainer2">
                <div class="shopSection odd">
                    <div class="shopBlock">
                        <div class="shopImg"><img src="<?php echo get_template_directory_uri();?>/images/scholar1.jpg" alt=""></div>
                        <div class="shopText">
                            <h2 class="heading nobrdr">Stimulate Thought Provoking Conversations</h2>
                            <p>Join on-going discussions or create your own topic to discuss key issues relating to things affecting the culture.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="shopBlock">
                        <div class="shopImg"><img src="<?php echo get_template_directory_uri();?>/images/scholar2.jpg" alt=""></div>
                        <div class="shopText">
                            <h2 class="heading nobrdr">Gain In-Depth Knowledge On<br> Different Cultures</h2>
                            <p>Learn from top leaders on topics such as Race and Cultural Diversity, politics and religion.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="shopBlock">
                        <div class="shopImg"><img src="<?php echo get_template_directory_uri();?>/images/scholar3.jpg" alt=""></div>
                        <div class="shopText">
                            <h2 class="heading nobrdr">Overcoming Stereo Types</h2>
                            <p>Grow your understanding of different cultures and find out why different cultures really do what they do.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="shopBlock">
                        <div class="shopImg"><img src="<?php echo get_template_directory_uri();?>/images/scholar4.jpg" alt=""></div>
                        <div class="shopText">
                            <h2 class="heading nobrdr">Become An Influencer</h2>
                            <p>Grow your followers and keep them engaged with your expertise, learn how to leverage your followers and monetize by offering products related to your topics that can be purchased right then and there!</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
			    <div class="mt80">
                    <div class="quote noicon">Follow your favorite influencers and learn from among various topics such as religion, history,
cooking, business, health and beauty, and more right here on Cultrahub.</div>
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