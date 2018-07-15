<?php get_header(); ?>

    <section class="error-404-msg">
        <h1>Oops! It seems to be a wrong place...</h1>
        <p>Better <a href="<?= site_url('/')?>">come back</a> and enjoy more crazy quizzes :)</p>
    </section>

    <?php get_template_part('login-form') ?>
<?php get_footer(); ?>
