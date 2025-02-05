<section id="blog" itemscope itemtype="https://schema.org/ItemList">

    <header>
        <h2 itemprop="name">Nosso Blog</h2>
    </header>

    <?php
    $categories = get_categories(array(
        'parent' => 0,
    ));

    if (!empty($categories)) {
        echo '<ul>';
        foreach ($categories as $category) {

            $image = get_field('fotoscategory', 'category_' . $category->term_id);
            $image_path = get_attached_file($image);
            $tamanhos = [   
                ['largura' => 176, 'altura' => 109,   'qualidade' => 70],
                ['largura' => 239, 'altura' => 149,   'qualidade' => 60]
            ];
            $imagens = reduzirImagem($image_path, $tamanhos,"jpeg");

            // Exibe a imagem e a categoria, se existir
            echo '<li itemscope itemtype="https://schema.org/Category" itemprop="itemListElement">';
            if ($image) {
                echo '<picture><img src="' .  $imagens['urls']['239x149'] . '" alt="Imagem da categoria ' . $category->name . '" itemprop="image"></picture>';
            }
            echo '<a class="link titulo" href="' . get_category_link($category->term_id) . '" itemprop="url">' . $category->name . '</a>';
            echo '<span class="link" itemprop="description">' . $category->description . '</span>';
            echo '<a class="link button" href="' . get_category_link($category->term_id) . '" itemprop="url">Acessar</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Nenhuma categoria pai encontrada.';
    }
    ?>

</section>
