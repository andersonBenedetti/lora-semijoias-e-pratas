<?php get_header(); ?>

<main id="archive-product">

  <section class="intro">
    <p class="category-icon">
      <?php
      if (is_tax('product_cat')) {
        $term_id = get_queried_object_id();

        $icone_da_categoria = get_field('icone_da_categoria', 'product_cat_' . $term_id);

        if ($icone_da_categoria) {
          echo esc_html($icone_da_categoria);
        } else {
          echo '';
        }
      }
      ?>
    </p>

    <h1 class="title">
      <?php
      if (is_shop()) {
        echo 'Loja';
      } else {
        single_cat_title();
      }
      ?>
    </h1>

    <?php
    $term_id = get_queried_object_id();
    $category_description = term_description($term_id, 'product_cat');

    if ($category_description): ?>
      <p class="category-description">
        <?php echo wp_kses_post(strip_tags($category_description)); ?>
      </p>
    <?php endif; ?>
  </section>

  <?php
  $products = [];
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      $product = wc_get_product(get_the_ID());

      if (!current_user_can('administrator')) {
        if ($product && $product->get_status() !== 'publish') {
          continue; // pula produto privado
        }
      }

      $products[] = $product;
    }
  }

  $data = [];
  $data['products'] = format_products($products);
  ?>

  <section class="filter-store">
    <div class="container">
      <div class="filters">
        <div class="filter-list">
          <div class="custom-select">
            <?php
            $product_categories = get_categories(array(
              'taxonomy' => 'product_cat',
              'hide_empty' => false,
            ));

            if (!empty($product_categories)) {
              echo '<select class="category-select" onchange="location = this.value;">';
              echo '<option value="">Selecione uma categoria</option>';
              foreach ($product_categories as $category) {
                echo '<option value="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</option>';
              }
              echo '</select>';
            } else {
              echo '<p>Não foram encontradas categorias de produtos.</p>';
            }
            ?>
          </div>
        </div>

        <div class="column-last">
          <p class="products-count">
            <?php echo "<span>" . count($products) . "</span> resultados encontrados"; ?>
          </p>

          <?php woocommerce_catalog_ordering(); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="products-store container">
    <?php if (!empty($data['products'][0])) { ?>
      <div>
        <?php lora_product_list($data['products']); ?>
        <?= get_the_posts_pagination(); ?>
      </div>
    </section>
  <?php } else { ?>
    <section class="no-results">
      <div class="container">
        <p>Nenhum resultado encontrado.</p>
        <p>Confira outras categorias ou redefina os filtros para encontrar o produto ideal.</p>
      </div>
    </section>
  <?php } ?>

</main>

<?php get_footer(); ?>