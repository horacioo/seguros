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
    'posts_per_page' => 10,
    'post_type'      => 'post',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Paginação
);


$query = new WP_Query($args);




/***********************************************************************************/
if (get_field('fotoscategory', 'category_' . $current_category)) {
    $thumb = get_field('fotoscategory', 'category_' . $current_category);
    $path = get_attached_file($thumb);

    $tamanhos = [
        ['largura' => 392, 'altura' => 250,   'qualidade' => 80],
        ['largura' => 400, 'altura' => 350,   'qualidade' => 80],
        // ['largura' => 320, 'altura' => 300,   'qualidade' => 80],
    ];
    $imagensxx = reduzirImagem($path, $tamanhos, "jpeg");
} else {
    $thumb = "";
}



/************************************************************************/
/************************************************************************/
if (get_field('descricao', 'category_' . $current_category)) {
    $descricao = get_field('descricao', 'category_' . $current_category);
} else {
    $descricao = "";
}
/************************************************************************/
if (get_field('descricao2', 'category_' . $current_category)) {
    $descricao2 = get_field('descricao2', 'category_' . $current_category);
} else {
    $descricao2 = "";
}
/************************************************************************/
/************************************************************************/






echo "
       <picture id='thumbCategory'>
                            <img alt='imagem do produto' width='219' height='134' src=" . $imagensxx['urls']['392x250'] . ">         
      </picture>
      
      ";


/***********************************************************************************/
/***********************************************************************************/
/***********************************************************************************/

if (isset($descricao)) {
    // Schema para descrição de categoria
    echo "<div id='descricao' itemscope itemtype='https://schema.org/Thing'>";
    echo "<span itemprop='description'>" . $descricao . "</span>";
    echo "</div>";
} else {
    echo "<div id='descricao' itemscope itemtype='https://schema.org/Thing'><span itemprop='description'></span></div>";
}

if (isset($descricao2)) {
    // Schema para segunda descrição de categoria
    echo "<div id='descricao2' itemscope itemtype='https://schema.org/Thing'>";
    echo "<span itemprop='description'>" . $descricao2 . "</span>";
    echo "</div>";
} else {
    echo "<div id='descricao2' itemscope itemtype='https://schema.org/Thing'><span itemprop='description'></span></div>";
}

/***********************************************************************************/
/***********************************************************************************/
/***********************************************************************************/


?>



<div id='posts'>
    <?php
    // Loop para exibir os posts da categoria atual
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>




            <!-------------------------------------------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------------------------------------------->
            <article itemscope itemtype="https://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php
                $ID = get_the_ID();
                /********************************************************/
                $x = get_the_category($ID);
                $CAT = $x[0]->term_id;
                $thumb = get_field('fotoscategory', 'category_' . $CAT);
                $path = get_attached_file($thumb);

                $tamanhos = [
                    ['largura' => 392, 'altura' => 160, 'qualidade' => 70],
                    ['largura' => 400, 'altura' => 350, 'qualidade' => 70],
                ];
                $imagensxx = reduzirImagem($path, $tamanhos, "jpeg");

                /*******************************************************/
                $x = get_the_post_thumbnail_url(get_the_ID());
                if ($x) {
                    $attachment_id = attachment_url_to_postid($x);
                    $path2 = get_attached_file($attachment_id);
                    $tamanhos = [
                        ['largura' => 392, 'altura' => 160, 'qualidade' => 70],
                        ['largura' => 400, 'altura' => 350, 'qualidade' => 70],
                    ];
                    $imagensxx2 = reduzirImagem($path2, $tamanhos, "jpeg");
                    $img = $imagensxx2['urls']['392x160'];
                } else {
                    $img = $imagensxx['urls']['392x160'];
                }
                /*******************************************************/
                ?>

                <div class="entry-content">

                    <!-- Imagem com dados estruturados (associada ao BlogPosting e Article) -->

                    <p itemscope itemtype="https://schema.org/ImageObject">
                        <picture>
                            <!-- Corrigir o itemprop para associar a imagem ao esquema ImageObject e BlogPosting -->
                            <img width="219" height="134" src="<?php echo $img; ?>" itemprop="url image" alt="Descrição da Imagem">
                        </picture>

                        <meta itemprop="width" content="219">
                        <meta itemprop="height" content="134">
                        <meta itemprop="contentUrl" content="<?php echo $img; ?>">
                        <meta itemprop="encodingFormat" content="image/jpeg"> <!-- ou outro formato, como 'image/png' -->
                        <meta itemprop="caption" content="Descrição opcional da imagem">
                    </p>

                    <!-- Título do Post -->
                    <h2>
                        <a href="<?php the_permalink(); ?>" itemprop="headline"><?php the_title(); ?></a>
                    </h2>

                    <!-- Dados estruturados para o artigo -->
                    <p itemscope itemtype="https://schema.org/Article">
                        <a href="<?php the_permalink(); ?>" itemprop="url">
                            <span itemprop="description">
                                <?php
                                $resumo = get_the_excerpt();
                                echo strip_tags($resumo);
                                ?>
                            </span>
                        </a>

                        <!-- Adicionando a imagem como parte do schema Article e BlogPosting -->
                        <meta itemprop="image" content="<?php echo $img; ?>"> <!-- Caminho para a imagem -->
                    </p>

                    <!-- Outros campos para o schema BlogPosting -->
                    <meta itemprop="author" content="<?php the_author(); ?>"> <!-- Nome do autor -->
                    <meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>"> <!-- Data de publicação -->
                    <meta itemprop="dateModified" content="<?php echo get_the_modified_date('c'); ?>"> <!-- Data de modificação -->
                    <meta itemprop="publisher" content="Negócio Certo Seguros"> <!-- Nome do editor -->
                    <meta itemprop="logo" content="URL-DO-LOGO"> <!-- Logo do publisher (opcional) -->

                </div>

            </article>

            <!-------------------------------------------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------------------------------------------->



        <?php endwhile; ?>











    <?php
        //echo "</div>";
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