( function( jQuery ) {

  // Update the site title in real time...
  wp.customize( 'footer_text', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.name' ).html( newval );
    } );
  } );
      //Update the site description in real time...
  wp.customize( 'map', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.map' ).html( newval );
    } );
  } );
  
} )( jQuery );
