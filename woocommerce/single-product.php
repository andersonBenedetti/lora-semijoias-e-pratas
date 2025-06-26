<?php get_header(); ?>

<?php
function format_single_product($id)
{
	$product = wc_get_product($id);

	return [
		'id' => $id,
		'name' => $product->get_name(),
		'link' => $product->get_permalink(),
		'description' => $product->get_description(),
		'short_description' => $product->get_short_description(),
	];
}
?>

<main id="single-product">

	<div class="notification">
		<?php wc_print_notices(); ?>
	</div>

	<section class="content-product container">
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				$produto = format_single_product(get_the_ID());
				?>
				<div class="product-gallery">
					<?php echo do_shortcode('[wcgs_gallery_slider]'); ?>
				</div>
				<div class="product-detail">
					<h1 class="title"><?= $produto['name']; ?></h1>

					<p class="short-description">
						<?= wpautop(wp_kses_post($produto['short_description'])); ?>
					</p>

					<?php if (is_user_logged_in()): ?>
						<p class="product-price"><?= wc_get_product($produto['id'])->get_price_html(); ?></p>
						<p class="price-info">Até 3x sem juros ou 5% de desconto no PIX</p>
						<?php woocommerce_template_single_add_to_cart(); ?>
					<?php else: ?>
						<p class="login-to-see-price">Faça o login para visualizar os valores</p>
					<?php endif; ?>

					<div class="product-description">
						<h3 class="title-description">Descrição</h3>
						<?php echo wpautop(wp_kses_post($produto['description'])); ?>
					</div>

				</div>
			</section>
		<?php }
		} ?>

	<?php
	$related_ids = get_post_meta($produto['id'], '_upsell_ids', true);
	$related_products = [];

	if (!empty($related_ids)) {
		foreach ($related_ids as $product_id) {
			$related_products[] = wc_get_product($product_id);
		}
	}

	if (!empty($related_products)) {
		$related = format_products($related_products);
		?>

		<section class="related-list">
			<div class="container">
				<h2 class="title-section">conheça outras peças</h2>

				<?php lora_product_list($related, 'products-grid'); ?>
			</div>
		</section>

		<?php
	}
	?>

</main>

<?php get_footer(); ?>