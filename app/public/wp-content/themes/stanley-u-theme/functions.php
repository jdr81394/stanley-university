<?php 


require get_theme_file_path('/includes/search-route.php');

function university_custom_rest() {
    //1st argument is post type you want to customize
    //2nd argument is what you want to name the new field
    //3 an array that describes how you manage the field
    register_rest_field('post', 'author_name', [
        'get_callback' => function() { return get_the_author();}
    ]);
}


//Change the db fields
add_action('rest_api_init', 'university_custom_rest');

function page_banner($args = null) {
    

    if(!$args['title']) {
        $args['title'] = get_the_title();
    }
    
    if(!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if(!$args['photo'] && get_field('page_banner_background_image')) {
        $args['photo'] = get_field('page_banner_background_image')['sizes']['page_banner'];
    } else if (!$args['photo'] && !get_field('page_banner_background_image')) {
        $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }

    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ?>"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
            <div class="page-banner__intro">
                <?php echo $args['subtitle']; ?>
            </div>
        </div>  
    </div>
<?php }

function university_files() {

   

    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);

    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    // if you want to load javascript file change 'style' to 'script';
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());

    wp_localize_script('main-university-js','universityData', [
        'root_url' => get_site_url()
    ]);

}

add_action('wp_enqueue_scripts', 'university_files');


function university_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // Last argument is to crop. Normally set to false
    add_image_size('profile_pic', 200, 200, true);
    add_image_size('professor_landscape', 400, 260, true);
    add_image_size('professor_portrait', 480, 650, true);
    add_image_size('page_banner', 1500, 350, true);

}

add_action('after_setup_theme', 'university_features');




function university_adjust_queries($query) {
    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        $query->set('meta-key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', [
            [
                'key' => 'event_date',
                'compare'=> '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            ]
        ]);
    }
    else if (!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }  
}


add_action('pre_get_posts', 'university_adjust_queries');


// This is all for the google api key
// function universityMapKey($api) {
//    $api['key'] = xxx
// }

// add_filter('acf/fields/google_map/api', 'universityMapKey');



// Redirect subscriber accounts of of admin and onto hompeage

function redirectSubsToFrontend() {
    
    $our_current_user = wp_get_current_user();

    if(count($our_current_user->roles) == 1 && $our_current_user->roles[0] == 'subscriber' ) {
        wp_redirect(site_url('/'));
        exit;
    }
}


add_action('admin_init', 'redirectSubsToFrontend');

function noSubsAdminBar() {
    
    $our_current_user = wp_get_current_user();

    if(count($our_current_user->roles) == 1 && $our_current_user->roles[0] == 'subscriber' ) {
        show_admin_bar(false);
        
    }
}


add_action('wp_loaded', 'noSubsAdminBar');





// customize login screen
function ourHeaderUrl() {
    return esc_url(site_url('/'));
}

// 1st arg is value or object oyu want to customize 
//2nd arg is function
add_filter('login_headerurl', 'ourHeaderUrl');



function ourLoginCss() {
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

}


add_action('login_enqueue_scripts', 'ourLoginCss');

// This changes the login title that exists in wp-login as "Powered by WordPress"
function ourLoginTitle() {
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'ourLoginTitle');

?>