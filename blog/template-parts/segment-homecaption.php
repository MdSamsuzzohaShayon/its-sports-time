<div class="container caption-main d-flex justify-content-center align-items-center flex-column">
    <div class="col-md-6 col-sm-12 text-white text-center">
        <h1 class="text-uppercase text-shadow">
            <?php
            $caption_title = get_theme_mod('itssportstime_caption_title_setting', 'Its Sports Time');
            echo esc_html($caption_title);
            ?>
        </h1>
        <p>
            <?php
            $caption_description = get_theme_mod('itssportstime_caption_description_setting', 'Discover comprehensive football statistics, live match highlights, and expert commentary on Its Sports Time. Your go-to source for all things football.');
            echo esc_html($caption_description);
            ?>
        </p>
    </div>

    <div class="feature-category col-md-6 col-sm-12">
        <!-- category of posts start -->
        <?php get_template_part('template-parts/segment', 'featurecat'); ?>
        <!-- category of posts end -->
    </div>
</div>
