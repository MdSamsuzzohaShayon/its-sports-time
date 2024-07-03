<form id="contact-form" data-endpoint="<?php echo admin_url('admin-ajax.php'); ?>">
    <div class="input-group mb-3 border-1 border-light">
                    <span class="input-group-text bg-secondary text-light border-0" id="name"><i
                                class="bi bi-file-person"></i></span>
        <input type="text" name="name" class="form-control bg-secondary border-0 text-light" placeholder="Name"
               aria-label="Name" aria-describedby="name" required>
    </div>
    <div class="input-group mb-3 border-1 border-light">
                    <span class="input-group-text bg-secondary text-light border-0" id="email"><i
                                class="bi bi-envelope"></i></span>
        <input type="email" name="email" class="form-control bg-secondary border-0 text-light" placeholder="Email"
               aria-label="Email" aria-describedby="email" required>
    </div>
    <div class="input-group mb-3 border-1 border-light">
                    <textarea name="message" class="form-control bg-secondary border-0 text-light" placeholder="Leave a message here"
                              id="floatingTextarea" required></textarea>
    </div>
    <button class="btn btn-danger px-5 rounded-0" type="submit">Send</button>
</form>