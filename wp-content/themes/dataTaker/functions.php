<?php
/**
****************************
Adding Styles & Scripts
****************************
**/

add_action( 'wp_enqueue_scripts', 'dataTaker_styles' );
add_action( 'wp_enqueue_scripts', 'dataTaker_scripts' );
add_filter('show_admin_bar', '__return_false');
add_action('init', 'myStartSession', 1);

function dataTaker_styles() {

  // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300|Oswald' );
  // wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
  //wp_enqueue_style( 'videojs', get_stylesheet_directory_uri() . '/css/video-js.min.css' );

}

function dataTaker_scripts() {

  wp_deregister_script( 'jquery' );
  wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), '2.1.4', true );
  wp_enqueue_script( 'jquery-easing', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.min.js', array('jquery'), '1.3', true );
  wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
  wp_enqueue_script( 'jquery-flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.1', true );
  wp_enqueue_script( 'jquery-localscroll', get_stylesheet_directory_uri() . '/js/jquery.localscroll-min.js', array('jquery'), '1.2.9', true );
  wp_enqueue_script( 'jquery-scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo-min.js', array('jquery'), '1.4.6', true );
  wp_enqueue_script( 'jquery-sticky', get_stylesheet_directory_uri() . '/js/jquery.sticky.min.js', array('jquery'), '', true );
  wp_enqueue_script( 'jquery-fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '2.1.4', true );
  wp_enqueue_script( 'jquery-isotope', get_stylesheet_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.5.25', true );
  wp_enqueue_script( 'jquery-tweet', get_stylesheet_directory_uri() . '/js/twitter/jquery.tweet.min.js', array('jquery'), '', true );
  wp_enqueue_script( 'popcornjs', get_stylesheet_directory_uri() . '/js/popcorn.js', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'popcornjs-code', get_stylesheet_directory_uri() . '/js/popcorn.code.js', array('popcornjs'), '1.0.0', true );
  wp_enqueue_script( 'jquery-custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'jquery-isotope-config', get_stylesheet_directory_uri() . '/js/isotope-config.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'jquery-thermometer', get_stylesheet_directory_uri() . '/js/jquery.thermometer.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'video-config', get_stylesheet_directory_uri() . '/js/video-config.js', array('jquery', 'popcornjs'), '1.0', true );
}


/**
****************************
Start Sessión
****************************
**/
function myStartSession() {
  if(!session_id()) {
    session_start();
  }
}

/**
****************************
Add Map function
****************************
**/

function addMap( $coordinates ) {
  ?>

  <script type="text/javascript">
  function initMap()
  {
    var myLatLng = {lat: <?php echo $coordinates[0]['lat'] ?>, lng: <?php echo $coordinates[0]['lon'] ?>};

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: myLatLng
    });

    <?php
    $i = 0;
    foreach ($coordinates as $coordenate )
    {
    ?>
    myLatLng = {lat: <?php echo $coordinates[$i]['lat'] ?>, lng: <?php echo $coordinates[$i]['lon'] ?>};
    var marker_<?php echo $i; ?> = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Hello World!'
    });
    marker_<?php echo $i; ?>.setMap(map);
    <?php
    $i++;
    }
    ?>


  }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHCUPQLpN221PVDFBVc1xnIkHSqXHe2nE&callback=initMap"></script>
  <?php
}
//add_action('wp_footer', 'addMap');
?>
