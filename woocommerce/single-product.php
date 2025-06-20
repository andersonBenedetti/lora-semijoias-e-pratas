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

					<p class="product-price"><?= wc_get_product($produto['id'])->get_price_html(); ?></p>

					<?php
					if (has_term('hortifruti', 'product_cat', $produto['id']) && wc_get_product($produto['id'])->get_attribute('unidade-de-venda') === 'KG') {
						$product_id = esc_attr($produto['id']);
						$unique_id = uniqid('quantity_');
						?>
						<form class="cart" method="post" enctype="multipart/form-data">
							<div class="gramas-label">Quantidade em gramas</div>
							<div class="custom-gramas">
								<button type="button" class="gramas-minus">-</button>

								<label for="<?= $unique_id; ?>" class="screen-reader-text">
									Quantidade em gramas do produto <?= esc_html($produto['name']); ?>
								</label>

								<input type="number" id="<?= $unique_id; ?>" name="gramas" value="500" aria-label="Quantidade (gramas)"
									min="500" step="100" inputmode="numeric" autocomplete="off" class="input-text qty text" />

								<button type="button" class="gramas-plus">+</button>
							</div>

							<input type="hidden" name="add-to-cart" value="<?= esc_attr($produto['id']); ?>" />
							<button type="submit" class="single_add_to_cart_button button alt">Comprar</button>
						</form>

						<script>
							document.addEventListener('DOMContentLoaded', function () {
								const wrapper = document.querySelector('.custom-gramas');
								if (!wrapper) return;

								const input = wrapper.querySelector('input');
								const minusBtn = wrapper.querySelector('.gramas-minus');
								const plusBtn = wrapper.querySelector('.gramas-plus');

								minusBtn.addEventListener('click', function () {
									let value = parseInt(input.value);
									const step = parseInt(input.step);
									const min = parseInt(input.min);
									if (value > min) input.value = value - step;
								});

								plusBtn.addEventListener('click', function () {
									let value = parseInt(input.value);
									const step = parseInt(input.step);
									input.value = value + step;
								});
							});
						</script>

						<?php
					} else {
						// Produtos fora da categoria hortifruti continuam com o botão normal
						woocommerce_template_single_add_to_cart();
					}
					?>

				</div>
			</section>

			<section class="description-product">
				<div class="container">
					<div class="content">
						<h2 class="title">Descrição</h2>
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
				<h2 class="title">Produtos relacionados</h2>

				<?php lora_product_list($related); ?>
			</div>
			</section>

			<?php
	}
	?>

</main>

<?php get_footer(); ?>