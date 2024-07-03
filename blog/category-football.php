<?php get_header(); ?>
<div class="container">
    <h1 class="text-center mt-5"><?php echo get_bloginfo('name') . ' - ' . single_cat_title('', false); ?></h1>

    <div class="category-football mt-5" id="category-football">
        <div class="row align-items-md-start">
            <div class="col-md-8 football-post">
                <?php get_template_part("template-parts/segment", 'archivefootball'); ?>
            </div>
            <div class="col-md-4 popular-post sticky-md-top">
                <?php dynamic_sidebar('sidebar-popular'); ?>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <?php itssportstime_customize_pagination(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
