<?php
    while (have_posts()) :
        the_post();
        $id = get_the_ID();
        $titulo = get_the_title();
        $resumo = get_the_excerpt();

        // Adicionar schema para Post (Article)
        $article_schema = 'itemscope itemtype="https://schema.org/Article"';

        if(is_single( )){
            $current_category = get_the_category( $id );
            $idDaCategoria = $current_category[0]->term_id;
           // print_r( $current_category[0] );
        }

        /**************************************************************/
        $image_id = get_post_thumbnail_id($id); // Obter ID do thumbnail
        $image_path = get_attached_file($image_id); // Caminho absoluto 
        /**************************************************************/
        $tamanhos = [
            ['largura' => 1100, 'altura' => 212, 'qualidade' => 60],
        ];
        $imagens = reduzirImagem($image_path, $tamanhos, "jpeg");
        /**************************************************************/

        $conteudo  = get_the_content();
        $categoria = get_the_category( $id );
        $content = inserir_html_no_meio_do_conteudo($conteudo, $categoria);

        // Adicionar schema para Imagem (ImageObject)
        if( is_array($imagens) ):        
            echo '<p itemscope itemtype="https://schema.org/ImageObject">';
            echo '<img title='.get_the_excerpt( $id ).' width="219" height="134" alt="corretora de seguros em santos '.$image_id.' " src="' . $imagens['urls']['1100x212'] . '" itemprop="url image" class="thumb">';
            echo '<meta itemprop="width" content="219">';
            echo '<meta itemprop="height" content="134">';
            echo '<meta itemprop="contentUrl" content="' . $imagens['urls']['1100x212'] . '">';
            echo '<meta itemprop="encodingFormat" content="image/jpeg">'; // ou outro formato, como 'image/png'
            echo '</p>';
        endif;

        // Iniciar o conteúdo principal com schema Article
        echo "<div id='content' $article_schema>";
        echo '<h1 itemprop="headline">' . $titulo . '</h1>'; // Adicionar itemprop para título
        echo '<div itemprop="articleBody">' . $content . '</div>'; // Adicionar itemprop para conteúdo
        echo "</div>";

    endwhile;
?>
