(function ($) {
    "use strict";

    // Search on Panduan

    // document.addEventListener('DOMContentLoaded', function () {
    //     const toggleElements = document.querySelectorAll('.toggle-answer, .toggle-icon');

    //     toggleElements.forEach(function (element) {
    //         element.addEventListener('click', function (event) {
    //             event.preventDefault();
    //             const answerId = this.getAttribute('data-toggle-id');
    //             const answerElement = document.getElementById('answer-' + answerId);

    //             if (answerElement.style.display === 'none') {
    //                 answerElement.style.display = 'block';
    //                 const icon = document.querySelector('.toggle-icon[data-toggle-id="' + answerId + '"] i');
    //                 if (icon) icon.className = 'fas fa-minus';
    //             } else {
    //                 answerElement.style.display = 'none';
    //                 const icon = document.querySelector('.toggle-icon[data-toggle-id="' + answerId + '"] i');
    //                 if (icon) icon.className = 'fas fa-plus';
    //             }
    //         });
    //     });

    //     // Pencarian
    //     const searchInput = document.getElementById('searchInput');
    //     const searchButton = document.getElementById('searchButton');
    //     const answerElements = document.querySelectorAll('.answer');

    //     searchButton.addEventListener('click', function () {
    //         const searchTerm = searchInput.value.toLowerCase();

    //         answerElements.forEach(function (answerElement) {
    //             const content = answerElement.textContent.toLowerCase();
    //             if (content.includes(searchTerm)) {
    //                 answerElement.style.display = 'block';
    //             } else {
    //                 answerElement.style.display = 'none';
    //             }
    //         });
    //     });
    // });


    // Search on Nav

    // $(document).ready(function () {
    //     $("#searchButton").click(function () {
    //         // Ambil nilai dari input pencarian
    //         var keyword = $("#searchInput").val();
    //         var base_url = "<?= base_url(' / artikel / search') ?>";

    //         // Bersihkan karakter yang tidak diinginkan dari keyword
    //         keyword = keyword.replace(/[^\w\s-]/g, ''); // Menghapus karakter khusus

    //         // Ubah spasi menjadi tanda "-" untuk membuat URL yang bersih
    //         keyword = keyword.replace(/\s+/g, '-');

    //         // Redirect ke halaman pencarian dengan query parameter
    //         window.location.href = base_url + keyword;
    //     });
    // });

    // Dropdown on mouse hover

    

    document.getElementById('profileDropdownToggle').addEventListener('click', function () {
        var dropdownMenu = document.querySelector('#profileDropdown');
        dropdownMenu.classList.toggle('show');
    });

    document.addEventListener('click', function (event) {
        var isClickInside = document.getElementById('profileDropdown').contains(event.target);
        var isClickOnToggle = document.getElementById('profileDropdownToggle').contains(event.target);

        if (!isClickInside && !isClickOnToggle) {
            var dropdownMenu = document.querySelector('#profileDropdown');
            dropdownMenu.classList.remove('show');
        }
    });




    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });



    // Main News carousel
    $(".main-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        center: true,
    });


    // Tranding carousel
    $(".tranding-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ]
    });


    // Carousel item 1
    $(".carousel-item-1").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ]
    });

    // Carousel item 2
    $(".carousel-item-2").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            }
        }
    });


    // Carousel item 3
    $(".carousel-item-3").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });


    // Carousel item 4
    $(".carousel-item-4").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

})(jQuery);

