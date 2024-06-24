<div class="row">
    <h2 class="text-danger mb-5 sec-heading">Latest posts</h2>
    <?php
    // Arguments
    $args = array('post_type' => 'post', 'posts_per_page' => 12);
    // The Query
    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $img_url = get_template_directory_uri() . '/assets/img/no-image.jpg';
            if(get_the_post_thumbnail_url(get_the_ID(),'sport-large')){
                $img_url = get_the_post_thumbnail_url(get_the_ID(),'sport-large');
            }
            ?>
            <div class="col-md-6 mb-3">
                <a class="text-decoration-none text-white" href="<?php echo the_permalink(); ?>">
                    <img src="<?php echo $img_url ; ?>" class="card-img-top" alt="...">
                    <div class="card-body px-0">
                        <h3 class="card-title"><?php the_title(); ?></h3>
                        <p class="card-text text-white latest-desc"><?php the_excerpt(); ?></p>
                        <small class="text-muted">Posted: <?php echo get_the_date('F j, Y') ; ?>  at <?php the_time('g:i a'); ?></small>
                    </div>
                </a>
            </div>
            <?php
        }
    }
    ?>




</div>
