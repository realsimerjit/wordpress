<?php
  /**
  * Second Section
  **/

  $tatoo_hide_ser = get_theme_mod('tatoo_ser_hide','1');

  if( $tatoo_hide_ser == '' ){
?>
    <section class="services">
      <div class="aligner">
        <?php
          $showserttl = esc_html(get_theme_mod('tatoo_ser_ttl'));
          $dispserttl = '';
            if( !empty( $showserttl ) ){
              $dispserttl = '<div class="section_head"><h2 class="section_title"><span>'.$showserttl.'</span></h2></div>';
            }

            echo $dispserttl;
        ?>
        <div class="flex">
            <?php
              for( $ser = 1; $ser<=3; $ser++ ){
                if( get_theme_mod( 'tatoo_service'.$ser,true ) !='' ){
                  $serquery = new WP_Query(array('page_id' => get_theme_mod( 'tatoo_service'.$ser )));
                  while( $serquery->have_posts() ) : $serquery->the_post();
            ?>        
                    <div class="column-third">
                      <div class="service-col">
						<?php if( has_post_thumbnail() ){
							echo '<div class="service-thumb">';
							the_post_thumbnail('full');
							echo '</div>';
						}?>
						<div class="service-heading"><h4><?php echo the_title(); ?></h4></div>
						<div class="service-data">
							<h3 class="ser-ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="ser-txt"><?php echo tatoo_excerpt(22); ?></p>
							<a href="<?php echo the_permalink(); ?>" class="ser-more"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						</div>
                      </div><!-- service col -->
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