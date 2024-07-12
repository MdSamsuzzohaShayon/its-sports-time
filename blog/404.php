<?php get_header(); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h1 class="display-3 text-danger">Oops! Page not found.</h1>
            <p class="mb-4">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>

            <!-- Search form -->
            <form role="search" method="get" class="search-form mb-4" action="<?php echo esc_url(home_url('/')); ?>">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field form-control" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" title="Search for:" />
                </label>
                <button type="submit" class="search-submit btn btn-primary">Search</button>
            </form>

            <!-- Recent articles -->
            <div class="recent-articles">
                <h2 class="mb-3">Recent Articles</h2>
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                    );
                    $recent_posts = new WP_Query($args);
                    if ($recent_posts->have_posts()) :
                        while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="card text-bg-secondary">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img class="card-img-top" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><a class="text-decoration-none text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p>No recent articles found.</p>
                    <?php endif; ?>
                </div>
            </div>

            <a href="<?php echo home_url(); ?>" class="btn btn-primary mt-4">Go to Home</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
