<?php
// Template Name: Home
?>

<?php get_header(); ?>

<?php
$status = current_user_can('administrator') ? ['publish', 'private'] : 'publish';

$products_hortifruti = wc_get_products([
    'limit' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
    'category' => ['hortifruti'],
    'status' => $status,
    'stock_status' => 'instock',
]);

$products_mercearia = wc_get_products([
    'limit' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
    'category' => ['mercearia'],
    'status' => $status,
    'stock_status' => 'instock',
]);

$data = [];
$data['hortifruti'] = format_products($products_hortifruti);
$data['mercearia'] = format_products($products_mercearia);
?>

<main id="pg-home">

    <section class="carousel-home">
        <?php
        $args = array(
            'post_type' => 'carrossel',
            'status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'DESC',
        );
        $the_query = new WP_Query($args); ?>

        <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()):
                $the_query->the_post(); ?>

                <a href="<?php the_field('link_da_imagem'); ?>">
                    <img class="dkp" src="<?php the_field('imagem_-_desktop'); ?>" alt="<?php the_title(); ?>">
                    <img class="mbl" src="<?php the_field('imagem_-_mobile'); ?>" alt="<?php the_title(); ?>">
                </a>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p><?php _e('Desculpe, nenhum slide encontrado.'); ?></p>
        <?php endif; ?>
    </section>

    <section class="products-shop">
        <div class="container">
            <div class="top">
                <h2>Orgânicos e fresquinhos</h2>
                <a href="/categoria-produto/hortifruti/" class="btn">Ver todos os ítens</a>
            </div>

            <?php if (!empty($data['hortifruti'])): ?>
                <?php lora_product_list($data['hortifruti']); ?>
            <?php else: ?>
                <p><?php _e('Nenhum produto encontrado na categoria Hortifruti.'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="products-shop secondary">
        <div class="container">
            <div class="top">
                <h2>Mercearia | Tudo para sua despensa</h2>
                <a href="/categoria-produto/mercearia/" class="btn">Ver todos os ítens</a>
            </div>

            <?php if (!empty($data['mercearia'])): ?>
                <?php lora_product_list($data['mercearia']); ?>
            <?php else: ?>
                <p><?php _e('Nenhum produto encontrado na categoria Mercearia.'); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>