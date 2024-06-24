<div class="row features mt-5" id="features">
    <h2 class="text-danger text-center mb-5 sec-heading">Featured Posts</h2>
    <!--            Make a category of feature and add them -->
    <?php
    // Arguments
    $args = array('category_name' => 'featured', 'posts_per_page' => 13);
    // The Query
    $the_query = new WP_Query($args);

    $index = 0;

    // The Loop
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
//                    $img_url= the_post_thumbnail_url('sport-large');
            $img_url = get_theme_file_uri('assets/img/no-image.jpg');
            if (has_post_thumbnail()) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full')[0];
            }
//                        $post_date = the_time('g:i a') ;
            $post_date = get_the_modified_date('F j, Y');
            $post_time = get_the_modified_date('g:i a');


            $desc = '';
            if($index == 0){
                $desc = '<p class="text-white desc">' . get_the_excerpt() . '</p>';
            }else{
                $desc = '';
            }





            echo '
                    <div class="col-sm-12">
                        <a class="stretched-link row mb-3 f-item" href="' . get_permalink() . '">
                            <div class="col-md-4 m-0 txt-img p-0">
                                <img src="' . $img_url . '"     alt="...">
                            </div>
                            <div class="col-md-8 p-0 txt-img d-flex justify-content-between flex-column">
                                <h3 class="mx-2 text-white feature-item-heading" >' . get_the_title() . '</h3>
                                '. $desc .'
                                <p class="p-0 mb-0 mx-2" ><small class="text-muted">Posted: ' . $post_date . ' at ' . $post_time . '</small></p>
                            </div>
                        </a>
                    </div>
                ';
            $index++;

        }
    } else {
        // no posts found
        echo "<div class='alert alert-danger'>No Post found</div>";
    }

    /* Restore original Post Data */
    wp_reset_postdata();
    ?>


</div>
