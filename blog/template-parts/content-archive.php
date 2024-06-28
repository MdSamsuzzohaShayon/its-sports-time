<?php if(have_posts()): while(have_posts()) : the_post(); ?>
    <?php if(has_post_thumbnail()): ?>
        <!--        sport-large size we have declared in our functions.php-->
        <img src="<?php the_post_thumbnail_url('sport-small'); ?>" alt="" class="img-thumbnail">
    <?php endif; ?>
    <h3><?php the_title(); ?></h3>
<!--    --><?php //the_content(); ?>
    <p><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class="btn text-danger bg-secondary">Read more</a>
<?php endwhile; else: ?>
    <h2>No posts found!!</h2>
<?php endif; ?>