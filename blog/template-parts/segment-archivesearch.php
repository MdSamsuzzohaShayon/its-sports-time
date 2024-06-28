<div class="row">
<?php if(have_posts()): while(have_posts()) : the_post(); ?>
  <a href="<?php the_permalink(); ?>" class="card mb-3 text-decoration-none text-white bg-secondary py-3" >
    <div class="row g-0">
      <div class="col-md-4">
        <?php if(has_post_thumbnail()): ?>
            <!--        sport-large size we have declared in our functions.php-->
            <img src="<?php the_post_thumbnail_url('sport-small'); ?>" alt="" class="img-fluid">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri() . '/assets/img/no-image.jpg'; ?>" alt="" class="img-fluid">
        <?php endif; ?>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title mb-3"><?php the_title(); ?></h3>
          <div class="card-text"><?php the_excerpt(); ?></div>
          <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
        </div>
      </div>
    </div>
</a>
<?php endwhile; else: ?>
    <h2>No posts found!!</h2>
<?php endif; ?>
</div>
