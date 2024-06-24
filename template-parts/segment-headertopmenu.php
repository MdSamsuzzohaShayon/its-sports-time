<header class="d-none d-md-block">
    <div class="top-menu bg-secondary">
        <!--top navbar start -->
        <div class="container">
            <nav class="d-flex justify-content-between align-items-center m-0">
                <div class="menu-item menu-1 mt-1">
                  <?php
                  if(has_nav_menu('top_menu')){
                    wp_nav_menu(array(
                        'theme_location' => "top_menu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                        'menu_class' => "p-0 d-flex justify-content-start align-items-center m-0", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                        'container' => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                        'walker' => new Thesportsanctum_Top_Menu_Walker(), // (object) Instance of a custom walker class.
                    ));
                  }else{
                    echo '<div class="p-0 d-flex justify-content-start align-items-center m-0"></div>';
                  }
                  ?>
                </div>




                <div class="menu-item menu-2 mt-1">
                  <?php
                  if(has_nav_menu('social_menu')){
                    wp_nav_menu(array(
                        'theme_location' => "social_menu",
                        'menu_class' => "p-0 d-flex justify-content-center align-items-center m-0",
                        'container' => "",
                        'walker' => new Thesportsanctum_Social_Menu_Walker(),
                    ));
                  }else{
                    echo '<div class="p-0 d-flex justify-content-center align-items-center m-0"></div>';
                  }
                  ?>
                </div>

                <div class="menu-item menu-3 mt-1 d-flex justify-content-end align-items-center">
                  <p class="navbar-text text-danger under-development py-0 my-0">Login / Register </p>
                </div>
            </nav>
        </div>
        <!--top navbar end -->
    </div>
</header>
