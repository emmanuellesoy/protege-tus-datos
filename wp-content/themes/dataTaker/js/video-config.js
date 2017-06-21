$(document).ready(function(){



  var v = document.getElementById( "video1" );;

  // Listen for ended event
  v.addEventListener( "ended", function( e ) {

    jQuery('#videoBox').hide();

    jQuery('#thermometer').show(function(){
      jQuery('.thermometer').thermometer({
        speed: 1500
      });
    });


  }, false );

  var pop = Popcorn( "#video1" );

  pop.code({
    start: 10,
    end: 84,
    onStart: function( options ) {
      jQuery('#canvas-video').fadeIn();
    },
    onEnd: function( options ) {
      jQuery('#canvas-video').fadeOut();
    }
  });

  pop.code({
    start: 21,
    end: 34.5,
    onStart: function( options ) {
      jQuery('#first-data').fadeIn();
    },
    onEnd: function( options ) {
      jQuery('#first-data').fadeOut();
    }
  });

  pop.code({
    start: 41,
    end: 54,
    onStart: function( options ) {
      jQuery('#second-data').fadeIn();
      //initMap();
    },
    onEnd: function( options ) {
      jQuery('#second-data').fadeOut();
    }
  });

  pop.code({
    start: 44,
    end: 54,
    onStart: function( options ) {
      jQuery('#third-data').fadeIn();
    },
    onEnd: function( options ) {
      jQuery('#third-data').fadeOut();
    }
  });

  pop.code({
    start: 61,
    end: 74,
    onStart: function( options ) {
      jQuery('#fourth-data').fadeIn(5000);
    },
    onEnd: function( options ) {
      jQuery('#fourth-data').fadeOut(2000);
    }
  });

});

function playVideo()
{

  var popcorn = Popcorn( "#video1" );
  if ( popcorn.paused() ) {
    popcorn.play();
  } else {
    popcorn.pause();
  }

}
