<script src="<?php echo tema; ?>/javascript/jquery.slim.min.js"></script>
<script src="<?php echo tema; ?>/partes/menu/javascript/menu.min.js"></script>
<script src="<?php echo tema; ?>/javascript/slick.min.js"></script>

<script>
    jQuery('#slideSeguradoras').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,

        prevArrow: jQuery('.custom-prev'), // Seta "Anterior"
        nextArrow: jQuery('.custom-next'), // Seta "Próxima"
    });
</script>

<?php wp_footer(); ?>
</body>

</html>