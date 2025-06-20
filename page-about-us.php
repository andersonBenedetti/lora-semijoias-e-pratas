<?php
// Template Name: Sobre nós
?>

<?php get_header(); ?>

<?php
$cat_items = [
    ['icon' => 'hortifruti.webp', 'title' => 'Hortifruti', 'link' => '/hortifruti'],
    ['icon' => 'mercearia.webp', 'title' => 'Mercearia', 'link' => '/mercearia'],
    ['icon' => 'padaria.webp', 'title' => 'Padaria', 'link' => '/padaria'],
    ['icon' => 'higiene_pessoal.webp', 'title' => 'Higiene Pessoal', 'link' => '/higiene-pessoal'],
    ['icon' => 'limpeza.webp', 'title' => 'Limpeza', 'link' => '/limpeza'],
    ['icon' => 'laticinios.webp', 'title' => 'Laticínios', 'link' => '/laticinios'],
    ['icon' => 'acougue.webp', 'title' => 'Açougue', 'link' => '/acougue'],
    ['icon' => 'bebidas.webp', 'title' => 'Bebidas', 'link' => '/bebidas'],
    ['icon' => 'cosmeticos.webp', 'title' => 'Cosméticos', 'link' => '/cosmeticos'],
    ['icon' => 'aromaterapia.webp', 'title' => 'Aromaterapia', 'link' => '/aromaterapia'],
    ['icon' => 'bazar.webp', 'title' => 'Bazar', 'link' => '/bazar'],
    ['icon' => 'infantil.webp', 'title' => 'Infantil', 'link' => '/infantil'],
];
?>

<main id="pg-about">

    <section class="section-intro">
        <div class="content-intro">
            <img class="intro-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/quitanda-sobre-nos.png"
                alt="Quitanda">
            <h1>Mercado Quitanda: Cuidado que Alimenta a Vida</h1>
            <p>No Mercado Quitanda, acreditamos no poder transformador da alimentação. Nossa missão é reunir, em um só
                lugar, tudo o que você precisa para nutrir quem você ama com afeto, consciência e praticidade. Somos
                mais que um mercado online: somos a sua quitanda de confiança, com a conveniência que a vida moderna
                pede.</p>
            <p>O nome Quitanda honra o frescor e a origem do alimento natural. Com o compromisso em levar qualidade,
                saúde e conveniência direto para a sua rotina.</p>
            <p>Aqui, cada escolha é pensada para que você possa cozinhar com confiança, alimentar sua família com saúde
                e criar memórias repletas de sabor. Porque quando escolhemos com consciência, a comida se transforma em
                cuidado. E o cuidado tem o poder de transformar tudo.</p>
        </div>
    </section>

    <section class="section-infos">
        <div class="container">
            <div class="content-infos">
                <div class="texts">
                    <h2>Sua Feira e Mercado Completo, Sem Sair de Casa</h2>
                    <p>Simplifique sua rotina com o Mercado Quitanda! Oferecemos a conveniência de um mercado completo
                        online, economizando seu tempo e facilitando suas escolhas saudáveis.</p>
                    <p>Variedade Incomparável: Explore mais de 3.000 itens cuidadosamente selecionados, incluindo uma
                        vasta gama de produtos orgânicos, agroecológicos e naturais.</p>
                </div>

                <div class="cards-infos">
                    <div class="item">
                        <span>🍃</span>
                        <div>
                            <h3>Frescor da Estação</h3>
                            <p>Além dos essenciais, buscamos constantemente frutas, legumes e verduras frescos da
                                época, muitas vezes trazendo opções que você não encontra nos supermercados
                                tradicionais.</p>
                        </div>
                    </div>
                    <div class="item">
                        <span>🫶🏼</span>
                        <div>
                            <h3>Curadoria Consciente</h3>
                            <p>Nossa equipe dedica-se a encontrar e selecionar apenas o melhor para você, valorizando a
                                história por trás de cada produto, o respeito pela terra e o cuidado em cada etapa.</p>
                        </div>
                    </div>
                    <div class="item">
                        <span>📲</span>
                        <div>
                            <h3>Praticidade</h3>
                            <p>Faça suas compras de onde estiver, a qualquer hora, e receba tudo com cuidado na sua
                                porta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-items">
        <div class="container">
            <h2>Qualidade e Cuidado em Cada Etapa</h2>
            <p class="text">Garantimos a excelência dos nossos produtos e serviços do campo à sua mesa:</p>

            <div class="cards-items">
                <div class="item">
                    <span>👩🏻‍🌾</span>
                    <h3>No campo</h3>
                    <p>Planejamos colheitas e apoiamos pequenos produtores locais, fomentando práticas sustentáveis.</p>
                </div>
                <div class="item">
                    <span>🍓</span>
                    <h3>Na seleção</h3>
                    <p>Escolhemos a dedo os itens mais frescos, bonitos e saborosos para você.</p>
                </div>
                <div class="item">
                    <span>🚛</span>
                    <h3>No transporte</h3>
                    <p>Nossas entregas são feitas com o máximo cuidado para preservar a integridade e o frescor dos
                        alimentos.</p>
                </div>
                <div class="item">
                    <span>👨🏻‍💻</span>
                    <h3>No atendimento</h3>
                    <p>Oferecemos suporte ágil e eficiente para resolver qualquer dúvida ou questão, garantindo sua
                        satisfação.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="categories-list">
        <div class="container">
            <div class="top">
                <h2>Um Mercado Completo e Consciente para Você</h2>
                <p>Explore nossas seções, pensadas com atenção para oferecer o melhor em cada detalhe:</p>
            </div>

            <div class="list">
                <?php foreach ($cat_items as $item): ?>
                    <a href="/categoria-produto/<?= esc_attr($item['link']); ?>" class="item"
                        aria-label="Ver produtos da categoria <?= esc_attr($item['title']); ?>">
                        <div class="icon">
                            <img src="<?= get_template_directory_uri(); ?>/img/icons/<?= esc_attr($item['icon']); ?>"
                                alt="<?= esc_attr($item['title']); ?>">
                        </div>
                        <h3 class="title"><?= esc_html($item['title']); ?></h3>
                        <span class="view-all">ver todos</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section-location">
        <div class="container">
            <div class="top">
                <h2>Localização</h2>
                <p>Rua Almirante Barroso, 535 - sala 02, Criciúma 88802-249</p>
                <a href="https://maps.app.goo.gl/hrDTmouM9w5d9G4o6" target="_blank">Ver no Maps</a>
            </div>

            <div class="maps-location">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.145809758533!2d-49.3697969!3d-28.685284599999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9521827ead5aaaab%3A0x71838a96c9f06d87!2sR.%20Alm.%20Barroso%2C%20535%20-%2002%20-%20Centro%2C%20Crici%C3%BAma%20-%20SC%2C%2088802-249!5e0!3m2!1spt-BR!2sbr!4v1746639537985!5m2!1spt-BR!2sbr"
                    width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>