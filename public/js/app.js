document.addEventListener('DOMContentLoaded', function () {
    if (window.Swiper && document.querySelector('.student-stories-swiper')) {
        new Swiper('.student-stories-swiper', {
            loop: true,
            speed: 600,
            spaceBetween: 16,
            grabCursor: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: '.student-stories-swiper .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.student-stories-swiper .swiper-button-next',
                prevEl: '.student-stories-swiper .swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 14,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 18,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                },
            },
        });
    }
});
