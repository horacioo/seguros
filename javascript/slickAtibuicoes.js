$('#slideInter').slick({
    infinite: true,
    prevArrow: $('.custom-prev'),
    nextArrow: $('.custom-next'),

    autoplay: true, // Ativa a rotação automática
    autoplaySpeed: 3000, // Define a troca de imagem a cada 1000 ms (1 segundo)
    ///arrows: false // Remove as setas (opcional, se não quiser setas)

    responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0.3px',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 400,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0.3px',
                slidesToShow: 1
            }
        },
    ]
});



$('#slideLoja').slick({
    infinite: true,
    prevArrow: $('.custom-prev'),
    nextArrow: $('.custom-next'),
    speed: 4000,
    autoplay: true, // Ativa a rotação automática
    autoplaySpeed: 600, // Define a troca de imagem a cada 1000 ms (1 segundo)
    arrows: true, ///arrows: false // Remove as setas (opcional, se não quiser setas)

    responsive: [{
        breakpoint: 768,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
        }
    }],
});



$('#slideDepoimentos').children('ul').slick({
    infinite: true,
    prevArrow: $('.custom-prev'),
    nextArrow: $('.custom-next'),
    speed: 2000,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true, // Ativa a rotação automática
    autoplaySpeed: 3000, // Define a troca de imagem a cada 1000 ms (1 segundo)
    responsive: [{
        breakpoint: 768,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '4px',
            slidesToShow: 1
        }
    }]

});