<div class="features mt-5" id="features">
    <h2 class="text-danger text-center mb-5 sec-heading text-uppercase ">Featured Posts</h2>

    <?php
    // Arguments for WP_Query
    //    $args = array('category_name' => 'featured', 'posts_per_page' => 13);
    $args = array(
        'post_type' => array('post', 'stories', 'tournaments', 'transfers'), // Include custom post types
        'category_name' => 'featured',
        'posts_per_page' => 13
    );
    // The Query
    $the_query = new WP_Query($args);

    // Index to keep track of post positions
    $index = 0;


    // The Loop
    if ($the_query->have_posts()) {
        // Start Bootstrap row for posts
        echo '<div class="row">';

        // Loop through the posts
        while ($the_query->have_posts()) {
            $the_query->the_post();

            // Get post thumbnail or fallback image
            $img_url = has_post_thumbnail() ? wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full')[0] : get_theme_file_uri('assets/img/no-image.jpg');
            $post_date = get_the_modified_date('F j, Y');
            $post_time = get_the_modified_date('g:i a');
            $excerpt = get_the_excerpt();
            $title = get_the_title();
            $permalink = get_permalink();

            // Start HTML for each post
            if ($index == 0) {
                // First post with larger thumbnail and text below image
                echo '
                    <div class="col-md-4 mb-4">
                        <a class="card bg-dark text-white text-decoration-none" href="' . $permalink . '">
                            <img src="' . $img_url . '" class="card-img-top object-fit-cover" id="featured-single-img" alt="feature-focused-image">
                            <div class="card-body px-0 py-4">
                                <h3 class="card-title">' . $title . '</h3>
                                <p class="card-text d-none d-md-block">' . $excerpt . '</p>
                                <p class="card-text"><small class="text-white">Posted: ' . $post_date . ' at ' . $post_time . '</small></p>
                                <a href="' . $permalink . '" class="btn btn-primary d-none d-md-block " style="width: fit-content">Read More</a>
                            </div>
                        </a>
                    </div>';
            } else {
                // Remaining posts in two columns
                if ($index == 1) echo '<div class="col-md-4">'; // Start second column

                echo '
                    <div class="card bg-dark mb-4 text-white">
                        <a class="row no-gutters text-decoration-none text-white" href="' . $permalink . '" >
                            <div class="col-md-4">
                                <img src="' . $img_url . '" class="feature-imgs object-fit-cover" alt="feature-post-image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body px-0">
                                    <h5 class="card-title">' . $title . '</h5>
                                    <p class="card-text"><small class="text-white">Posted: ' . $post_date . ' at ' . $post_time . '</small></p>
                                </div>
                            </div>
                        </a>
                        
                    </div>';

                if ($index == 6) echo '</div><div class="col-md-4">'; // Start third column

                if ($index == 12) echo '</div>'; // Close last column
            }

            $index++;
        }

        // End Bootstrap row
        echo '</div>';
    } else {
        // No posts found
        echo "<div class='alert alert-danger'>No Post found</div>";
    }

    // Restore original Post Data
    wp_reset_postdata();
    ?>
</div>
