<?php
/*
Template Name: Community
*/
get_header('culture');
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
				<img src="<?php echo get_template_directory_uri();?>/images/community_banner.jpg" alt="" />
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
                        <h2 class="heading center">Cultrahub Community</h2>
                        <div class="heading_tag">Our Cultrahub community consists of community groups and cultural representatives from different target markets who want to help shape and improve their neighborhood and increase awareness of social issues affecting their culture. A worldwide community for communities where its members can have fun, share ideas, tips, and knowledge, to get the most out of the platform.</div>
                        
                        <div class="row communityBlock f18">
                            <div class="col50">
                                <div class="communityImg"><img src="<?php echo get_template_directory_uri();?>/images/community.jpg" alt=""></div>
                            </div>
                            <div class="col50">
                                <div class="communityText">
                                    <h3 class="heading nobrdr">What Makes The Cultrahub Community</h3>
                                    <ul class="bullet bullet2">
                                        <li>Users from all parts of the world working together to ensure the best possible outcomes for local people.</li>
                                        <li>Our community the most learned scholars and teachers from all walks of life sharing their knowledge and skills to their followers.</li>
                                        <li>The essence of Cultrahub community is a place where members can learn, discuss, communicate and grow</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<hr class="mt70 mb70">
			<div class="innerContainer">
			    <div class="communityList">
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_community1.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">OUR SOCIAL <br>RESPONSABILITY</h2>
			                <p>Cultrahub puts emphasis on social involvement and having a positive impact in the community. Our mission is to ensure a balance between the local communities and having a positive relationship on society.</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_community2.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">CHARITIES & COMMUNITY FUNDRAISING</h2>
			                <p>Cultrahub endeavors to lead the way in charitable contributions through partnering with community centers, community out-reach programs, and non-for-profits to reach those in need. Check out the latest projects right here.</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_community3.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">DISCUSSION BOARD</h2>
			                <p>Got a topic you will like to discuss with other members? Go right ahead. Our Discussion Board is the best place to air your concerns in your community, debate current issues surrounding your cultures, and form business relationships to further grow your empire.</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_community4.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">ASK A QUESTION ON <br>OUR FORUM</h2>
			                <p>Our community members are on hand 24/7 to answer questions relating to the use of the site. A meeting point for its members to ask questions and exchange tips, advice, and services.</p>
			            </div>
			            <div class="clear"></div>
			        </div>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo get_template_directory_uri();?>/images/icon_community5.png" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr">CULTRAHUB <br>EVENTS AND NEWS</h2>
			                <p>Here we acknowledge the great work being done by you in the community and provide you details of events and outreach campaigns sponsored by Cultrahub. Mark us in your calendar, Join us in your community, and get involved!</p>
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