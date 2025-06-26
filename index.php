<?php get_header(); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <main id="page-template">
            <div class="intro">
                <h1 class="title-section"><?php the_title(); ?></h1>
            </div>
            <?php the_content(); ?>
        </main>
    <?php }
} ?>

<?php get_footer(); ?>