<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="container my-5">
    <h1 class="text-center my-5">Contact Us - <?php echo get_bloginfo('name'); ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">We'd love to hear from you</h5>
                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        <input type="hidden" name="action" value="contact_form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="container-fluid input-group-text bg-dark text-light px-3" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="container-fluid input-group-text bg-dark text-light px-3" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="container-fluid input-group-text bg-dark text-light px-3" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <span><i class="bi bi-send"></i> Send</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
