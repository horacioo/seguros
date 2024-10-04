<?php get_header('page');  ?>

<?php
get_template_part('partes/header/index');
get_template_part('partes/menu/index');
?>


<main id="page">
    <?php get_template_part('partes/pagina/index'); ?>

    <!----------------------------------------------------------->

    <aside>

        <h2>Serviços</h2>
        <?php
        $parent_id = 11; // Substitua pelo ID da sua página "Produtos"
        // Obter as páginas filhas
        $children = get_children(array(
            'post_parent' => $parent_id,
            'post_type'   => 'page',
            'orderby'     => 'menu_order',
            'order'       => 'ASC',
            'numberposts'    => 3
        ));



        // Verificar se existem páginas filhas
        if ($children) {
            echo '<ul>';
            foreach ($children as $child) {

                /**************************************************************/
                $image_id = get_post_thumbnail_id($child->ID); // Obter ID do thumbnail
                $image_path = get_attached_file($image_id); // Caminho absoluto da image
                /********************************************************/
                $thumb = get_the_post_thumbnail_url($child->ID);
                /******************************************************************************/
                $tamanhos = [
                    ['largura' => 512, 'altura' => 211,   'qualidade' => 50],
                ];
                $imagens = reduzirImagem($image_path, $tamanhos);
                /*******************************************************************************/
                echo '<li>
                       <img alt="imagem do produto" width="219" height="134" src="' . $imagens['urls']['512x211'] . '" class="thumbNail">
                       <a href="' . get_permalink($child->ID) . '">' . get_the_title($child->ID) . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo '-';
        }

        ?>

    </aside>
    <!----------------------------------------------------------->
</main>


<?php get_template_part('partes/contatos_/index'); ?>
<?php get_footer(); ?>