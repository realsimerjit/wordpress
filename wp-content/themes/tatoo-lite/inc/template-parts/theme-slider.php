<?php
  $tatoo_hide_slides = get_theme_mod( 'hide_theme_slider','1' );
  if( $tatoo_hide_slides == '' ){
    $tatoo_lite_pages = array();

    for($sld=1; $sld<4; $sld++) {
      $mod = absint( get_theme_mod('theme-slide'.$sld));
      if ( 'page-none-selected' != $mod ) {
        $tatoo_lite_pages[] = $mod;
      }
    }

    if( !empty($tatoo_lite_pages) ) :

      $args = array(
        'posts_per_page' => 3,
        'post_type' => 'page',
        'post__in' => $tatoo_lite_pages,
        'orderby' => 'post__in'
      );
      $sliderqu = new WP_Query( $args );
      if ( $sliderqu->have_posts() ) : 
        $sld = 1;
        echo '<section id="theme-slider"><div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">';
        $i = 0;
        while ( $sliderqu->have_posts() ) : $sliderqu->the_post();
          $i++;
          $tatoo_lite_slideno[] = $i;
          $tatoo_lite_slidetitle[] = get_the_title();
		  $tatoo_lite_slidedesc[] = get_the_excerpt();
          $tatoo_lite_slidelink[] = esc_url(get_permalink());
          $slider_sb_ttl = get_theme_mod('slidesmlttl',true);
          if( !empty( $slider_sb_ttl ) ){
            $shwsubttl = '<h4>'.$slider_sb_ttl.'</h4>';
          } ?>
          <img src="<?php esc_url( the_post_thumbnail_url('full') ); ?>" title="#slidecaption<?php echo esc_attr( $i );?>" />
        <?php $sld++;
        endwhile;
        echo '</div>';
        $k = 0;
        foreach( $tatoo_lite_slideno as $tatoo_lite_sln ){
        ?>
          <div id="slidecaption<?php echo esc_attr( $tatoo_lite_sln );?>" class="nivo-html-caption">
            <div class="caption-holder">
              <?php echo $shwsubttl; ?>
              <h2><a href="<?php echo esc_url($tatoo_lite_slidelink[$k] );?>"><?php echo esc_html($tatoo_lite_slidetitle[$k] ); ?></a></h2>
			  <p><?php echo esc_html($tatoo_lite_slidedesc[$k] ); ?></p>
              <?php
                $getsldrmrtxt = get_theme_mod('slide_read_more',__('Read More','tatoo-lite'));
                if( ! empty( $getsldrmrtxt ) ){
                  $holdsldrmrtxt = '<a class="slide-button" href="'.esc_url($tatoo_lite_slidelink[$k] ).'">'.esc_html(get_theme_mod('slide_read_more',__('Read More','tatoo-lite'))).'</a>';
                }
                echo $holdsldrmrtxt;
              ?>              
            </div>
          </div>
        <?php
          $k++;
          wp_reset_postdata();
        }
      endif;

    endif;

    echo '</div></section>';

  }

?>