<?php


// Numeric Page Navi
function thesportsanctum_customize_pagination($before = '', $after = '')
{
    global $wpdb, $wp_query;
    $request = $wp_query->request;
    $posts_per_page = intval(get_query_var('posts_per_page')); // 10
    $paged = intval(get_query_var('paged')); // 2
    $numposts = $wp_query->found_posts; // 12
    $max_page = $wp_query->max_num_pages; // 2

    if ($numposts <= $posts_per_page) {
        return;
    }
    if (empty($paged) || $paged == 0) {
        $paged = 1;
    }
    $pages_to_show = 7;
    $pages_to_show_minus_1 = $pages_to_show - 1; // 6
    $half_page_start = floor($pages_to_show_minus_1 / 2); // 3
    $half_page_end = ceil($pages_to_show_minus_1 / 2); // 3
    $start_page = $paged - $half_page_start; // - 1


    /**
     * Find out start and end page
     */
    if ($start_page <= 0) {
        $start_page = 1;
    }
    $end_page = $paged + $half_page_end; // 5
    if (($end_page - $start_page) != $pages_to_show_minus_1) {
        $end_page = $start_page + $pages_to_show_minus_1; // 7
    }

    if ($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1; // -4
        $end_page = $max_page; // 2

    }
    if ($start_page <= 0) {
        $start_page = 1;
    }

    /**
     * @container
     * Display pages
     */
    echo $before . '<ul class="pagination">';

    /**
     * @first
     * Link to display first page
     */
    if ($paged > 1) {
        $first_page_text = "«";
        echo '<li class="prev page-item mx-2"><a class="page-link bg-secondary text-light border-0 rounded-0" href="' . get_pagenum_link() . '" title="First">' . $first_page_text . '</a></li>';
    }

    /**
     * @previous
     * Link to display previous page
     */
    $prevposts = get_previous_posts_link('← Previous');
    if ($prevposts) {
        echo '<li  class="page-item mx-2 page-link bg-secondary text-light border-0">' . $prevposts . '</li>';
    } else {
        echo '<li class="disabled page-item mx-2"><a class="page-link text-light border-0 rounded-0" href="#">← Previous</a></li>';
    }

    /**
     * @numbers
     * Loop thought all numbers of the page
     */
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $paged) {
            echo '<li class="active page-item mx-2"><a class="page-link bg-secondary text-light border-0" href="#">' . $i . '</a></li>';
        } else {
            echo '<li class="page-item mx-2"><a class="page-link bg-secondary text-light border-0" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
        }
    }

    /**
     * @next
     * Link to display next page
     */
    $nextposts = get_next_posts_link("Next ->");
    if ($nextposts) {
        echo '<li class="page-item mx-2 page-link bg-secondary text-light border-0">';
        next_posts_link('Next →');
        echo '</li>';
    }else{
        echo '<li class="disabled page-item mx-2"><a class="page-link text-light border-0 rounded-0" href="#">Next →</a></li>';
    }


    /**
     * @last
     * Link to display last page
     */
    if ($end_page < $max_page) {
        $last_page_text = "»";
        echo '<li class="next page-item mx-2"><a class="page-link bg-secondary text-light border-0" href="' . get_pagenum_link($max_page) . '" title="Last">' . $last_page_text . '</a></li>';
    }


    /**
     * @container
     * Display pages end
     */
    echo '</ul>' . $after;
}


?>
