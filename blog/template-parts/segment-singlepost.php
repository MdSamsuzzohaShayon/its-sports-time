<?php if(have_posts()): while(have_posts()) : the_post(); ?>
    <?php echo get_the_date('d/m/Y'); // Use php date format ?>
    <p><?php the_content(); ?></p>
    <?php
        $fname = get_the_author_meta('first_name');
        $lname = get_the_author_meta('last_name');
    ?>
    <p> <?php echo $fname . " " . $lname; ?> </p>

<p>Tags</p>
    <?php
    $tags = get_tags();
    foreach ($tags as $tag): ?>
        <?php $tag_link = get_tag_link( $tag->term_id ); ?>
        <a href="<?php $tag_link; ?>" class="badge bg-secondary"><?php echo $tag->name; ?></a>
    <?php endforeach; ?>
    <br>
<p>Category</p>
    <?php
    $categories = get_the_category();
    foreach ($categories as $cat): ?>
        <?php $cat_link = get_category_link( $cat->term_id ); ?>
        <a href="<?php $cat_link; ?>" class="badge bg-secondary"><?php echo $cat->name; ?></a>
    <?php endforeach; ?>

<!--Comments section -->
<?php comments_template(); ?>
<?php endwhile; else: endif; ?>