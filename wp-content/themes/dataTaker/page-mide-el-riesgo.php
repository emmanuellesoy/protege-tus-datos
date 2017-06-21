<?php
include_once('modules/facebook.php');
$fbConn = new FacebookConnect();
if( !$fbConn->getFacebookAccessToken() )
{
  wp_redirect( home_url() );
}
?>
<?php get_header(); ?>
<?php get_template_part( 'nav' ); ?>
<!-- Spotlight section
================================================== -->
<section class="parallax common-bg">
  <div class="container">
    <div class="row">

      <!-- service box #1
      ================================================== -->
      <div class="span4 service-icon-right filmstrip">
        <h5>¡Hola <em><?php echo $fbConn->user_name; ?></em>!</h5>
        <p>
          Por favor da play en el vídeo..
        </p>
      </div>

      <section id="videoBox" class="html-video span10 offset1">
        <video id="video1" class="video-js skin" controls preload="auto" data-setup="{}">
          <source src="<?php echo get_stylesheet_directory_uri(); ?>/video/video-inai-small.mp4" type='video/mp4' />
          </video>
          <section id="canvas-video" class="canvas-video" onclick="playVideo()"></section>

          <div id="first-data" class="first-video-data">
            <img src="<?php echo $fbConn->getUserPictureURL() ?>" alt="<?php echo $fbConn->user_name; ?>" />
            <label class="first-data-label first-data-label-1"><?php echo $fbConn->user_name; ?></label>
            <label class="first-data-label first-data-label-2"><?php echo $fbConn->user_email; ?></label>
            <label class="first-data-label first-data-label-3"><?php echo $fbConn->user_birthday; ?></label>
          </div>

          <div id="second-data" class="second-video-data">
            <label class="second-data-label second-data-label-1"><?php echo $fbConn->getLastSchoolName(); ?></label>
            <label class="second-data-label second-data-label-2"><?php echo $fbConn->getLastWorkName(); ?></label>
            <label class="second-data-label second-data-label-3"><?php echo $fbConn->getLastMusicName(); ?></label>
            <label class="second-data-label second-data-label-4"><?php echo $fbConn->getLastMovieName(); ?></label>
            <label class="second-data-label second-data-label-5"><?php echo $fbConn->getLastSportName(); ?></label>
            <label class="second-data-label second-data-label-6"><?php echo $fbConn->user_location['name']; ?></label>
            <label class="second-data-label second-data-label-7"><?php echo $fbConn->getUserTaggedPlaces(1); ?></label>
            <div id="map" class="map"></div>
          </div>

          <div id="third-data" class="second-video-data">
            <img src="<?php echo $fbConn->user_cover; ?>" alt="<?php echo $fbConn->user_name; ?>" />
          </div>

          <div id="fourth-data" class="second-video-data" onclick="playVideo()">
            <?php
            $photos = $fbConn->getUserPhotos();
            foreach ($photos as $photo) {
              ?> <img src="<?php echo $photo['images'][0]['source'] ?>" /> <?php
            }
            ?>
          </div>


        </section>

        <div id="thermometer" class="span12">
          <h2>
            Conoce tu grado de <em>vulnerabilidad.</em>
          </h2>
          <div class="thermometer" data-percent="<?php echo $fbConn->get_user_points(); ?>" ></div>
          <h3>
            Tienes <?php echo $fbConn->user_points; ?> de 39 posibles.
          </h3>
        </div>



      </div> <!-- end row -->
    </div> <!-- end container -->


  </section> <!-- end SPOTLIGHT #4 section -->

  <?php get_footer(); ?>
