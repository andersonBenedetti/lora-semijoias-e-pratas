<?php
$footer_menu_semi = [
    ['label' => 'Brincos', 'url' => '#'],
    ['label' => 'Anéis', 'url' => '#'],
    ['label' => 'Colares', 'url' => '#'],
    ['label' => 'Pulseiras', 'url' => '#'],
    ['label' => 'Pingentes', 'url' => '#'],
    ['label' => 'Braceletes', 'url' => '#'],
];

$footer_menu_prata = [
    ['label' => 'Brincos', 'url' => '#'],
    ['label' => 'Anéis', 'url' => '#'],
    ['label' => 'Colares', 'url' => '#'],
    ['label' => 'Pulseiras', 'url' => '#'],
    ['label' => 'Pingentes', 'url' => '#'],
    ['label' => 'Braceletes', 'url' => '#'],
];

$footer_menu_nav = [
    ['label' => 'Minha Conta', 'url' => '#'],
    ['label' => 'Meus pedidos ', 'url' => '#'],
    ['label' => 'Políticas de Privacidade', 'url' => '#'],
    ['label' => 'Políticas de Entrega', 'url' => '#'],
];
?>

<footer id="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <p>Rua Desembargador Pedro Silva, 540 - Sala 801 - Centro, Criciúma - SC, 88802-186</p>
                <p>contato@lorasemijoias.com.br
                    (48) 99976-3251</p>
            </div>

            <div class="footer-column">
                <h3>Semijóias</h3>
                <ul>
                    <?php
                    foreach ($footer_menu_semi as $item) {
                        echo '<li><a href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Prata 925</h3>
                <ul>
                    <?php
                    foreach ($footer_menu_prata as $item) {
                        echo '<li><a href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Navegue</h3>
                <ul>
                    <?php
                    foreach ($footer_menu_nav as $item) {
                        echo '<li><a href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="footer-infos">
            <p>Lorá. Todos os direitos reservados.</p>

            <div class="footer-social">
                <a href="#">
                    <?php include get_stylesheet_directory() . '/img/icons/qlementine-icons_instagram.svg'; ?>
                </a>

                <a href="#">
                    <?php include get_stylesheet_directory() . '/img/icons/qlementine-icons_facebook.svg'; ?>
                </a>

                <a href="#">
                    <?php include get_stylesheet_directory() . '/img/icons/hugeicons_pinterest.svg'; ?>
                </a>

                <a href="#">
                    <?php include get_stylesheet_directory() . '/img/icons/ic_baseline-whatsapp.svg'; ?>
                </a>
            </div>

            <p>Desenvolvido por <a href="#">Blume Web Studio</a></p>
        </div>
    </div>
</footer>

<a href="https://wa.me/5548991219619" class="whatsapp-float" target="_blank" aria-label="Fale conosco no WhatsApp">
    <img src="https://cdn.jsdelivr.net/gh/rafaelbotazini/floating-whatsapp/whatsapp.svg" alt="WhatsApp" width="60"
        height="60">
</a>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".quantity").forEach(function (quantityWrapper) {
            const input = quantityWrapper.querySelector("input.qty");

            if (!input) return;

            const minusButton = document.createElement("button");
            minusButton.textContent = "-";
            minusButton.classList.add("qty-minus");

            const plusButton = document.createElement("button");
            plusButton.textContent = "+";
            plusButton.classList.add("qty-plus");

            quantityWrapper.prepend(minusButton);
            quantityWrapper.append(plusButton);

            minusButton.addEventListener("click", function (e) {
                e.preventDefault();
                let value = parseInt(input.value) || 1;
                if (value > 1) input.value = value - 1;
            });

            plusButton.addEventListener("click", function (e) {
                e.preventDefault();
                let value = parseInt(input.value) || 1;
                input.value = value + 1;
            });
        });

        const header = document.getElementById("header");

        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                header.classList.add("shrink");
            } else {
                header.classList.remove("shrink");
            }
        });
    });

    const app = new Vue({
        el: '#app',
        data: {
            activeMenu: false,
        },
        created() { },
        methods: {}
    });
</script>

</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
<?php wp_footer(); ?>
</body>

</html>