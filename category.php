<?php get_header('categoria');  ?>

<?php
get_template_part('partes/header/index');
get_template_part('partes/menu/index');
?>


<!----------------------------------------------------------->

<main id="categorias">
<!---------------------------->
<!---------------------------->
<?php get_template_part('partes/category/index'); ?>
<!---------------------------->
<!---------------------------->
</main>
<!----------------------------------------------------------->



<?php get_template_part('partes/contatos_/index'); ?>
<?php get_footer(); ?>