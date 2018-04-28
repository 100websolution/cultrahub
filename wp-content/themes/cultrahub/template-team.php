<?php
/*
Template Name: Team
*/
get_header('culture');
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
	<div class="section">
		<div class="container">
			<hr class="mb0 mt0">
        </div>
    </div>
	<div class="section teamSection">
		<div class="container">
			<div class="innerContainer">
			    <div class="teamHead">
			        <h2 class="heading nobrdr">Jihad R. Taylor</h2>
                    <ul class="borderbar_list fleft">
                        <li>Chief Executive</li>
                        <li><span class="blueLight">Jihad@cultrahub.com</span></li>
                    </ul>
			        <a href="#" class="fright">
			            <img src="<?php echo get_template_directory_uri();?>/images/linkedin.png" alt="" height="25" class="display-block">
			         </a>
			        <div class="clear"></div>
			    </div>
				<div class="teamImg">
				    <img src="<?php echo get_template_directory_uri();?>/images/team1.jpg" alt="">
				    <div class="color_dots mt30">
                        <span class="green"></span>
                        <span class="yellow"></span>
                        <span class="red"></span>
                        <span class="blue"></span>
                    </div>
				</div>
				<div class="teamText">
                    <div>
                        <h3 class="subheading2">Biography</h3>
                        <p>As the proud founder and CEO of Cultrahub, Jihad has aspired to pioneer a new avenue for all consumers and entrepreneurs to Learn, Sell, and Shop.</p>
                        <p>His vison and unique feature of grouping products by cultural theme distinguishes the Company in the online marketplace from any other e-commerce platform available today.</p>
                        <p>Born and raised in Indianapolis Indiana, Jihad has undergone extensive education in the field of Business management, Branding, entrepreneurship and cultural studies, all the while attaining a BA, 2 associate degrees from Indiana university Purdue University of Indianapolis and Ball State University. After graduating Jihad furthered his education by studying Business Model design and with more focus on the Platform Business model. Jihad attended the MIT Platform strategy summit and formed connections with experts of the model. He recently earned a verified certification from Boston University for Platform Strategies for Business. Jihad’s objective is to design scalable Platform business models that can create an economic impact for businesses, entrepreneurs, communities and society at large, connecting producers and consumers through technology.</p>
                        <p>Jihad has now recruited a great team around him. Together they are building a platform where people can foster love and understanding to each other’s cultures and help build an ecosystem that can rebuild broken communities and increase production and entrepreneurship in the US and the world at large.</p>
                    </div>
				    
				    <div class="mt30">
                        <h3 class="subheading2">Key Skills</h3>
                        <ul class="bullet bullet2">
                            <li>Business Leadership and Operations</li>
                            <li>Platform Architecture & Design</li>
                            <li>Business Planning & Strategy</li>
                            <li>Entrepreneurship & Sales</li>
                            <li>Marketing & Branding</li>
                            <li>Public Speaking</li>
                        </ul>
                    </div>
				    
				    <div class="mt30">
				        <p>Please feel free to connect, I look forward to answering any questions you may have</p>
                        <a href="#" class="goback fright"><img src="<?php echo get_template_directory_uri();?>/images/icon_refresh.png" alt=""> Go Back</a>
                    </div>
				</div>
				<div class="clear"></div>
			</div>
			<hr class="mt70 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');