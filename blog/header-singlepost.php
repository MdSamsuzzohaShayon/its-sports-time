<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NVQ6RLB');</script>
    <!-- End Google Tag Manager -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php
        $post_id = get_the_ID();
    $desc = get_the_excerpt($post_id);
     ?>
    <meta name="description" content="<?php echo $desc; ?>">
    <?php
    $tag_list = '';
    $posttags = get_tags();
    $post_tags = get_the_tags($post_id);
    if ($post_tags) {
      foreach($post_tags as $tag) {
        $tag_list .= $tag->name . ',';
      }
    }
    ?>

    <meta name="keywords" content="<?php echo $tag_list; ?>">
    <?php
    global $post;
    $author_id = $post->post_author;
    $fname = get_the_author_meta('first_name', $author_id);
    $lname = get_the_author_meta('last_name', $author_id);
    $author_name = $fname . "-" . $lname;
    ?>
    <meta name="author" content="<?php echo $author_name; ?>">
    <title>
        <?php bloginfo('name'); ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
    </title>
    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body class="<?php body_class(); ?>">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVQ6RLB"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

<!--site wrapper start -->
<div class="site-wrapper">

    <?php get_template_part('template-parts/segment', 'headertopmenu'); ?>

    <?php get_template_part('template-parts/segment', 'headermainmenu'); ?>
