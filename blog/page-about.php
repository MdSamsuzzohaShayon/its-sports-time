<?php get_header(); ?>

<div class="container">
    <h1 class="my-5 text-center">About Its Sports Time</h1>

    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <p >Welcome to Its Sports Time - your ultimate destination for live football scores, comprehensive statistics, insightful blogs, and vibrant community forums. Whether you are a passionate fan or a casual follower, our mission is to keep you connected with the beautiful game through real-time updates, in-depth analysis, and engaging content.</p>
        </div>
    </div>

    <?php if (get_theme_mod('author-callout-display') == 'Yes') { ?>
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="mb-4">About the Author</h2>
                <img src="<?php echo wp_get_attachment_url(get_theme_mod('author-callout-image')) ?>" class="img-fluid rounded-circle mb-4" alt="Author Image">
                <div class="author-content">
                    <?php
                    $authorText = get_theme_mod('author-callout-text');
                    if ($authorText != '') {
                        echo wpautop($authorText);
                    } else {
                        echo "<p>Edit this by going to your Dashboard -> Appearance -> Customise -> Author Editor</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <h2 class="mb-4 text-center">What We Offer</h2>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <h5>Live Scores</h5>
                    <p>Stay up-to-date with live scores from your favorite leagues and tournaments around the world.</p>
                </li>
                <li class="mb-3">
                    <h5>Statistics</h5>
                    <p>Get detailed stats on teams, players, and matches to satisfy your analytical mind.</p>
                </li>
                <li class="mb-3">
                    <h5>Blogs</h5>
                    <p>Read insightful articles and opinions from football experts and enthusiasts.</p>
                </li>
                <li class="mb-3">
                    <h5>Forum</h5>
                    <p>Join our community forum to discuss matches, share opinions, and connect with other fans.</p>
                </li>
            </ul>
        </div>
    </div>

</div>

<?php get_footer(); ?>
