<div class="col-md-4 mb-4">
    <div class="card text-bg-secondary h-100">
        <?php if (has_post_thumbnail()): ?>
            <img src="<?php the_post_thumbnail_url('sport-small'); ?>" class="card-img-top img-thumbnail" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
        <div class="card-body">
            <h3 class="card-title"><?php the_title(); ?></h3>
            <p class="card-text"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
        </div>
    </div>
</div>
