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

        <h1>Termómetro</h1>

        <?php echo $fbConn->get_user_points(); ?>
        <?php //echo $fbConn->user_points; ?>

    </div> <!-- end row -->
  </div> <!-- end container -->


</section> <!-- end SPOTLIGHT #4 section -->

<?php get_footer(); ?>
