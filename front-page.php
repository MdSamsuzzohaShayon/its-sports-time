<?php get_header('home'); ?>
<!-- <div class="main-header-body-wrapper" style="background-image: url(<?php //echo get_theme_mod("thesportsanctum_banner"); ?>);"> -->
<!-- MAIN SECTION START  -->
<div class="main-body background-transparent">

    <?php get_template_part('template-parts/segment', 'homecaption'); ?>

</div>
<!-- MAIN SECTION ENDS  -->
</div>
<!--    End landing-->

<!-- Feature start  -->
<div class="feature-post-segment" id="feature-post">
    <div class="feature-post-shape container">
        <!--                category of posts start -->
        <?php get_template_part('template-parts/segment', 'featurecat'); ?>
        <!--                category of posts end -->
        <!--                all feature post start -->
        <?php get_template_part('template-parts/segment', 'feature'); ?>
        <!--                all feature post end -->
    </div>
</div>
<!-- Feature ends  -->



<!--        latest and popular start -->
<div class="container latest-popular" id="latest-popular">
    <div class="row align-items-md-start">
        <div class="col-md-8 latest-post">
            <?php get_template_part('template-parts/segment', 'latest'); ?>
        </div>
        <div class="col-md-4 popular-post sticky-md-top">
            <?php dynamic_sidebar('sidebar-popular'); ?>
        </div>
    </div>
</div>
<!--        latest and popular end -->




<?php get_footer(); ?>
