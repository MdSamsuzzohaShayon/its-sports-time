<?php get_header(); ?>
<div class="container">
    <h1 class="mt-5">You have searched for the category of "<?php echo single_cat_title(); ?>"</h1>

    <div class="category-cricket mt-5" id="category-cricket">
        <div class="row align-items-md-start">
            <div class="col-md-8 cricket-post">
                <?php get_template_part("template-parts/segment", 'archivecricket'); ?>
            </div>
            <div class="col-md-4 popular-post sticky-md-top">
                <?php dynamic_sidebar('sidebar-popular'); ?>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <?php thesportsanctum_customize_pagination('', ''); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>
