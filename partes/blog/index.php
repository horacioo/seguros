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
            $image_path = get_attached_file($image);
            $tamanhos = [   
                ['largura' => 176, 'altura' => 109,   'qualidade' => 70],
                ['largura' => 239, 'altura' => 149,   'qualidade' => 60]
              ];
            $imagens = reduzirImagem($image_path, $tamanhos);
        

            // Exibe a imagem se ela existir
            if ($image) {
                echo '<li>';
                echo '<picture><img src="' .  $imagens['urls']['239x149'] . '" alt="teste"></picture>';
                echo '<a class="titulo"  href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                echo '<a class="descricao" href="' . get_category_link($category->term_id) . '">' . $category->description . '</a>';
                echo '<a class="button" href="' . get_category_link($category->term_id) . '"> acessar </a>';
                echo '</li>';
            } else {
                echo '<li>';
                echo '<a class="descricao" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                echo '<a class="descricao" href="' . get_category_link($category->term_id) . '">' . $category->description . '</a>';
                echo '<a class="button" href="' . get_category_link($category->term_id) . '"> acessar</a>';
                echo '</li>';
            }
        }
        echo '</ul>';
    } else {
        echo 'Nenhuma categoria pai encontrada.';
    }
    ?>

</section>