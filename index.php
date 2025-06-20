<?php get_header(); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="page-template">
            <div class="intro">
                <h1 class="title"><?php the_title(); ?></h1>
            </div>

            <?php
            if (is_cart() || is_checkout()): ?>
                <div class="delivery-info">
                    <strong>Segunda a Sexta:</strong> pedidos feitos até 17h serão entregues no mesmo dia<br>
                    <strong>Sábado:</strong> pedidos até 12h serão entregues no mesmo dia<br>
                    <strong>Domingo:</strong> pedidos serão entregues na segunda
                </div>
            <?php endif; ?>

            <?php the_content(); ?>
        </main>
    <?php }
} ?>

<?php get_footer(); ?>