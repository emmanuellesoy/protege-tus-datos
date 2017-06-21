<section class="parallax">
  <div class="container">
    <div class="row">
      <div  class="span12">
        <h2>
          Compartir en <em>Facebook</em>:
        </h2>
        <h3 class="fb-share-button" data-href="<?php echo home_url(); ?>" data-layout="button"></h3>
      </div>

    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end CUSTOMERS section -->

<!-- Customer Logos section
================================================== -->
<section id="customers" class="parallax">
  <div class="container">
    <div class="row">

      <!-- clients logo section - insert here some client's logos or pictures
      ================================================================================================== -->
      <ul class="logos">
        <li><a href="http://cisocial.org.mx/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cis.png" alt="" title=""/></a></li>
        <li><a href="http://www.inai.org.mx/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/inai.png" alt="" title=""/></a></li>
        <li><a href="http://indesol.gob.mx/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/indesol.png" alt="" title=""/></a></li>
      </ul>

    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end CUSTOMERS section -->

<!-- Footer section
================================================== -->
<footer class="parallax">
  <div class="container">
    <div class="row">
      <section class="span12">

        <h3><?php _e( 'Redes Sociales', 'dataTaker' ); ?></h3>

        <!-- your social network connections
        ================================================== -->
        <ul class="social_icons">
          <li><a href="https://www.facebook.com/cisocialac" target="_blank" id="facebook"><span>Facebook</span></a></li>
          <li><a href="https://twitter.com/cisocialac" target="_blank" id="twitter"><span>Twitter</span></a></li>
        </ul>

      </section>
    </div> <!-- end row -->
  </div> <!-- end container -->
</footer> <!-- end FOOTER section -->

<!-- Copyright section
================================================== -->
<section id="copyright" class="parallax">
  <div class="container">
    <div class="row">
      <p>Copyright © 2015 - <?php echo date('Y'); ?> <a href="http://cisocial.org.mx/">CIS AC</a> - Ciudadanía para la Integración Social.</p>
      <p>Todos los derechos reservados.</p>
    </div>
  </div>
</section>
<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69807794-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
