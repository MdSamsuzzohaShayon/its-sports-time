<?php get_header(); ?>
<div class="container">
    <h2 class="text-success">page-today.php</h2>
    <?php the_title(); ?>
    <?php if(have_posts()): while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; else: endif; ?>
</div>


<?php get_footer(); ?>
