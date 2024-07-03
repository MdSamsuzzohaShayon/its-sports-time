<div class="row">
    <?php if(have_posts()): while(have_posts()) : the_post(); ?>
        <div class="col-md-6 col-sm-12 mb-4">
            <a href="<?php the_permalink(); ?>" class="card text-bg-secondary h-100 text-decoration-none text-white">
                <?php if(has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('sport-small'); ?>" alt="Post Image" class="card-img-top img-thumbnail football-card-img">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/no-image.jpg'; ?>" alt="Default Image" class="card-img-top football-card-img">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?php the_title(); ?></h5>
                    <p class="card-text"><?php the_excerpt(); ?></p>
                </div>
            </a>
        </div>
    <?php endwhile; else: ?>
        <div class="col-12">
            <p class="text-center">No posts found!</p>
        </div>
    <?php endif; ?>
</div>
