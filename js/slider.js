jQuery(document).ready(function () {
  jQuery(".carousel-feedback").slick({
    autoplay: true,
    dots: false,
    arrows: false,
    infinite: true,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 3,
    slidesToScroll: 1,
    swipeToSlide: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  jQuery(".carousel-home").slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
});
