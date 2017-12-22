jQuery(function($) {
    var $ = jQuery;
    var $myCarousel = $('#carousel');
    // Initialize carousel
    $myCarousel.carousel();({
        interval: 9000
    });
    $('.service-thumbnail-wrapper').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        nextArrow: '<i class="fa fa-angle-right"></i>',
        prevArrow: '<i class="fa fa-angle-left"></i>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    thumbsSlick = $(".modal-thumbnail-wrapper").slick({
        dots:false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        nextArrow: '<i class="fa fa-angle-right"></i>',
        prevArrow: '<i class="fa fa-angle-left"></i>'
    });
    var slideIndex = 1;
    showSlides(slideIndex);
});
function openModal() {
    var $ = jQuery;
    $("#galleryModal").addClass('fadeIn');
}
function closeModal() {
    var $ = jQuery;
    $("#galleryModal").removeClass('fadeIn');
}
function plusSlides(n) {
    var $ = jQuery;
    var slideIndex = $(".viewed").val();
    if(n == -1) {
        n = (slideIndex - 1);
    } else {
        var a = parseInt(slideIndex);
        var b = parseInt(n);
        n = (a + b);
    }
    showSlides(n);
}

function currentSlide(n) {
    var $ = jQuery;
    $(".viewed").val(n);
    showSlides(n);
}
function showSlides(n) {
    var $ = jQuery;
    var slides = $(".slides").length;
    var slideIndex = n;
    if (n > slides) {
        //go back to first slide
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides;
    }
    for (i = 1; i <= slides; i++) {
        $(".slide"+i).hide();
        $(".preview"+i).removeClass('active-preview');
    }
    $(".slide"+slideIndex).show();
    $(".preview"+slideIndex).addClass('active-preview');
    $(".viewed").val(n);
}