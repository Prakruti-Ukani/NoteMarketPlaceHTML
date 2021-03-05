

/*===================================================
        password
===================================================*/
$(".toggle-password").click(function() {

  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

/*===================================================
				Navbar
===================================================*/
function sticky_header() {
    var header_height = jQuery('.site-header').innerHeight() / 2;
    var scrollTop = jQuery(window).scrollTop();;
    if (scrollTop > header_height) {
        jQuery('body').addClass('sticky-header');

        $(".site-header .header-wrapper .logo-wrapper a img").attr("src","img/home/logo.png");
        $(".site-header .header-wrapper .menuimg img").attr("src","img/front/blackmenu.png");

    } else {
        jQuery('body').removeClass('sticky-header');
        $(".site-header .header-wrapper .logo-wrapper a img").attr("src","img/login/top-logo.png");
        $(".site-header .header-wrapper .menuimg img").attr("src","img/front/whitemenu.png");
    }
}

jQuery(document).ready(function () {
  sticky_header();
});

jQuery(window).scroll(function () {
  sticky_header();  
});
jQuery(window).resize(function () {
  sticky_header();
});

/*===================================================
					   rating star
===================================================*/
$(document).ready(function() {
        for (i = 1; i <10 ; i++) {
            for (j = 5; j >= 1 ; j--) {
                $('.rate'+i+' .rate').append('<input type="radio" id="s_'+i+'_'+j+'" name="rate'+i+'" value="5" /><label for="s_'+i+'_'+j+'" title="text">5 stars</label>');
            }
        }
  });


/*==========================================
              faq
===========================================*/

$(document).on('click', '.panel-heading', function(){
    
    if ($(this).find('.accordion-toggle').hasClass('collapsed')) {
        $(this).css('background-color', '#f3f3f3');
        $('.panel').css('border', 'none');
        $('.panel').css('padding', '0px 0px');
    }
    else
    {
      $(this).css('background-color', '#fff');
      $(this).css('border', '1px solid #d1d1d1');
      $(this).css('border-bottom', 'none');
      $('.panel-body').css('padding', '0px 15px 15px 15px');
    }

 });
