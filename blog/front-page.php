<?php get_header('home'); ?>


    <!-- MAIN SECTION START  -->
    <section class="main-body background-transparent">
        <?php get_template_part('template-parts/segment', 'homecaption'); ?>
    </section>
    <!-- MAIN SECTION ENDS  -->



</div>
<!--    End landing-->


    <!--Break section -->
    <br>
    <br>


    <!-- Feature start  -->
    <section class="feature-post-segment" id="feature-post">
        <div class="feature-post-shape container">
    <!-- all feature post start -->
            <?php  get_template_part('template-parts/segment', 'feature'); ?>
    <!-- all feature post end -->
        </div>
    </section>
    <!-- Feature ends  -->

    <!--Break section -->
    <br>
    <br>

    <!--        latest and popular start -->
    <section class="container latest-popular" id="latest-popular">
        <div class="row align-items-md-start">
            <div class="col-md-8 latest-post">
                <?php get_template_part('template-parts/segment', 'latest'); ?>
            </div>
            <div class="col-md-4 popular-post sticky-md-top">
                <?php dynamic_sidebar('sidebar-popular'); ?>
            </div>
        </div>
    </section>
    <!--        latest and popular end -->




<?php get_footer(); ?>
