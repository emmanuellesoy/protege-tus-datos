<?php get_header(); ?>
<?php
  include_once('modules/facebook.php');
  $facebookConnect = new FacebookConnect();
?>

<!-- Homepage section
================================================== -->
<section id="homepage">

  <!-- Background slider
  ================================================== -->
  <section id="background-slider">
    <ul class="slides">
      <li>
        <!-- 1st background image
        ================================================== -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/intro-bg.jpg" class="sliderImg" alt="<?php _e( get_bloginfo('description'), 'dataTaker' ); ?>" title="<?php echo get_bloginfo('name'); ?>"/>

        <!-- your company name or logo
        ================================================== -->
        <h1 id="main-logo">
          <a href="<?php echo $facebookConnect->getLoginButton() ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-button.png" alt="<?php _e('Conectar a Facebook', 'dataTaker'); ?>" title="title here"></a>
        </h1>

      </li>
      <li>
        <!-- 2nd background image
        ================================================== -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/intro-bg2.jpg" class="sliderImg" alt="Segundo Background (OBSCURO)" title="Segundo Background (OBSCURO)"/>

        <!-- insert your caption text here - caption type "center"
        ================================================== -->
        <div class="caption-center">
          <p>
            ¡Le doy <em>like</em> a la protección de mis datos!
          </p>
          <p>
            Video interactivo vinculado a una <em>red social</em>: concientización vivencial de jóvenes de planteles del <em>CONALEP</em> del DF la protección de datos personales.
          </p>

        </div>
      </li>
    </ul>
  </section> <!-- end BACKGROUND SLIDER -->
</section> <!-- end HOMEPAGE -->

<?php get_footer(); ?>
