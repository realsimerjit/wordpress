<?php
  /**
  * Featured Box Section
  **/

  $tatoo_hide_feat = get_theme_mod('tatoo_feat_hide','1');

  if( $tatoo_hide_feat == '' ){
	$getfeatttl = esc_html(get_theme_mod('tatoo_feat_ttl',true));
?>
<section class="featured-boxes">
	<div class="aligner">
		<?php
			if( !empty( $getfeatttl ) ){
				echo '<div class="section_head"><h2 class="section_title"><span>'.$getfeatttl.'</span></h2></div>';
			}
		?>		
		<div class="flex">
			<?php
			  for( $feat = 1; $feat<=4; $feat++ ){
				if( get_theme_mod( 'tatoo_feat'.$feat,true ) !='' ){
				  $featquery = new WP_Query(array('page_id' => get_theme_mod( 'tatoo_feat'.$feat )));
				  while( $featquery->have_posts() ) : $featquery->the_post();
				  
				  $featmore = esc_html(get_theme_mod('tatoo_feat_more'));
				  $hold_featmore = '';
				  if( !empty( $featmore ) ){
					$hold_featmore = '<div class="read-more"><a href="'.get_the_permalink().'">'.$featmore.'</a></div>';
				  }
			?>
			<div class="features">
				<div class="feat-box">
					<div class="feat-box-thumb">
						<?php
							if( has_post_thumbnail() ){
								the_post_thumbnail('full');
							}
						?>
					</div><!-- feat box thumb -->
					<div class="feat-box-data">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p><?php echo tatoo_excerpt(14); ?></p>
						<?php echo $hold_featmore; ?>
					</div><!-- feat box data -->
				</div><!-- feat box -->
			</div><!-- col -->
			<?php
				  endwhile;
				}
			  }
			?>
		</div><!-- row -->
	</div><!-- aligner -->
</section>
      
<?php
  }
?>