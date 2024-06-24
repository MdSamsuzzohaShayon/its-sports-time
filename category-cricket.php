<?php get_header(); ?>
<div class="container">
    <h1 class="text-center mt-5"><?php echo $site_title . single_cat_title() . ' - ' . get_bloginfo('name'); ?></h1>

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



    <!--    Pagination-->
    <?php //previous_posts_link(); ?>
    <?php //next_posts_link(); ?>
    <br>




<!--    <nav aria-label="Page navigation example">-->
<!--        <ul class="pagination">-->
<!--            <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
<!--            --><?php
//            global $wp_query;
//            $big = 999999999; // need an unlikely integer
//
//            echo paginate_links( array(
//                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
//                'format' => '?paged=%#%',
//                'current' => max( 1, get_query_var('paged') ),
//                'total' => $wp_query->max_num_pages
//            ) );
//            ?>
<!--        </ul>-->
<!--    </nav>-->





</div>

<?php get_footer(); ?>
