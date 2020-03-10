<?php
/*
 *	Slide handler.
 */
 $theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));
?>
<div id="block-block-4">
	<style type="text/css" media="screen">
		/*
			Load CSS before JavaScript
		*/
		#slides {
			position: relative;
			width: 600px;
			height: 338px;
			margin: 9px 0 0;
			background: transparent url('/<?php echo $theme_path; ?>/images/noise.gif') center center repeat;
			/*
			background-size: 600px 338px;
			*/
			z-index: 2;
		}
		
		/*
			Slides container
			Important:
			Set the width of your slides container
			Set to display none, prevents content flash
		*/
		#slides .slides_container {
			position: relative;
			width: 600px;
			height: 338px;
			padding: 0;
			margin: 0;
			display: none;
			-moz-border-radius-topright: 12px;
			-moz-border-radius-bottomleft: 12px;
			border-top-right-radius: 12px;
			border-bottom-left-radius: 12px;
		}

		/*
			Each slide
			Important:
			Set the width of your slides
			If height not specified height will be set by the slide content
			Set to display block
		*/
		#slides .slides_container .slide {
			display: block;
			width: 600px;
			height: 338px;
			padding: 0;
			margin: 0;
			color: #000;
			overflow: hidden;
			-moz-border-radius-topright: 12px;
			-moz-border-radius-bottomleft: 12px;
			border-top-right-radius: 12px;
			border-bottom-left-radius: 12px;
		}
		
		/*
			Optional:
			Reset list default style
		*/
		#slides div.pagination-wrapper {
			position: absolute;
			padding: 0;
			left: 30px;
			bottom: -10px;
			z-index: 99;
		}
		#slides ul.pagination {
			float: left;
			list-style: none;
			margin: 0 0 0 13px;
			padding: 0;
		}
		#slides ul.pagination li {
			float: left;
			width: 21px;
			height: 21px;
			margin: 0 0 0 7px;
			padding: 0;
		}
		#slides .pagination a {
			display: block;
			width: 21px;
			height: 21px;
			text-align: center;
			line-height: 21px;
			color: #456157;
			font-weight: normal;
			text-decoration: none;
			background: url('/<?php echo $theme_path; ?>/images/88th_gradient_50.png') top left repeat;
			cursor: pointer;
			margin: 0;
			padding: 0;
			border: 1px solid #456157;
		}
		#slides .pagination a:hover {
			text-decoration: none;
			background: url('/<?php echo $theme_path; ?>/images/88th_gradient_75.png') top left repeat;
		}

		/*
			Optional:
			Show the current slide in the pagination
		*/
		#slides .pagination .current a {
			color: #fff;
			font-weight: bold;
			background: url('/<?php echo $theme_path; ?>/images/88th_gradient_75.png') top left repeat;
		}
		#slides a.prev,
		#slides a.next {
			position: absolute;
			display: block;
			width: 21px;
			height: 21px;
			line-height: 21;
			font-size: 13;
			overflow: hidden;
			cursor: pointer;
			z-index: 99;
			border: 1px solid #456157;
		}
		#slides a.prev {
			left: -8px;
			background: url('/<?php echo $theme_path; ?>/images/88th_slide_static_prev.png') top left repeat;
			text-align: center;
			-moz-border-radius-bottomleft: 6px;
			border-bottom-left-radius: 6px;
		}
		#slides a.prev:hover {
			background-image: url('/<?php echo $theme_path; ?>/images/88th_slide_rollover_prev.png');
		}
		#slides a.next {
			right: -28px;
			background: url('/<?php echo $theme_path; ?>/images/88th_slide_static_next.png') top left repeat;
			text-align: center;
			-moz-border-radius-topright: 6px;
			border-top-right-radius: 6px;
		}
		#slides a.next:hover {
			background-image: url('/<?php echo $theme_path; ?>/images/88th_slide_rollover_next.png');
		}
		/*
		#slides a.slide-button {
			position: absolute;
			display: block;
			bottom: 20px;
			right: 40px;
			width: 89px;
			height: 22px;
			line-height: 0;
			font-size: 0;
			text-indent: -999px;
			overflow: hidden;
			cursor: pointer;
			background: url('/<?php echo $theme_path; ?>/images/mccaul_slider_10.png') top center no-repeat;
			z-index: 99;

			display: none;
		}
		#slides div.slide-gradient {
			position: absolute;
			bottom: 0;
			left: 0;
			right: 0;
			width: 100%;
			height: 75px;
			line-height: 0;
			font-size: 0;
			background: url('/<?php echo $theme_path; ?>/images/mccaul_slider_gradient_large.png') top center repeat-x;
			z-index: 98;

			display: none;
		}
		*/
		#slides div.slide-teaser-image {
			float: left;
			top: 0;
			left: 0;
			margin: 4px 15px 2px 0;
			-moz-border-radius-topright: 12px;
			-moz-border-radius-bottomleft: 12px;
			border-top-right-radius: 12px;
			border-bottom-left-radius: 12px;
		}
		#slides div.slide-body {
			float: left;
			position: relative;
		}

		/*
			Theme the slider.
		*/
		#slides {
			font-size: 12px;
			line-height: 18px;
			color: #fff;
			font-weight: normal;
			border: 1px solid #456157;
			-moz-border-radius-topright: 12px;
			-moz-border-radius-bottomleft: 12px;
			border-top-right-radius: 12px;
			border-bottom-left-radius: 12px;
			-moz-box-shadow: 0 1px 10px #456157;
			-webkit-box-shadow: 0 1px 10px #456157;
			box-shadow: 0 1px 10px #456157;
			/* For IE 8 */
			-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=2, Direction=180, Color='#456157')";
			/* For IE 5.5 - 7 */
			filter: progid:DXImageTransform.Microsoft.Shadow(Strength=2, Direction=180, Color='#456157');
		}
		#slides h2.slide-title {
			font-size: 16px;
			line-height: 18px;
			color: #fff;
			font-weight: bold;
			padding: 10px 0 9px;
			margin: 0;
			letter-spacing: 0px;
			background: none;
		}
		#slides h2.slide-title a {
			color: #c6f0ec;
		}
		#slides h3.slide-source {
			font-size: 10px;
			line-height: 12px;
			color: #fff;
			font-style: italic;
			padding: 0 0 12px;
			margin: 0;
			letter-spacing: 1px;
		}
		#slides h4.slide-target {
			text-align: right;
			font-size: 10px;
			line-height: 12px;
			font-style: italic;
			font-weight: bold;
			padding: 12px 0 0;
			margin: 0;
			letter-spacing: 1px;
		}
		#slides h4.slide-target a {
			color: #c6f0ec;
		}
		#slides div.slide-content {
			position: absolute;
			padding: 5px 10px;
			background: url('/<?php echo $theme_path; ?>/images/88th_gradient_50.png') top center repeat, url('/<?php echo $theme_path; ?>/images/88th_content_background2_middle.png') top center repeat;
			color: #fff;
			font-size: 11px;
		}
		#slides div.slide-content:hover {
			background-image: url('/<?php echo $theme_path; ?>/images/88th_gradient_75.png'), url('/<?php echo $theme_path; ?>/images/88th_content_background2_middle.png');
		}
		#slides div.slide-content-left {
			top: 0;
			bottom: 0;
			left: 5px;
			width: 180px;
			height: 328px;
			border-left: 1px solid #456157;
			border-right: 1px solid #456157;
			-moz-border-radius-bottomleft: 12px;
			border-bottom-left-radius: 12px;
		}
		#slides div.slide-content-right {
			top: 0;
			right: 5px;
			bottom: 0;
			width: 180px;
			height: 328px;
			border-left: 1px solid #456157;
			border-right: 1px solid #456157;
			-moz-border-radius-topright: 12px;
			border-top-right-radius: 12px;
		}
		#slides div.slide-content-default,
		#slides div.slide-content-bottom {
			right: 0;
			bottom: 5px;
			left: 0;
			width: 580px;
			border-top: 1px solid #456157;
			border-bottom: 1px solid #456157;
			-moz-border-radius-bottomleft: 12px;
			border-bottom-left-radius: 12px;
		}
		#slides div.slide-content-top {
			top: 5px;
			right: 0;
			left: 0;
			width: 600px;
			border-top: 1px solid #456157;
			border-bottom: 1px solid #456157;
			-moz-border-radius-topright: 12px;
			border-top-right-radius: 12px;
		}
		#slides div.slide-content-none {
			display: none;
		}
		.slide {
			opacity:0.96 !important;
			filter:alpha(opacity=96) !important; /* For IE8 and earlier */
		}
		.slide:hover {
			opacity:1.0 !important;
			filter:alpha(opacity=100) !important; /* For IE8 and earlier */
		}

<?php
$slide_query = "SELECT * FROM node WHERE type = 'slide' AND status = '1' AND promote = '1' ORDER BY created DESC LIMIT 10";

$result = db_query($slide_query);

if (isset($result)) {

	foreach ($result as $obj) {

		$query1 = new EntityFieldQuery();
		$entities = $query1->entityCondition('entity_type', 'node')
			->propertyCondition('nid', $obj->nid)
			->range(0,1)
			->execute();
	
		if (!empty($entities['node'])) {
			$node = node_load(array_shift(array_keys($entities['node'])));
			if (isset($node->field_background_image)) {
				echo '
		#slide-node-'.$node->nid.' {
			background: url(/sites/default/files/slides/'.$node->field_background_image['und'][0]['filename'].') top center no-repeat;
		}';
			} // if
		}  // if
	} // foreach
} // isset result
?>
	</style>
	
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>-->
	<script src="/<?php echo $theme_path; ?>/scripts/slides/source/slides.min.jquery.js"></script>
	
	<script type="text/javascript">
		(function($){
			$(function(){
				// Set starting slide to 1
				var startSlide = 1;
				// Get slide number if it exists
				if (window.location.hash) {
					startSlide = window.location.hash.replace('#','');
				}
				// Initialize Slides
				$('#slides').slides({
					preload: true,
					generateNextPrev: true,
					generatePagination: true,
					play: 12000,
					pause: 2500,
					hoverPause: false,
					// Get the starting slide
					start: startSlide,
					animationComplete: function(current){
						// Set the slide number as a hash
						// window.location.hash = '#' + current;
					}
				});
			});
		})(jQuery);
	</script>

  <h2>Reconnaissance Feed</h2>

	<div id="slides">
		<div class="slides_container">
			<?php
			$result = db_query($slide_query);

			if (isset($result)) {

				foreach ($result as $obj) {

					$query = new EntityFieldQuery();
					$entities = $query->entityCondition('entity_type', 'node')
						->propertyCondition('nid', $obj->nid)
						->range(0,1)
						->execute();
				
					if (!empty($entities['node'])) {
						$node = node_load(array_shift(array_keys($entities['node'])));
						echo '<div id="slide-node-'.$node->nid.'" class="slide">';
							if (isset($node->field_teaser_image['und'][0]['filename'])) {
								echo '<div class="slide-teaser-image"><img src="/sites/default/files/slides/'.$node->field_teaser_image['und'][0]['filename'].'" /></div>';
							}
							echo '<div class="slide-content';
							if (isset($node->field_caption_position['und'][0]['value'])) {
								echo ' slide-content-'.$node->field_caption_position['und'][0]['value'];
							} else {
								echo ' slide-content-default';
							}
							echo '">';
							
							echo '<h2 class="slide-title"><a href="';
							if (isset($node->field_target_url['und'][0]['value'])) {
								echo $node->field_target_url['und'][0]['value'];
							} else {
								echo drupal_get_path_alias("node/".$node->nid);
							}
							echo '">'.$node->title.'</a></h2>';
							
							if (isset($node->body['und'][0])) {
								if ($node->body['und'][0]['safe_summary']) {
									echo $node->body['und'][0]['safe_summary'];
								} else {
									echo $node->body['und'][0]['safe_value'];
								}
							}
							echo '<h4 class="slide-target"><a href="';
							if (isset($node->field_target_url['und'][0]['value'])) {
								echo $node->field_target_url['und'][0]['value'];
							} else {
								echo drupal_get_path_alias("node/".$node->nid);
							}
							echo '">Read More</a></h4>';
							echo '</div>';
						echo '</div>';
					}
				}

			} else {
				echo '<div>';
				echo '<p>No slides.<p>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	(function($){
	$(document).ready(function() {
			$('ul.pagination').wrap(function(){
				$(this).wrap('<div class="pagination-wrapper">');
			});
			$('a.prev').appendTo('div.pagination-wrapper');
			$('a.next').appendTo('div.pagination-wrapper');
		});
	})(jQuery);
</script>