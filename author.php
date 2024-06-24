<?php get_header(); ?>

<?php if (get_theme_mod('author-callout-display') == 'Yes') { ?>
    <div class="row row-padding author">
        <div class="col-6 author-image">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('author-callout-image')) ?>" alt="Author Image">
        </div>
        <div class="col-6 author-content">
            <?php
            $authorText = get_theme_mod('author-callout-text');
            if ($authorText != '') {
                echo wpautop($authorText);
            } else {
                echo "Edit this by going to your Dashboard -> Appearance -> Customise -> Author Editor";
            }
            ?>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>
