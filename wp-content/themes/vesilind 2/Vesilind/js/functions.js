
jQuery( document ).ready(function() {

 jQuery("#owl").owlCarousel({
   items:1,
   loop:true,
   autoplay:true,
   autoplayTimeout:4500,
   autoplaySpeed:1500,
   navSpeed :1500,
   nav : false,
   navText: [" "," "],
   dots : false
 });
 jQuery("#futureowl").owlCarousel({
   items:1,
   loop:true,
   autoplay:false,
   navSpeed :1500,
   autoHeight:true,
   nav : true,
   dots : true,
   lazyLoad:true,
   navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
 });
 jQuery(".worksowl").owlCarousel({
   items:4,
   loop:false,
   autoplay:false,
   autoplayTimeout:4500,
   autoplaySpeed:1500,
   navSpeed :1500,
   margin :20,
   responsiveClass:true,
   lazyLoad:true,

   responsive:{
       0:{
           items:1,

       },
       500:{
           items:2,

       },
       800:{
           items:3,
       },
       1200:{
           items:4,

       }
   },
   nav : true,
   navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
   dots : true
 });

 jQuery('.openpost').live('click', function(e){
   e.preventDefault();
   var link = jQuery(this).attr('href');
   var id = jQuery(this).attr('class').split(' ')[1];
   jQuery('.'+id+'-content').show();
   jQuery('.'+id+'-content').html('<div id="pagination-loader" class="smallpag"></div>');
   jQuery('.'+id+'-content').load(link+' .singlepost', function() {
     jQuery('html, body').animate({
       scrollTop: jQuery('.'+id+'-content').offset().top - 70
     }, 800);
     jQuery('a.gallery').featherlightGallery({
         previousIcon: '<i class="fa fa-angle-left" aria-hidden="true"></i>',     /* Code that is used as previous icon */
         nextIcon: '<i class="fa fa-angle-right" aria-hidden="true"></i>',         /* Code that is used as next icon */
         galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
         galleryFadeOut: 300          /* fadeOut speed before slide is loaded */
       });
     jQuery('.'+id+'-content').fadeIn('fast');
   });
 });
 jQuery('.close').live('click', function(e){
  jQuery(this).closest('.swapcontent').fadeOut('fast').empty();
})
jQuery('.category a').live('click', function(e){
  e.preventDefault();
  jQuery('.category a').removeClass('active');
  jQuery(this).addClass('active');
  var link = jQuery(this).attr('href');
  jQuery('.workcat').css('display','none')
  jQuery(link).fadeIn('fast');
});


 jQuery('#navbar-toggle').click(function (event) {
  event.preventDefault();
  if(jQuery( window ).width()<=1100){
    if(!jQuery('.main-menu').is(':visible')) {
      jQuery('.main-menu').slideDown('fast');
      jQuery('.main-menu').css('display','block');
    } else {
      jQuery('.main-menu').slideUp('fast');
    }}
    else{
      jQuery('.main-menu').css('display','block');
    }
  });

 jQuery(window).resize(function() {

  if(jQuery(window).width()>1100){
   jQuery('.main-menu').css('display','block');
 }
 else
 {
   if(jQuery('.main-menu').is(':visible')) {
    jQuery('.main-menu').css('display','block');
  }
}

});
 jQuery('#sidebar-toggle').click(function (event) {
  event.preventDefault();
  if(jQuery( window ).width()<=1100){
    if(!jQuery('.sidemenu').is(':visible')) {
      jQuery('.sidemenu').slideDown('fast');
      jQuery('.sidemenu').css('display','block');
    } else {
      jQuery('.sidemenu').slideUp('fast');
    }}
    else{
      jQuery('.sidemenu').css('display','block');
    }
  });

 jQuery(window).resize(function() {

  if(jQuery(window).width()>1100){
   jQuery('.sidemenu').css('display','block');
 }
 else
 {
   if(jQuery('.sidemenu').is(':visible')) {
    jQuery('.sidemenu').css('display','block');
  }
}

});


    jQuery(window).scroll(function() {
        if (jQuery(document).scrollTop() > 100) {
            jQuery('.site-header').addClass('small');
        }
        else {
            jQuery('.site-header').removeClass('small');
        }
    });
    jQuery(".main-menu a").click(function(event) {
      event.preventDefault();
      var id = jQuery(this).attr('href');
        jQuery('html, body').animate({
            scrollTop: jQuery(id).offset().top -88
        }, 1000);
    });


});
