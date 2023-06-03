<?php

$page_slug = 'contact-us-button-options';
$option_group = 'contact-us-button-settings';

add_action( 'admin_menu', 'add', 25 );
add_filter( 'option_page_capability_'.$page_slug, 'my_page_capability' );


function add(){
    global $page_slug;
    add_menu_page('Contact Us Button', 'Contact Us Button', 'manage_options', $page_slug, 'display', 'dashicons-phone', 4 );
}

function display( $args ){
    if (isset($_POST['submit'])){

        $mainButtonSettings = array(
            'contact_us_button_options_main_button_color' => trim($_POST['contact_us_button_options_main_button_color']),
            'contact_us_button_options_main_button_logo' => stripslashes(trim($_POST['contact_us_button_options_main_button_logo'])),
        );

        $buttonsSettings = [];

        for ($i = 0; $i < floor(((count($_POST) - count($mainButtonSettings)+1) / 4)); $i++){
            $i == 0 ? $x = '' : $x = $i;
            $array = array(
                'contact_us_button_options_name' => translit(trim($_POST['contact_us_button_options_name_'.$x])),
                'contact_us_button_options_a' => base64_decode(trim($_POST['contact_us_button_options_a_'.$x])),
                'contact_us_button_options_color' => trim($_POST['contact_us_button_options_color_'.$x]),
                'contact_us_button_options_logo' => stripslashes(trim($_POST['contact_us_button_options_logo_'.$x])),
            );
            array_push($buttonsSettings, $array);
        }

        update_option('buttonsSettings', $buttonsSettings);
        update_option('mainButtonSettings', $mainButtonSettings);
    }

    settings_fields("opt_group");     
    require plugin_dir_path(__FILE__) . '/view-admin.php';
}


function my_page_capability( $capability ) {
    return 'edit_others_posts';
}

function translit($st){
    $st = mb_strtolower($st, "utf-8");
    $st = str_replace([
        '?', '!', '.', ',', ':', ';', '*', '(', ')', '{', '}', '[', ']', '%', '#', '№', '@', '$', '^', '-', '+', '/', '\\', '=', '|', '"', '\'',
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'з', 'и', 'й', 'к',
        'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х',
        'ъ', 'ы', 'э', ' ', 'ж', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я'
    ], [
        '_', '_', '.', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_',
        'a', 'b', 'v', 'g', 'd', 'e', 'e', 'z', 'i', 'y', 'k',
        'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h',
        'j', 'i', 'e', '_', 'zh', 'ts', 'ch', 'sh', 'shch',
        '', 'yu', 'ya'
    ], $st);
    $st = preg_replace("/[^a-z0-9_.]/", "", $st);
    $st = trim($st, '_');

    $prev_st = '';
    do {
        $prev_st = $st;
        $st = preg_replace("/_[a-z0-9]_/", "_", $st);
    } while ($st != $prev_st);

    $st = preg_replace("/_{2,}/", "_", $st);
    return $st;
}







