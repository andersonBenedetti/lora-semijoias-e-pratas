<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <title>
        <?php if (is_front_page() || is_home()) {
            echo get_bloginfo('name');
        } else {
            echo wp_title('');
        } ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vue.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <div id="app">
        <?php
        $menu_items = [
            ['label' => 'SEMIJOIAS', 'url' => '#'],
            ['label' => 'PRATA 925', 'url' => '#'],
        ];
        ?>

        <header id="header">
            <p class="text-top">Compre no Atacado | Semijoias e Prata 925 | Frete Grátis acima de R$1500</p>

            <div class="container">
                <div class="content">
                    <a href="/" class="logo" aria-label="Ir para a página inicial">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-principal.webp"
                            alt="Logotipo Lorá" loading="lazy">
                    </a>

                    <div class="menu-header" :class="{ active: activeMenu }">
                        <button class="btn-menu" @click="activeMenu = !activeMenu"
                            :aria-expanded="activeMenu ? 'true' : 'false'" aria-label="Abrir menu" aria-controls="menu">
                            <span></span>
                        </button>

                        <ul class="menu-list" id="menu">
                            <?php
                            foreach ($menu_items as $item) {
                                echo '<li><a href="' . esc_url($item['url']) . '" aria-label="' . esc_attr($item['label']) . '">' . esc_html($item['label']) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="links">
                        <?php echo do_shortcode('[fibosearch]'); ?>
                        <a href="/minha-conta" class="user" aria-label="Área do Usuário">
                            <?php include get_stylesheet_directory() . '/img/icons/user.svg'; ?>
                        </a>
                        <?php echo do_shortcode('[xoo_wsc_cart]'); ?>
                    </div>
                </div>
            </div>
        </header>