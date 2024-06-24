# WordPress Theme Development for My Blog

### Planning
 - Create a WordPress blog
 - Make website 100 percent responsive
 - should have a bot for messaging
 - Pursue forum to get post idea __https://blog.feedspot.com/sports_betting_forums/__ __https://www.indiancricketfans.com/forum/6-cricket-talk/__

### Theme development reference
 - [WordPress Nav Menu](https://www.youtube.com/watch?v=TmmLRv9yY0M)
 - [Custom walker class](https://developer.wordpress.org/reference/classes/walker_nav_menu/) ([tutorial](https://www.youtube.com/watch?v=tsB6frHTUhs))
 - [Custom logo](https://developer.wordpress.org/themes/functionality/custom-logo/)
 - [Custom Header Image](https://developer.wordpress.org/themes/functionality/custom-headers/#flexible-header-image)
 - [Customizer API for add option in customize](https://codex.wordpress.org/Theme_Customization_API) ([tutorial](https://www.youtube.com/watch?v=hZnWOxgX7A4&t=4s)), [Customizer object](https://developer.wordpress.org/themes/customize-api/customizer-objects/), [Customize register hook](https://developer.wordpress.org/reference/hooks/customize_register/#:~:text=The%20'customize_register'%20action%20hook%20is,instance%20of%20the%20WP_Customize_Manager%20class.)
 - [Loads a template part into a template.](https://developer.wordpress.org/reference/functions/get_template_part/)
 - [Page template](https://developer.wordpress.org/themes/template-files-section/page-template-files/)
 - [The Loop](https://developer.wordpress.org/themes/basics/the-loop/), [Using the Loop](https://codex.wordpress.org/The_Loop)
 - [Pagination](https://developer.wordpress.org/themes/functionality/pagination/)
 - [Registering custom post type](https://developer.wordpress.org/plugins/post-types/registering-custom-post-types/), [custom post type template file](https://developer.wordpress.org/themes/template-files-section/custom-post-type-template-files/), [referance](https://developer.wordpress.org/reference/functions/register_post_type/)
 - [Widgets API](https://codex.wordpress.org/Widgets_API), [Widgets](https://developer.wordpress.org/themes/functionality/widgets/)
 - [Popular post](https://www.youtube.com/watch?v=HI-VENwbUgs)
 - [Updates a post meta field based on the given post ID.](https://developer.wordpress.org/reference/functions/update_post_meta/) save something custom in post database
 - [find out what type of request WordPress is currently dealing with](https://developer.wordpress.org/reference/classes/wp_query/)
 - [Display search form.](https://developer.wordpress.org/reference/functions/get_search_form/), [Create search page](https://codex.wordpress.org/Creating_a_Search_Page)
 - [Filters text content and strips out disallowed HTML.](https://developer.wordpress.org/reference/functions/wp_kses/),
 - [Retrieves the URL to the admin area for the current site.](https://developer.wordpress.org/reference/functions/admin_url/), [Tutorial](https://www.youtube.com/watch?v=LYvx_L9ESn0),
 - [Fires authenticated Ajax actions for logged-in users.](https://developer.wordpress.org/reference/hooks/wp_ajax_action/), [Fires non-authenticated Ajax actions for logged-out users.](https://developer.wordpress.org/reference/hooks/wp_ajax_nopriv_action/), [Email in WordPress using the Gmail SMTP Server](https://www.youtube.com/watch?v=bT6o5dKAQcE), [ SMTP Override for Email Sending](https://www.youtube.com/watch?v=jRQ3Tvk1Zd8&t=312s), ["Nonces" - Security for your AJAX Form](https://www.youtube.com/watch?v=Cw8xpWlGh1s&list=PLgFB6lmeXFOpHnNmQ4fdIYA5X_9XhjJ9d&index=13)
 - [Comments template](https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/comment-template/), [Comment form customize](https://developer.wordpress.org/reference/functions/comment_form/), [Displays a list of comments](https://developer.wordpress.org/reference/functions/wp_list_comments/), [Core walker class used to create an HTML list of comments.](https://developer.wordpress.org/reference/classes/walker_comment/)


 - Single post
 - Comments section
 - Add newsletter
 - About Page

### Change for production
 - Search form action need to change

### Google tag manager install
 - Copy the code below and paste it onto every page of your website. Paste this code as high in the <head> of the page as possible:
 ```
 <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NVQ6RLB');</script>
  <!-- End Google Tag Manager -->
 ```
 - Additionally, paste this code immediately after the opening <body> tag:
 ```
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVQ6RLB"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
 ```



### Errors
 - [Never leave any whitespace at the top of the file](https://www.hostinger.com/tutorials/cannot-modify-header-information#:~:text=If%20the%20%E2%80%9CCannot%20modify%20header,version%20and%20reboot%20the%20website.)
 - Custom category as menu not working
 - Sidebar (Popular widget is not made) showing Search, Recent Posts, Recent Comments
