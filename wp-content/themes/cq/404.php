<?php get_header(); ?>

    <section class="error-404-msg">
        <h1>Ups! To nie jest właściwy adres...</h1>
        <p>Lepiej <a href="<?= site_url('/')?>">wracaj</a> i rozwiązuj kolejne quizy :)</p>
    </section>

    <?php get_template_part('login-form') ?>
<?php get_footer(); ?>
