<!DOCTYPE html>
<html lang="pt-BR" itemscope itemtype="https://schema.org/WebSite">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    ob_start();

    $path_corrigido = str_replace('\\', '/', get_template_directory());
    define('pasta', $path_corrigido);
    define("tema", get_theme_file_uri());

    ?>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Negócio certo seguros",
            "url": "<?php echo home_url(); ?>",
            "logo": "<?php echo tema; ?>/imagens/logo.png",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+55-13-99132-0809",
                "contactType": "Contato Comercial",
                "areaServed": "BR",
                "availableLanguage": ["Portuguese", "English"]
            }
        }
    </script>



   <!--- <style>
        @font-face {
            font-family: "Inter";
            src: url("<?php echo tema ?>/fontes/league/LeagueSpartan-Regular.ttf") format('truetype');
        }

        @font-face {
            font-family: "inter2";
            src: url("<?php echo tema ?>/fontes/league/LeagueSpartan-ExtraLight.ttf")format('truetype');
        }


        @font-face {
            font-family: "passion";
            src: url("<?php echo tema ?>/fontes/passion/PassionOne-Regular.ttf")format('truetype');
        }

       

        * {
            font-family: 'Inter';
        }
    </style>-->


    <?php echo get_template_part( 'fontes' )?>


    <link rel="stylesheet" href="<?php echo tema; ?>/css/slick/slick.css" media="all">
    <link rel="alternate" hreflang="pt-br" href="<?php echo home_url(); ?>" />

    <style>
        <?php echo file_get_contents(tema . "/css/index.css"); ?>
    </style>

    <?php wp_head(); ?>


</head>

<body class='wrapper'>