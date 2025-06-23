<?php
// Template Name: Home
?>

<?php get_header(); ?>

<?php
$status = current_user_can('administrator') ? ['publish', 'private'] : 'publish';

$products_lancamentos = wc_get_products([
    'limit' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'status' => $status,
    'stock_status' => 'instock',
]);

$products_prata = wc_get_products([
    'limit' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'category' => ['prata-925'],
    'status' => $status,
    'stock_status' => 'instock',
]);

$data = [];
$data['lancamentos'] = format_products($products_lancamentos);
$data['prata-925'] = format_products($products_prata);
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
            <h2 class="title-section">Lançamentos</h2>

            <?php if (!empty($data['lancamentos'])): ?>
                <?php lora_product_list($data['lancamentos']); ?>
            <?php else: ?>
                <p><?php _e('Nenhum produto encontrado.'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="section-categories">
        <a class="categories-item" href="#"><span>Brincos</span></a>
        <a class="categories-item" href="#"><span>Colares</span></a>
        <a class="categories-item" href="#"><span>Anéis</span></a>
        <a class="categories-item" href="#"><span>Pulseiras</span></a>
    </section>

    <section class="products-shop secondary">
        <div class="container">
            <h2 class="title-section">Prata 925</h2>

            <?php if (!empty($data['prata-925'])): ?>
                <?php lora_product_list($data['prata-925']); ?>
            <?php else: ?>
                <p><?php _e('Nenhum produto encontrado na categoria Prata 925.'); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>