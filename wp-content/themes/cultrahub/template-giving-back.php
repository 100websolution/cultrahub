<?php
/*
Template Name: Giving Back
*/
get_header('culture');
$banner_image				= get_field( 'learn_banner_image', $post->ID );

//Section 1
$learn_page_heading 		= get_field( 'learn_page_heading', $post->ID );
$learn_page_decription 		= get_field( 'learn_page_decription', $post->ID );
$learn_page_section_1		= get_field( 'learn_page_section_1', $post->ID );
//Section 2
$learn_page_posts			= get_field( 'learn_page_posts', $post->ID );
//Section 3
$learn_section_3_heading	= get_field( 'learn_section_3_heading', $post->ID );
$learn_section_3_description= get_field( 'learn_section_3_description', $post->ID );
$learn_page_section3_posts	= get_field( 'learn_page_section3_posts', $post->ID );
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
				<img src="<?php echo get_template_directory_uri();?>/images/giving_back_banner.jpg" alt="" />
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
                    <h2 class="heading center">Charities</h2>
                    <div class="heading_tag">There are some fantastic charities right in our neighborhood making a big difference in your community. It’s important to support and give back to the <br>community when we can. Helping in your local area, charity, or community group can make all the difference to those in need lives.</div>

                    <div class="innerContainer">
                        <div class="charity_icon_wrap">
                            <ul class="ul row">
                                <li class="col33">
                                    <div class="seller_block">
                                        <div class="seller_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_raising_money.png" alt=""></div>
                                        <div class="seller_text">
                                            <h3 class="subheading2">Start Raising <br>Money</h3>
                                            <p>Create a profile page for your Charity and provide relief and development services where they are needed the most. Just follow our simple instructions to set up your page and start collecting.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="col33">
                                    <div class="seller_block">
                                        <div class="seller_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_charity.png" alt=""></div>
                                        <div class="seller_text">
                                            <h3 class="subheading2">Local & International <br>Charities</h3>
                                            <p>Cultrahub endeavors to lead the way in charitable contributions through partnering with community centers, community out-reach programs, and foundations.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="col33">
                                    <div class="seller_block">
                                        <div class="seller_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_share_box.png" alt=""></div>
                                        <div class="seller_text">
                                            <h3 class="subheading2">Send A <br>Gift Of Hope</h3>
                                            <p>Support your loved ones away from home by sending gifts, experiences, memberships, and subscriptions to institutions throughout the word.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
			</div>
			<hr class="mt70 mb70">		
			<div class="innerContainer">
                <div class="learnList gblist">
                    <ul class="ul row">
                        <li class="col50">
                            <div class="learnBox">
                                <div class="learnImg">
                                    <img src="<?php echo get_template_directory_uri();?>/images/charityImg1.jpg" alt="">
                                </div>
                                <div class="learnText">
                                    <h3 class="heading nobrdr">Local Charities</h3>
                                    <p>From helping at your local charity, and out-reach programs to working a few hours a week in centers for the venerable and elderly. We have listed places in your locale that urgently need your help.</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li class="col50">
                            <div class="learnBox">
                                <div class="learnImg">
                                    <img src="<?php echo get_template_directory_uri();?>/images/charityImg2.jpg" alt="">
                                </div>
                                <div class="learnText">
                                    <h3 class="heading nobrdr">Community Fundraising</h3>
                                    <p>Make good things happen. Support your heart felt causes and give back to your community. Help gather donations, resources and raise awareness of things affecting your area. Start making a difference today.</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li class="col50">
                            <div class="learnBox">
                                <div class="learnImg">
                                    <img src="<?php echo get_template_directory_uri();?>/images/charityImg3.jpg" alt="">
                                </div>
                                <div class="learnText">
                                    <h3 class="heading nobrdr">International Crisis</h3>
                                    <p>These great organizations are devoted to helping less fortunate people in developing countries. International charities work throughout the world assisting with aid to victims of war, famine and natural disasters.</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li class="col50">
                            <div class="learnBox">
                                <div class="learnImg">
                                    <img src="<?php echo get_template_directory_uri();?>/images/charityImg4.jpg" alt="">
                                </div>
                                <div class="learnText">
                                    <h3 class="heading nobrdr">Local Charities</h3>
                                    <p>Help give back to the community or send hope to love ones away from home, whether in hospital, nursing homes, rehabilitation centers, or prisons. Sending a little gift will remind them they’re not forgotten and to never give up.</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                
			    <div class="mt80">
                    <div class="quote">Giving is not about making donations, it's about making a difference.</div>
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