<section id="blog">

    <header>
        <h2>Nosso Blog</h2>
    </header>

    <?php
    $categories = get_categories(array(
        'parent' => 0,
    ));

    if (! empty($categories)) {
        echo '<ul>';
        foreach ($categories as $category) {

            $image = get_field('fotoscategory', 'category_' . $category->term_id);


            $tamanhos = [
                ['largura' => 176, 'altura' => 109,   'qualidade' => 50],
            ];
            $imagens = reduzirImagem($image, $tamanhos);
            var_dump($imagens);


            // Exibe a imagem se ela existir
            if ($image) {
                echo '<li>';
                //echo '<img src="' .  $imagens['urls']['176x109'] . '" alt="teste">';
                echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                echo '</li>';
            } else {
                echo '<li>';
                echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                echo '</li>';
            }
        }
        echo '</ul>';
    } else {
        echo 'Nenhuma categoria pai encontrada.';
    }
    ?>

</section>