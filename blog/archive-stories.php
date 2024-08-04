<?php get_header(); ?>
<div class="container my-5">
    <h1 class="mb-4 text-center text-uppercase">Football Stories</h1>

    <?php
    // Custom query to fetch 'tournament' posts
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'Stories',
        'posts_per_page' => 10,
        'paged' => $paged
    );
    $tournament_query = new WP_Query($args);

    if ($tournament_query->have_posts()) :
        echo '<div class="row">';
        while ($tournament_query->have_posts()) : $tournament_query->the_post();
            get_template_part('template-parts/content-archive', get_post_format());
        endwhile;
        echo '</div>';
        ?>

        <!-- Bootstrap pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php
                $total_pages = $tournament_query->max_num_pages;
                $current_page = max(1, get_query_var('paged'));

                if ($current_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($current_page - 1) . '">Previous</a></li>';
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    $active_class = ($i == $current_page) ? ' active' : '';
                    echo '<li class="page-item' . $active_class . '"><a class="page-link" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                }

                if ($current_page < $total_pages) {
                    echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($current_page + 1) . '">Next</a></li>';
                }
                ?>
            </ul>
        </nav>

    <?php
    else :
        echo '<p class="text-center">No tournaments found.</p>';
    endif;

    wp_reset_postdata();
    ?>
</div>
<?php get_footer(); ?>
