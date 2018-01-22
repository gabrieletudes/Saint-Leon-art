<?php
//un s'execute a un evenement de wordpress
add_action('init', 'stla_register_types');
//s execute
add_filter('wp_title', 'custom_wp_title');
register_nav_menu('header', 'la navigation principal du site');
//pour les thumbnails des articles
add_theme_support('post-thumbnails');
//pour les previous et next links
add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_previous');


/*
*    Register custom post-types during initialization
*/

function stla_register_types()
{
    register_post_type('events', [
        'label' => 'Événements',
        'labels' => [
            'singular_name' => 'événement',
            'add_new_item' => 'Ajouter un nouveau événement'
        ],
        'description' => 'Permet d’ajouter des Événements',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-calendar',
        'rewrite' => [
            'pages' => true
        ],
        'supports' => [
            'title', 'editor', 'thumbnail'
        ]
    ]);
    register_post_type('artists', [
        'label' => 'Artistes',
        'labels' => [
            'singular_name' => 'artiste',
            'add_new_item' => 'Ajouter un nouveau artiste'
        ],
        'description' => 'Permet d’ajouter des artistes',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-art',
        'rewrite' => [
            'pages' => true
        ],
        'supports' => [
            'title', 'editor', 'thumbnail'
        ]
    ]);
    register_post_type('practical', [
        'label' => 'Pratique',
        'labels' => [
            'singular_name' => 'pratique',
            'add_new_item' => 'Ajouter un nouveau lieu dans la page pratique'
        ],
        'description' => 'Permet d’ajouter des informations relatives à l’endroit où un ou plusieurs événements ont lieu',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-location-alt',
        'rewrite' => [
            'pages' => true
        ],
        'supports' => [
            'title', 'editor', 'thumbnail'
        ]
    ]);
    register_post_type('partners', [
        'label' => 'Partenaires',
        'labels' => [
            'singular_name' => 'partner',
            'add_new_item' => 'Ajouter un nouveau partenaire'
        ],
        'description' => 'Permet d’ajouter des partenaires',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => [
            'pages' => true
        ],
        'supports' => [
            'title', 'editor', 'thumbnail'
        ]
    ]);

    register_taxonomy('localities', ['practical'], ['label' => '
Localités',
        'labels' => [
            'singular_name' => 'locality',
            'edit_item' => 'Editer la localité',
            'add_new_item' => 'ajouter un nouvelle localité'
        ],
        'description' => 'Permet de preciser la localité d’un Lieu ex. Outremeuse',
        'public' => true,
        'hierarchical' => true]);

    register_taxonomy('types', ['events'], ['label' => 'type d’événement',
        'labels' => [
            'singular_name' => 'Type',
            'edit_item' => 'Editer le type d’événement',
            'add_new_item' => 'Ajoutez un nouveu type d’événement'
        ],
        'description' => 'Permet de preciser le type d’événement ex. Exposition',
        'public' => true,
        'hierarchical' => true]);
    register_taxonomy('skills', ['artists'], ['label' => 'type de talent',
        'labels' => [
            'singular_name' => 'skill',
            'edit_item' => 'Editer le type de talent',
            'add_new_item' => 'Ajoutez un nouveu talent'
        ],
        'description' => 'Permet d’ajouter des talents pour un artiste',
        'public' => true,
        'hierarchical' => true]);
}

/*
* Hooks into Wp_title() content formatting
*@check add_filter();
*/

function custom_wp_title($title)
{
    //actions sur le title
    if (empty($title)) {
        $title = 'Bienvenue!';
    }
    $title .= ' - ' . get_bloginfo('name');
    //remove extra spaces from $title
    return trim($title);
}

/*
* Retrieve the absolute  URI for given asset in this theme
*/
function get_theme_asset($src = '')
{
    return get_template_directory_uri() . '/assets/' . trim($src, '/');
}

function theme_asset($src = '')
{
    echo get_theme_asset($src);
}

/*
* Get navigation links (objects) for given location
*/

function stla_get_nav_items($location)
{
    $id = stla_get_nav_id($location);
    $children = [];
    $nav = [];
    if (!$id) return $nav;
    //recuperer les items du menu $location
    $items = wp_get_nav_menu_items($id);
    // Boucler dedans
    foreach ($items as $object) {
        // creer un objet (stdClass)
        $item = new stdClass();
        // assigner les propriétés url & label a cet objet
        $item->url = $object->url;
        $item->label = $object->title;
        $item->parent = intval($object->menu_item_parent);
        $item->icon = $object->classes[0];
        $item->children = [];

        if ($item->parent) {
            $children[] = $item;
        } else {
            // pousser cet objet dans un tableau
            $nav[$object->ID] = $item;
        }
    }
    foreach ($children as $item) {
        $nav[$item->parent]->children[] = $item;
    }
    //retourne ce tableau
    return $nav;
}


/*
* Get Navigation ID from given Location
*/

function stla_get_nav_id($location)
{
    foreach (get_nav_menu_locations() as $navLocation => $navId) {
        if ($navLocation == $location) return $navId;
    }
    //arreter l'execution
    return false;
}

/*
* Return a custom excerpt for given length
*/

function stla_get_the_excerpt($length = null, $pageID, $acffield)
{
    $excerpt = get_field($acffield, $pageID, false);

    if (is_null($length) || strlen($excerpt) <= $length) return $excerpt;
    $string = '';
    $words = explode(' ', $excerpt);
    foreach ($words as $word) {
        // + 2 is needed in order to include the next space and the &hellip
        if ((strlen($string) + strlen($word) + 2) > $length) break;
        $string .= ' ' . $word;
    }
    return trim($string) . '&hellip;';
}

/*
* Output a custom excerpt for given length
*/

function stla_the_excerpt($length = null,$pageID, $acffield)
{
    echo stla_get_the_excerpt($length,$pageID, $acffield);
}

/*
* Return a list of skills for artist
*/

function stla_get_the_skills($postID='',$glue = '', $prefix = '', $suffix = '', $empty = '')
{
    //recuperer les terms
    $terms = wp_get_post_terms($postID, 'skills', [
        'orderby' => 'name',
        'order' => 'ASC',
        'fields' => 'all']);
    //si on a pas des terms :
    //retourne la valeur d’empty
    if (!$terms) return $empty;
    // Sinon :
    //separer chaque term par $glue
    return implode($glue, array_map(function ($term) use ($prefix, $suffix) {
        // entourer chaque term par prefix et $suffix
        // returner la string générée
        //str_replace pour la
        return str_replace([':type', ':link'], [get_field('type', $term), get_term_link($term)], $prefix) . $term->name . $suffix;
    }, $terms));
}


/*
* Output a list of skills for given artist
*/

function stla_the_skills($postID='',$glue = '', $prefix = '', $suffix = '', $empty = '')
{
    if(empty($postID)){
        $postID = get_the_ID();
    }
    echo stla_get_the_skills($postID,$glue, $prefix, $suffix, $empty);
}

/*
* ACF functions
*/
function nop_the_field($content)
{
    return the_field($content, false, false);
}

/*
* Get the single place taxonomy
*/
function stla_single_taxplace($taxonomy)
{
    $term = get_field($taxonomy);

    if ($term) {
        return $term->name;
    }
    return __('pas de lieu indique', 'stla');

}

/*
* Get the page url
*/
function stla_get_page_url($thepage)
{
    $args = array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $thepage,
        'post_type' => 'page'
    );
    $pages = get_posts($args);

    foreach ($pages as $page) {
        return get_page_link($page->ID);
    }
}

/*
* Get url from given page
*/
function stla_get_page_id($thepage)
{
    $args = array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $thepage,
        'post_type' => 'page'
    );
    $pages = get_posts($args);

    foreach ($pages as $page) {
        return $page->ID;
    }
}

/*
* Create own thumbnails
*/
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    // additional image sizes
    // additional tiny general image size for squared images
    add_image_size('general-tiny', 96, 96, true);
    // aditional small image size for location
    add_image_size('location-small', 352, 144, true);
    // aditional medium image size for location
    add_image_size('location-medium', 462, 300, true);
    // aditional big image size for location
    add_image_size('location-big', 600, 268, true);
    // aditional artist medium image size for artists page
    add_image_size('artist-medium', 320, 320, true);
    // aditional artist profile image size for artist profile
    add_image_size('artist-big', 240, 304, true);
    // aditional small image size for events
    add_image_size('events-small', 304, 168, true);
}
