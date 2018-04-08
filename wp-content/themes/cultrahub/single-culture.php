<?php
get_header( 'culture-other' );
global $post;
$thePostID = $post->ID;

//top section
$cf_icon = get_field( 'icon', $post->ID );
$banner_images = get_field( 'banner_images', $post->ID );

//Person Details
$author_name 					= get_field( 'name', $post->ID );
$author_designation				= get_field( 'designation', $post->ID );
$author_biography				= get_field( 'biography', $post->ID );
$author_video_url 				= get_field( 'video_url', $post->ID );
$featured_personality_image 	= get_field( 'featured_personality_image', $post->ID );

//Featured Products
$featured_product_short_description = get_field( 'featured_product_short_description', $post->ID );
$featured_products					= get_field( 'products', $post->ID );
//echo '<pre>'; print_r($featured_products); die;

//Popular Store Clips
$psc_short_description	= get_field( 'psc_short_description', $post->ID );
$ps_video_clips			= get_field( 'video_clips', $post->ID );

//Words of the Street
$wos_short_description	= get_field( 'ws_short_description', $post->ID );
$wos_slider_details		= get_field( 'slider_images', $post->ID );

//Categories Among the Culture
$culture_categories = get_field( 'culture_categories' );

//Inner Culture//
//for Hip-hip
$inner_culture_heading_fyrbcoast 			= get_field( 'fyrbcoast_inner_culture_heading', $post->ID );
$inner_culture_short_description_fyrbcoast	= get_field( 'fyrbcoast_inner_culture_short_description', $post->ID );
$inner_cultures_fyrbcoast					= get_field( 'fyrbcoast_inner_cultures', $post->ID );
//for Island
$inner_culture_heading_mcatilands 			= get_field( 'mcatilands_inner_culture_heading', $post->ID );
$inner_culture_short_description_mcatilands	= get_field( 'mcatilands_inner_culture_short_description', $post->ID );
$inner_cultures_mcatilands					= get_field( 'mcatilands_inner_cultures', $post->ID );
//for Christianity
$inner_culture_heading_christianity 			= get_field( 'christianity_inner_culture_heading', $post->ID );
$inner_culture_short_description_christianity	= get_field( 'christianity_inner_culture_short_description', $post->ID );
$inner_cultures_christianity					= get_field( 'christianity_inner_cultures', $post->ID );
//for School
$inner_culture_heading_school 			= get_field( 'school_inner_culture_heading', $post->ID );
$inner_culture_short_description_school	= get_field( 'school_inner_culture_short_description', $post->ID );
$inner_cultures_school					= get_field( 'school_inner_cultures', $post->ID );
//for Islamic
$inner_culture_heading_islamic 			= get_field( 'islamic_inner_culture_heading', $post->ID );
$inner_culture_short_description_islamic= get_field( 'islamic_inner_culture_short_description', $post->ID );
$inner_cultures_islamic					= get_field( 'islamic_inner_cultures', $post->ID );

?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="clearfix">
				<div class="culture_banner_wrap">
					<div class="owl-carousel culture_banner">
					<?php
					if( !empty( $banner_images ) ){
						foreach( $banner_images as $val_bi ){
					?>
						<div class="item">
							<div class="banner_block">
								<a href="javascript:void(0);"><img src="<?php echo $val_bi['image']['sizes']['cultrahub-culture-banner'];?>" width="<?php echo $val_bi['image']['sizes']['cultrahub-culture-banner-width'];?>" alt="<?php echo $val_bi['image']['title'];?>" /></a>
							</div>
						</div>
					<?php
						}
					}
					?>	
					</div>
				</div>
				
				<div class="culture_desp">
					<div class="culture_text">
						<span class="culture_icon"><img src="<?php echo $cf_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php echo $cf_icon['title'];?>" width="<?php echo $cf_icon['sizes']['cultrahub-home-icon-width'];?>" /></span>
						<div class="culture_text_inner">
							<div class="culture_head">
								<h3 class="culture_title"><?php echo get_field( 'title', $post->ID );?></h3>
								<div class="cultute_span"><?php the_title();?></div>
								<div class="culture_info">Culture 
								<?php if( get_field( 'followers', $post->ID ) ){ ?>
									<span><em><?php echo get_field( 'followers', $post->ID );?></em> Followers</span>
								<?php } ?>
								</div>
								<a href="#" class="btn btnRed followbtn">FOLLOW</a>
							</div>
							<div class="cultureP">
								<?php echo get_field( 'culture_description' );?>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
            <hr class="mt35 mb35">
		    
			<div class="">
                <div class="heading_block">
                    <div class="heading2 center small"><img alt="" src="<?php echo get_template_directory_uri();?>/images/learn_sell_shop.png"></div>
                    <div class="color_dots">
                        <span class="yellow"></span>
                        <span class="red"></span>
                        <span class="blue"></span>
                        <span class="green"></span>
                    </div>
                </div>
                <div class="innerContainer">
                    <div class="culture_bio">
                        <div class="bio_img">
                            <?php
							if( !empty($featured_personality_image) ){
							?>
								<div class="ytube_vdo">							
									<img alt="" src="<?php echo $featured_personality_image['url'];?>">
								</div>
							<?php
							}
							else if( $author_video_url != '' ){
                                echo do_shortcode( '[arve url="' . $author_video_url . '" align="center" parameters="start=30" /]' );
                            }	
                            ?>
                            <!--<div class="ytube_vdo">							
                                <span class="play_vdo"></span>
                            </div>-->
                        </div>
                        <div class="bio_text">
                            <h3 class="bio_title">Featured Personality of the Week</h3>
                            <h3 class="bio_title small"><?php echo $author_name;?></h3>
                        <?php if( $author_designation != '' ){ ?>
                            <div class="bio_small"><?php echo $author_designation;?></div>
                        <?php } ?>
                            <div>
                                <?php echo strip_tags(substr($author_biography,0,380));?>
                            </div>
                        <?php if( $author_biography != '' ){ ?>
                            <div class="fright mt_25">
                                <!--<a href="javascript:void(0);" class="readRight" data-target="#fullBiography" data-toggle="modal">Read More</a>-->
                                <a href="javascript:void(0);" class="readRight">Read More</a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<!-- Modal -->
		<div id="fullBiography" class="modal fade" role="dialog">
			<div class="modal-dialog">			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Biography</h4>
					</div>
					<div class="modal-body">
						<?php echo $author_biography;?>
					</div>
					<div class="modal-footer">&nbsp;</div>
				</div>			
			</div>
		</div>
		<!-- Modal -->
	</div>
	
	<?php
	if( !empty($featured_products) ){
        ?>
        <div class="section">
            <div class="container">
                <h2 class="heading center">Featured Products</h2>
                <div class="heading_tag"><?php echo nl2br( strip_tags($featured_product_short_description) );?></div>
                <div class="innerContainer">
                    <div class="owl-carousel owl4">
                <?php			
                    foreach( $featured_products as $val_fp ){
                        $fp_image_meta_details	= get_post_meta( $val_fp->ID, '_thumbnail_id', true );
                        $fp_image 				= wp_get_attachment_image_src( $fp_image_meta_details, array( 258, 258 ) );
                        $product_name			= get_field( 'title_for_culture', $val_fp->ID );
                        //echo '<pre>'; print_r($fp_image); die;
                ?>
                        <div class="item">
                            <div class="product_block">
                                <div class="product_img square_block">
                                    <img src="<?php echo $fp_image[0];?>" width="<?php echo $fp_image[1];?>" alt="">
                                    <a href="#" class="expand_icon"></a>
                                </div>
                                <?php /*<div class="product_text">
                                    <h3 class="product_title"><?php echo $product_name;?></h3>
                                </div>*/?>
                            </div>
                        </div>
                <?php
                    }
                ?>		
                    </div>
                </div>
            </div>
        </div>
        <?php
	}
	?>
	
	<?php
	/* For Inner Culture Section Start Here */
	if( !empty($inner_culture_heading_fyrbcoast) ){
        ?>
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <h2 class="heading center"><?php echo $inner_culture_heading_fyrbcoast;?></h2>
                <?php
                if( !empty($inner_culture_short_description_fyrbcoast) ){
                ?>
                    <div class="heading_tag"><?php echo $inner_culture_short_description_fyrbcoast;?></div>
                <?php
                }
                if( !empty($inner_cultures_fyrbcoast) ){				
                ?>
                    <div class="coast_list">
                        <ul class="row ul">
                <?php
                    foreach($inner_cultures_fyrbcoast as $key_ic => $val_ic){
                ?>
                            <li class="col25">
                                <div class="product_block">
                                    <div class="product_img square_block">
                                        <img src="<?php echo $val_ic['fyrbcoast_culture_image']['sizes']['cultrahub-culture-inner-fyrbcoast'];?>" alt="<?php echo $val_ic['fyrbcoast_culture_image']['title'];?>" width="<?php echo $val_ic['fyrbcoast_culture_image']['sizes']['cultrahub-culture-inner-fyrbcoast-width'];?>" />
                                    </div>
                                    <div class="product_text">
                                        <h3 class="product_title"><a href="javascript:void(0);"><?php echo $val_ic['fyrbcoast_culture_title'];?></a></h3>
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
        <?php
	}
	if( !empty($inner_culture_heading_mcatilands) ){
        ?>
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <h2 class="heading center"><?php echo $inner_culture_heading_mcatilands;?></h2>
                <?php
                if( !empty($inner_culture_short_description_mcatilands) ){
                ?>
                    <div class="heading_tag"><?php echo $inner_culture_short_description_mcatilands;?></div>
                <?php
                }
                if( !empty($inner_cultures_mcatilands) ){
                ?>
                    <ul class="row ul">
                <?php
                    foreach($inner_cultures_mcatilands as $val_ic){
                ?>
                        <li class="col20">
                            <div class="product_block">
                                <div class="product_img square_block">
                                    <img src="<?php echo $val_ic['mcatilands_culture_image']['sizes']['cultrahub-culture-inner-mcatilands'];?>" alt="<?php echo $val_ic['mcatilands_culture_image']['title'];?>" width="<?php echo $val_ic['mcatilands_culture_image']['sizes']['cultrahub-culture-inner-mcatilands-width'];?>" />
                                    <a href="#" class="expand_icon"></a>
                                </div>
                                <div class="product_text">
                                    <h3 class="product_title"><a href="javascript:void(0);"><?php echo $val_ic['mcatilands_culture_title'];?></a></h3>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                ?>
                    </ul>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
        <?php
	}
	if( !empty($inner_culture_heading_christianity) ){
        ?>
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <h2 class="heading center"><?php echo $inner_culture_heading_christianity;?></h2>
                <?php
                if( !empty($inner_culture_short_description_christianity) ){
                ?>
                    <div class="heading_tag"><?php echo $inner_culture_short_description_christianity;?></div>
                <?php
                }
				?>
                </div>
				<?php
                if( !empty($inner_cultures_christianity) ){
                ?>
                    <ul class="row ul">
                <?php
                    foreach($inner_cultures_christianity as $val_ic){
                ?>
                        <li class="col20">
                            <div class="product_block">
                                <div class="product_img square_block">
                                    <img src="<?php echo $val_ic['christianity_culture_image']['sizes']['cultrahub-culture-inner-christianity'];?>" alt="<?php echo $val_ic['christianity_culture_image']['title'];?>" width="<?php echo $val_ic['christianity_culture_image']['sizes']['cultrahub-culture-inner-christianity-width'];?>" />
                                    <a href="#" class="expand_icon"></a>
                                </div>
                                <div class="product_text">
                                    <h3 class="product_title"><a href="javascript:void(0);"><?php echo $val_ic['christianity_culture_title'];?></a></h3>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                ?>		
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
	}
	if( !empty($inner_culture_heading_school) ){
        ?>
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <h2 class="heading center"><?php echo $inner_culture_heading_school;?></h2>
                <?php
                if( !empty($inner_culture_short_description_school) ){
                ?>
                    <div class="heading_tag"><?php echo $inner_culture_short_description_school;?></div>
                <?php
                }
                if( !empty($inner_cultures_school) ){
                ?>
                    <ul class="row ul">
                <?php
                    foreach($inner_cultures_school as $val_ic){
                ?>
                        <li class="col20">
                            <div class="product_block">
                                <div class="product_img square_block">
                                    <img src="<?php echo $val_ic['school_culture_image']['sizes']['cultrahub-culture-inner-school'];?>" alt="<?php echo $val_ic['school_culture_image']['title'];?>" width="<?php echo $val_ic['school_culture_image']['sizes']['cultrahub-culture-inner-school-width'];?>" />
                                    <a href="#" class="expand_icon"></a>
                                </div>
                                <div class="product_text">
                                    <h3 class="product_title"><a href="javascript:void(0);"><?php echo $val_ic['school_culture_title'];?></a></h3>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                ?>
                    </ul>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
        <?php
	}
	if( !empty($inner_culture_heading_islamic) ){
        ?>
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <h2 class="heading center"><?php echo $inner_culture_heading_islamic;?></h2>
                <?php
                if( !empty($inner_culture_short_description_islamic) ){
                ?>
                    <div class="heading_tag"><?php echo $inner_culture_short_description_islamic;?></div>
                <?php
                }
                if( !empty($inner_cultures_islamic) ){
                ?>
                    <ul class="row ul">
                <?php
                    foreach($inner_cultures_islamic as $val_ic){
                ?>
                        <li class="col20">
                            <div class="product_block">
                                <div class="product_img square_block">
                                    <img src="<?php echo $val_ic['islamic_culture_image']['sizes']['cultrahub-culture-inner-islamic'];?>" alt="<?php echo $val_ic['islamic_culture_image']['title'];?>" width="<?php echo $val_ic['islamic_culture_image']['sizes']['cultrahub-culture-inner-islamic-width'];?>" />
                                    <a href="#" class="expand_icon"></a>
                                </div>
                                <div class="product_text">
                                    <h3 class="product_title"><a href="javascript:void(0);"><?php echo $val_ic['islamic_culture_title'];?></a></h3>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                ?>
                    </ul>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
        <?php
	}
	/* For Inner Culture Section End Here */
	?>
	
	<?php
	if( !empty( $ps_video_clips	 ) ){
        ?>
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <div class="sliderblockWrap odd rev">
                        <div class="sliderblock">
                            <div class="sliderImg2 sliderImgText">
                                <div class="owl-carousel owl1">
                            <?php						
                                $b=1;
                                foreach( $ps_video_clips as $val_psvc ){
                            ?>
                                    <div class="item">
                                        <div class="sliderImgBox">
                                            <div class="ytube_vdo red">
                                                <?php //echo do_shortcode( '[arve url="' . $val_psvc['video_url'] . '" align="center" parameters="start=30" /]' );?>
                                                <!--<iframe id="fitvid<?php echo $b;?>" class="example" width="560" height="315" src="https://www.youtube.com/embed/RmXiItk49Gw?enablejsapi=1&rel=0&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
                                                <!--<div class="ytube_vdo red">											
                                                    <a href="#" class="play_vdo"></a>
                                                </div>-->										
                                                <?php echo $embed_code = youtubeEmbedFromUrl($val_psvc['video_url'], '100%', '100%', $b);	//100 means 100% ?>
                                            </div>
                                        </div>
                                        <div class="sliderTextBox">
                                            <h2 class="subheading rsb"><?php echo $val_psvc['title'];?></h2>
                                        </div>
                                    </div>
                            <?php
                                $b++;
                                }
                            ?>
                                </div>
                            </div>
                            <div class="sliderText2 pt40 pb40">
                                <h2 class="heading nobrdr">Popular Store<br> Clips/Cultural Scholars</h2>
                                <h3 class="subheading2 rsb red">Keep In The Know</h3>
                                <div class="">
                                    <?php echo $psc_short_description;?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="sliderblock">
                            <div class="sliderImg2 sliderImgText">
                                <div class="owl-carousel owl1">
                            <?php
                            if( !empty($wos_slider_details) ){
                                foreach( $wos_slider_details as $val_wsd ){
                                $hashtag = $val_wsd['hash_tag2']->post_title;
                            ?>
                                <div class="item">
                                    <div class="sliderImgBox">
                                        <img src="<?php echo $val_wsd['image']['sizes']['cultrahub-culture-street'];?>" alt="<?php echo $val_wsd['image']['title'];?>" width="<?php echo $val_wsd['image']['sizes']['cultrahub-culture-street-width'];?>" />
                                        <div class="simgText">
                                            <div class="fleft">
                                                <ul class="borderbar_list clearfix">
                                                <?php if( $val_wsd['author'] != '' ){ ?>
                                                    <li>By <?php echo $val_wsd['author'];?></li>
                                                <?php }
                                                $posted_date= date('Y-m-d', strtotime($val_wsd['post_date']));
                                                $today		= date("Y-m-d");										
                                                $diff 		= abs(strtotime($today) - strtotime($posted_date));												
                                                $years 		= floor($diff / (365*60*60*24));
                                                $months 	= floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                                $days 		= floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                ?>
                                                    <li><?php echo $days;?> Days Ago</li>
                                                </ul>
                                            </div>
                                            <div class="fright">
                                                <a href="javascript:void(0);">#<?php echo $hashtag;?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sliderTextBox">
                                        <h2 class="subheading rsb"><?php echo $val_wsd['title'];?></h2>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>	
                                </div>
                            </div>
                            <div class="sliderText2 pt40 pb40">
                                <h2 class="heading nobrdr">Word on the<br>Streets!</h2>
                                <h3 class="subheading2 rsb red">Don’t Just Know; Be The First To Know!</h3>
                                <div class="">
                                    <?php echo get_field( 'ws_short_description' ); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}
	if( !empty($culture_categories) ){
        ?>
        <div class="section">
            <div class="container">
                <h2 class="heading center">Categories Among the Culture</h2>
                <div class="genre_wrap">
                    <div class="genre_icon_wrap">
                        <ul class="ul genre_icon_list">
                        <?php
                        foreach($culture_categories as $key_cc1 => $val_cc1){
                            $colored_icon1	= get_field( 'culture_page_colored_icon', $val_cc1['type']->ID );
                            $grey_icon1 	= get_field( 'culture_page_grey_icon', $val_cc1['type']->ID );
                            $check 			= $key_cc1+1;
                        ?>
                            <li<?php if($check==1 || $check==2 || $check==3)echo ' class="active"';?>>
                                <a href="#genre<?php echo $key_cc1+1;?>" class="gicon" title="<?php echo $val_cc1['type']->post_title;?>">
                                    <img src="<?php echo $colored_icon1['url'];?>" alt="<?php echo $val_cc1['type']->post_title;?>" class="colored">
                                    <img src="<?php echo $grey_icon1['url'];?>" alt="<?php echo $val_cc1['type']->post_title;?>" class="bnw">
                                </a>
                            </li>
                        <?php
                        }
                        ?>						
                        </ul>
                    </div>
                    <div class="innerContainer">
                        <div class="owl-carousel" id="genrebox_slider">
                        <?php
                        foreach($culture_categories as $key_cc => $val_cc){
                            $colored_icon	= get_field( 'culture_page_colored_icon', $val_cc['type']->ID );
                            $grey_icon 		= get_field( 'culture_page_grey_icon', $val_cc['type']->ID );
                        ?>
                            <div class="item" data-hash="genre<?php echo $key_cc+1;?>">
                                <div class="genre_block genre_lndscp">
                                    <a href="#">
                                        <div class="genre_box">
                                            <div class="genre_img"><img src="<?php echo $val_cc['large_image']['sizes']['cultrahub-culture-genre'];?>" width="<?php echo $val_cc['large_image']['sizes']['cultrahub-culture-genre-width'];?>" alt="<?php echo $val_cc['large_image']['title'];?>"></div>
                                            <div class="genre_icon">
                                                <img src="<?php echo $colored_icon['url'];?>" alt="<?php echo $val_cc['type']->post_title;?>" class="colored">
                                                <img src="<?php echo $grey_icon['url'];?>" alt="<?php echo $val_cc['type']->post_title;?>" class="bnw">
                                            </div>
                                        </div>
                                        <h2 class="subheading2"><?php echo $val_cc['type']->post_title;?></h2>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>	
                        </div>
                    </div>
                </div>
            </div>
        </div>	
        <?php
	}
	?>	
	<div class="section">
		<div class="container">
			<hr class="mb70 mt0">
			<h2 class="heading center">Explore More Cultures</h2>
			<div class="innerContainer">
				<ul class="ul row more_culture">
				<?php
				query_posts('post_type=culture&order=asc&orderby=menu_order');
				if (have_posts()) : while (have_posts()) : the_post();
						$culture_icon = get_field( 'icon', $post->ID );
				?>
						<li class="col12_5<?php if( $thePostID == $post->ID )echo ' active';?>">
							<div class="culture_box">
								<a href="<?php the_permalink();?>">
									<img src="<?php echo $culture_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>" />
								</a>
							</div>
						</li>
				<?php
				endwhile; endif;
				wp_reset_query();
				?>	
				</ul>
			</div>
			<hr class="mb0 mt70">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<script type="text/javascript">
$(document).on('click', '.owl-next', function () {
	for (i = 1; i <= <?php echo count($ps_video_clips);?>; i++) {
		var frame = document.getElementById("clip_"+i);
		frame.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
	}
});
$(document).on('click', '.owl-prev', function () {
	for (i = 1; i <= <?php echo count($ps_video_clips);?>; i++) {
		var frame = document.getElementById("clip_"+i);
		frame.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
	}
});
</script>
<?php
get_footer('other');