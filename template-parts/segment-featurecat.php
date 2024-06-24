<!--        custom post category feature start-->
<div class="row cat-features">
    <?php
    if(has_nav_menu('feature_menu')){
      wp_nav_menu(array(
         'theme_location' => 'feature_menu',
         'container' => '',
         'menu_class' => 'd-flex justify-content-around align-items-center flex-wrap flex-lg-nowrap',
         'walker' => new Thesportsanctum_Feature_Menu_Walker()
     ));
    }
    ?>
</div>
<!--        custom post category feature end-->
