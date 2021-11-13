import $ from 'jquery'
import 'slick-carousel'


$(document).ready(function(){
  $(".gallery-slider").slick({

    infinite: true,
    autoplay: true,
    autoplaySpeed: 1500,
    slidesToShow: 3,
    responsive: [{

        breakpoint: 1280,
        settings: {
          slidesToShow: 2,
          arrows: false
        }

      }, {

        breakpoint: 900,
        settings: {
          slidesToShow: 1,
          arrows: false
        }

      }]
  });
});
