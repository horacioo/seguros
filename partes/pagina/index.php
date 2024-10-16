
<?php
    while (have_posts()) :
        the_post();
        $id = get_the_ID();
        $titulo = get_the_title();
        $resumo = get_the_excerpt();

        if(is_single(  )){
            $current_category = get_the_category( $id );
            //echo "aqui é um single "; 
            //print_r( $current_category[0]->term_id  );
            $idDaCategoria = $current_category[0]->term_id;
           // print_r( $current_category[0] );
        }

        /**************************************************************/
        $image_id = get_post_thumbnail_id($id); // Obter ID do thumbnail
        $image_path = get_attached_file($image_id); // Caminho absoluto 
        /**************************************************************/
        $tamanhos = [
            ['largura' => 1100, 'altura' => 212,   'qualidade' => 90],
        ];
        $imagens = reduzirImagem($image_path, $tamanhos);
        /**************************************************************/


        if( is_array($imagens) ):        
             echo '<img alt="imagem do produto" width="219" height="134" src="' . $imagens['urls']['1100x212'] . '" class="thumb">';
        endif;

        echo "<div id='content'>";
        echo '<h1>' . $titulo . '</h1>';
        the_content();

        echo "<hr>";


        // Obtém as categorias associadas ao post atual
        $categories = get_the_category();

        if (! empty($categories)) {
            echo '<ul class="post-categories">';
            // Loop por cada categoria e exibe o nome com link
            foreach ($categories as $category) {
                echo '<li>Mais Textos da Categoria: <a href="' . esc_url(get_category_link($category->term_id)) . '"> ' . esc_html($category->name) . '</a></li>';
            }

            echo '</ul>';
        }
        echo "</div>";

    endwhile;
    ?>

