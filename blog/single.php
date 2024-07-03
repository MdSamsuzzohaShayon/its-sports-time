<?php get_header('singlepost'); ?>

<!-- Check if post exist -->
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="container text-white single-page-container">

        <!-- Single page title and author display start -->
        <section class="row my-5 title-date-more">
            <div class="col-md-2 col-12"></div>

            <div class="col-md-8 text-center col-12">
                <p><?php echo get_the_date('d/m/Y'); // Use php date format ?></p>
                <h1 class="text-capitalize"><?php the_title(); ?></h1>
                <?php
                $fname = get_the_author_meta('first_name');
                $lname = get_the_author_meta('last_name');
                echo "<p>Author: " . $fname . " " . $lname . "</p>";
                ?>
                <?php
                $categories = get_the_category();
                foreach ($categories as $cat):
                    $cat_link = get_category_link($cat->term_id);
                    ?>
                    <a href="<?php echo $cat_link; ?>" class="badge bg-secondary py-2 px-3 rounded-0 my-1 text-decoration-none text-light"><?php echo $cat->name; ?></a>
                <?php endforeach; ?>
            </div>

            <div class="col-md-2 col-12"></div>
        </section>
        <!-- Single page title and author display end -->

        <!-- Post thumbnail start -->
        <section class="p-0 m-0 post-thumbnail-image d-flex justify-content-center">
            <?php if (has_post_thumbnail()): ?>
                <img src="<?php the_post_thumbnail_url('sport-large'); ?>" class="single-post-img img-fluid mb-5" alt="">
            <?php endif; ?>
        </section>
        <!-- Post thumbnail end -->

        <!-- Post content start -->
        <section class="single-post-content"><?php the_content(); ?></section>
        <!-- Post content end -->

        <!-- Display tags start -->
        <section class="p-0 m-0 display-tags">
            <?php
            $cat_list = '';
            $categories = get_the_category();
            foreach ($categories as $cat) {
                $cat_list .= $cat->slug . ',';
            }
            ?>
            <h2 class="text-uppercase border-bottom border-secondary mt-5 mb-4 text-error">Tags</h2>
            <div class="all-tags d-flex justify-content-between flex-wrap">
                <?php
                $post_id = get_the_ID();
                $post_tags = get_the_tags($post_id);
                if ($post_tags) {
                    foreach ($post_tags as $tag):
                        $tag_link = get_tag_link($tag->term_id);
                        ?>
                        <a href="<?php echo $tag_link; ?>"
                           class="badge bg-secondary py-2 px-3 rounded-0 my-1 text-decoration-none text-light"><?php echo $tag->name; ?></a>
                    <?php endforeach;
                } else {
                    echo "<p>No tags found.</p>";
                }
                ?>
            </div>
        </section>
        <!-- Display tags end -->

        <!-- Display related post start -->
        <section class="single-related-post">
            <h2 class="text-uppercase border-bottom border-secondary mt-5 mb-4 text-error">Related Posts</h2>
            <div class="d-flex flex-wrap justify-content-between align-items-center flex-column flex-md-row">
                <?php
                // Related post start
                $args = array(
                    'category_name' => $cat_list,
                    'posts_per_page' => 8
                );

                // The Query
                $the_query = new WP_Query($args);

                // The Loop
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?>
                        <div class="single-related-post-item bg-secondary mb-3 rounded">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-white">
                                <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
                                <h3 class="mx-1 my-3"><?php the_title(); ?></h3>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    echo "<h3>No posts found!</h3>";
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>
        </section>
        <!-- Display related post end -->

        <!-- Comments section start -->
        <section class="single-post-comment mt-5">
            <?php comments_template(); ?>
        </section>
        <!-- Comments section end -->

    </div>

<?php endwhile; else: ?>
    <div class="container text-white single-page-container">
        <h2 class="text-center my-5">No posts found</h2>
    </div>
<?php endif; ?>

<?php
/**
 * @views count
 * Save views from this single post page to show the same post in popular post
 */
itssportstime_save_post_views(get_the_ID());
?>

<?php get_footer(); ?>
