<?php
$titulo_categoria = single_cat_title('', false);
echo '<h1>Categoria : ' . esc_html($titulo_categoria) . '</h1>';
?>

<?php
$current_category = get_queried_object_id();
$category_y_id = get_queried_object_id();
$subcategories = get_term_children($category_y_id, 'category');

$args = array(
    'cat' => $current_category,
    'posts_per_page' => 3,
    'category__not_in' => $subcategories, 
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Paginação
);
$query = new WP_Query($args);





/***********************************************************************************/
$thumb = get_field('fotoscategory', 'category_' . $current_category);
$descricao = get_field('descricao', 'category_' . $current_category);
$descricao2 = get_field('descricao2', 'category_' . $current_category);

$path = get_attached_file($thumb);

$tamanhos = [
    ['largura' => 392, 'altura' => 250,   'qualidade' => 80],
    ['largura' => 400, 'altura' => 350,   'qualidade' => 80],
    // ['largura' => 320, 'altura' => 300,   'qualidade' => 80],
];
$imagensxx = reduzirImagem($path, $tamanhos);



echo "
       <picture id='thumbCategory'>
                            <img alt='imagem do produto' width='219' height='134' src=" . $imagensxx['urls']['392x250'] . ">         
      </picture>
      
      ";

if (isset($descricao)) {
    echo "<span id='descricao'>" . $descricao . "</span>";
}else{ echo "<span id='descricao'></span>"; } 
if (isset($descricao2)) {
    echo "<span id='descricao2'>" . $descricao2 . "</span>";
}
else{ echo "<span id='descricao2'></span>"; } 
/***********************************************************************************/




echo "<div id='posts'>";












// Loop para exibir os posts da categoria atual
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
?>
        <article id="post-<?php the_ID(); ?>"
            <?php post_class(); ?>>

            <?php

            $ID = get_the_ID();
            /********************************************************/

            $x = get_the_category($ID);
            $CAT = $x[0]->term_id;
            $thumb = get_field('fotoscategory', 'category_' . $CAT);
            $path = get_attached_file($thumb);

            $tamanhos = [
                ['largura' => 392, 'altura' => 160,   'qualidade' => 70],
                ['largura' => 400, 'altura' => 350,   'qualidade' => 70],
                // ['largura' => 320, 'altura' => 300,   'qualidade' => 80],
            ];
            $imagensxx = reduzirImagem($path, $tamanhos);




            /*******************************************************/
            $x = get_the_post_thumbnail_url(get_the_ID());
            if ($x) {
                $attachment_id = attachment_url_to_postid($x);
                $path2 = get_attached_file($attachment_id);
                $tamanhos = [
                    ['largura' => 392, 'altura' => 160,   'qualidade' => 70],
                    ['largura' => 400, 'altura' => 350,   'qualidade' => 70],
                ];
                $imagensxx2 = reduzirImagem($path2, $tamanhos);
                $img = $imagensxx2['urls']['392x160'];
                /************************/
            } else {
                $img = $imagensxx['urls']['392x160'];
            }
            /*******************************************************/
            ?>



            <div class="entry-content">
                <!-------------------------->
                <p>
                    <picture>
                        <img alt="imagem do produto" width="219" height="134" src="<?php echo $img; ?>">
                    </picture>
                </p>
                <!-------------------------->
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
         
            </div>

        </article>

    <?php endwhile; ?>












<?php
    echo "</div>";
    // Paginação 
    the_posts_pagination();
    wp_reset_postdata();
else :
    echo '<p>Nenhum post encontrado nesta categoria.</p>';
endif;

?>
</div>



















<?php
// Obtém o objeto da categoria atual
$current_category = get_queried_object();

if ($current_category->parent) {
    // Obtém a categoria pai
    $parent_category = get_category($current_category->parent);

    // Exibe o nome da categoria pai com o link
    echo '<a class="pai" href="' . get_category_link($parent_category->term_id) . '">';
    echo $parent_category->name;
    echo '</a>';
} else {
   // echo 'Esta categoria não possui um pai.';
}
?>