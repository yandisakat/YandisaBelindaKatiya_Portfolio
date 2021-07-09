
    $(window).on('load', function(){
        $('.preloader').addClass('complete')    
    });

//Sticky Nav Function
jQuery(document).ready(function () {
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 50){
            $(".sticky").addClass("stickyadd");
        }
        else{
            $(".sticky").removeClass("stickyadd");
        }
    })
 
    //Typed Header Feature
    var typed = new Typed(".element",{
        strings: ["Yandisa Belinda Katiya","a Developer","a Designer","a Creative"],
        smartBackspace: true,
        typeSpeed: 100,
        backSpeed: 100,
        loop: true,
        loopCount: Infinity,
        startDelay: 1000
    });

    // Progress Bar Animation
    var waypoint = new Waypoint({
        element: document.getElementById('exp-id'),
        handler: function() {
            $('.skill-percent').each(function(){
                var $this = $(this);
                var per = $this.attr('per');
                $this.css("width", per + "%");
                $({animatedValue: 0}).animate({animatedValue: per},{
                    duration: 1000,      
                })
            });           
        },
        offset: '90%'     
    });

    // Download CV
    jQuery(document).ready(function($) {
        $('a[href$=".pdf"]')
             .attr('download', '')
             .attr('target', '_blank'); 
     });
    
    // Filterizr
    var filterizd = $('.filter-container').filterizr({
        animationDuration: .5,

    });
    // Owl Carousel
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:4000,
            items:1
        });
      });

    // Contact Form Feedback Modal
    $(document).ready(function(){
        $("#contact-btn").click(function(){
            
        })
        $("#contact-pop-up").modal(); 
    });
    
     
});