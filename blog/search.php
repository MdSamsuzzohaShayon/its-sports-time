<?php get_header(); ?>
<div class="container">
    <h1 class="my-5">Search results for '<?php echo get_search_query(); ?>'</h1>
    <h2><?php echo single_cat_title(); ?></h2>
    <!-- <?php //get_template_part("template-parts/content", 'archive'); ?> -->
    <?php get_template_part("template-parts/segment", 'archivesearch'); ?>

    <!--    Pagination-->
    <?php //previous_posts_link(); ?>
    <?php //next_posts_link(); ?>
    <br>
    <?php
    global $wp_query;
    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    ) );
    ?>
<!--    <nav aria-label="Page navigation example">-->
<!--        <ul class="pagination">-->
<!--            <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
<!--        </ul>-->
<!--    </nav>-->

<!--    <div class="row justify-content-center mt-3">-->
<!--        --><?php //itssportstime_customize_pagination(); ?>
<!--    </div>-->

</div>

<?php get_footer(); ?>
