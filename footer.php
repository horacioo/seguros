<footer>
    <section>
        <ul>
            <li>Rua Senador Dantas,117</li>
            <li>Sobreloja 216 </li>
            <li>Centro - Rio de Janeiro</li>
        </ul>
    </section>
    <section>
        <ul>
            <li>Email: printcad@printcadcopias.com.br</li>
            <li>Telefone: 55 21 2262-9132</li>
            <li>Telefone: 55 21 2262-5716</li>
        </ul>
    </section>
    <section>
        <ul>
            <li>formas de pagamento:</li>
            <li><img alt="imagens que representam as formas de pagamento" width="237" height="32" src="<?php echo tema ?>/partes/roodape/imagens/bandeiras.svg"></li>
        </ul>
    </section>
</footer>




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

        prevArrow: jQuery('.custom-prev'),  // Seta "Anterior"
        nextArrow: jQuery('.custom-next'),  // Seta "Próxima"
    });
</script>

<?php wp_footer(); ?>
</body>

</html>