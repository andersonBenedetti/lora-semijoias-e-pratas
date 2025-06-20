<?php
$footer_menu_items = [
    ['label' => 'Sobre a Quitanda', 'url' => '/sobre-nos'],
    ['label' => 'Entre em contato', 'url' => '/entre-em-contato'],
    ['label' => 'Políticas de Privacidade', 'url' => '/politicas-de-privacidade'],
    ['label' => 'Políticas de Troca e Devolução', 'url' => '/politicas-de-troca-e-devolucao'],
    ['label' => 'Termos e Condições', 'url' => '/termos-e-condicoes'],
];
?>

<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="content">
            <div class="column-1">
                <a href="/" class="logo" aria-label="Voltar para página inicial">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-principal.svg"
                        alt="Logo Quitanda - Voltar para página inicial" loading="lazy">
                </a>
                <p>CNPJ: 30.347.742/0001-59</p>
                <a href="mailto:contato@mercadoquitanda.com.br" aria-label="Envie um email para contato"
                    class="link">contato@mercadoquitanda.com.br</a>
                <a href="tel:+5548991219619" aria-label="Ligar para o atendimento" class="link-number">(48)
                    99121-9619</a>
            </div>

            <nav aria-labelledby="footer-nav">
                <h3 id="footer-nav">Navegue</h3>
                <ul>
                    <?php
                    foreach ($footer_menu_items as $item) {
                        echo '<li><a href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a></li>';
                    }
                    ?>
                </ul>
            </nav>

            <div class="infos">
                <h3>Informações</h3>
                <p>Endereço: </br>Rua Almirante Barroso, 535 - sala 02, Criciúma 88802-249</p>
                <p>Horário de Atendimento: </br>Segunda à Sexta das 9h às 19h30 e Sábado das 9h às 13h</p>
                <div class="certificates">
                    <p>Selos e certificados:</p>
                    <div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/produto-organico.webp"
                            alt="Produto Orgânico Brasil" loading="lazy">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ssl.webp" alt="SSL" loading="lazy">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ibd.webp" alt="IBD" loading="lazy">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/glutenfree.webp" alt="Glutenfree"
                            loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom">
        <p>Mercado Quitanda. Todos os direitos reservados. Desenvolvido por <a href="https://blumewebstudio.com.br/"
                target="_blank" rel="noopener noreferrer">Blume Web Studio</a></p>
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