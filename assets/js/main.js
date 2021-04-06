jQuery(function($) {
    $(".filter-controls li").click(function() {
        $('.filter-controls li').removeClass('active');
        $(this).addClass('active');
    })
   
    $(".nav-link").click(function() {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    })
    var containerEl = document.querySelector(' .property-gallery-container');
    var mixer;
    if (containerEl) {
     mixer = mixitup(containerEl);
     mixer = mixitup(containerEl,{
        selectors: {
            target: '.property-gallery'
        },
        animation: {
            duration : 500
        }
        });
    }

    $(".filter-controls li").click(function() {
        $('.filter-controls li').removeClass('active');
        $(this).addClass('active');
    })
    $('.image-popup').magnificPopup({
        type: 'image',
    });
  


});