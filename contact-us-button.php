<?php
/**
 * Plugin Name: Contact Us Button
 * Description: Добавляет на сайт кнопку "Всё в одном", при клике на который выводятся кнопки мессенджеров и социальных сетей.
 * Version:     1.0.0
 * Author:      Edgar Podosyan
 * Author URI:  https://github.com/edgar010797
 * Text Domain: contact-us-button
 */


function contact_us_button_styles()
{
    $buttonsSettings    = get_option('cub_buttonsSettings');
    $mainButtonSettings = get_option('cub_mainButtonSettings');
    list($r, $g, $b) = $mainButtonSettings['contact_us_button_options_main_button_color'] ? sscanf(
        $mainButtonSettings['contact_us_button_options_main_button_color'],
        "#%02x%02x%02x"
    ) : "";
    $color = ! empty($r . $g . $b) ? "$r, $g, $b" : "77, 193, 71";
    ?>
    <style>
        .seo-all-in-one-but {
            -webkit-animation: seohoverWave linear 1s infinite;
            animation: seohoverWave linear 1s infinite;
        }

        @-webkit-keyframes seohoverWave {
            0% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 0 rgba(<?php echo $color ?>, 0.2), 0 0 0 0 rgba(<?php echo $color ?>, 0.2)
            }
            40% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 15px rgba(<?php echo $color ?>, 0.2), 0 0 0 0 rgba(<?php echo $color ?>, 0.2)
            }
            80% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 30px rgba(<?php echo $color ?>, 0), 0 0 0 26.7px rgba(<?php echo $color ?>, 0.067)
            }
            100% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 30px rgba(<?php echo $color ?>, 0), 0 0 0 40px rgba(<?php echo $color ?>, 0.0)
            }
        }

        @keyframes seohoverWave {
            0% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 0 rgba(<?php echo $color ?>, 0.2), 0 0 0 0 rgba(<?php echo $color ?>, 0.2)
            }
            40% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 15px rgba(<?php echo $color ?>, 0.2), 0 0 0 0 rgba(<?php echo $color ?>, 0.2)
            }
            80% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 30px rgba(<?php echo $color ?>, 0), 0 0 0 26.7px rgba(<?php echo $color ?>, 0.067)
            }
            100% {
                box-shadow: 0 8px 10px rgba(<?php echo $color ?>, 0.3), 0 0 0 30px rgba(<?php echo $color ?>, 0), 0 0 0 40px rgba(<?php echo $color ?>, 0.0)
            }
        }

        <?php foreach($buttonsSettings as $button):?>
        .cubp-social-button.<?php echo $button['contact_us_button_options_name'] ?>:before {
            background-color: <?php echo $button['contact_us_button_options_color']?>;
        }

        .cubp-social-button.<?php echo $button['contact_us_button_options_name'] ?> i {
            color: <?php echo $button['contact_us_button_options_color']?>;
        }

        <?php endforeach;?>
    </style>
    <?php
}

add_action('wp_head', 'contact_us_button_styles');


function contact_us_button_enqueue_scripts()
{
    $settings = get_option('cub_settings');
    if ( ! $settings) {
        wp_enqueue_style(
            'contact-us-button_font_awesome',
            plugins_url('assets/font-awesome-6.1.1/css/all.min.css', __FILE__)
        );
    }

    wp_enqueue_style('contact-us-button_styles', plugins_url('assets/css/contact-us-button-styles.css', __FILE__));
    wp_enqueue_script(
        'contact-us-button_scripts',
        plugins_url('assets/js/contact-us-button-scripts.js', __FILE__),
        array('jquery'),
        '',
        true
    );
}

add_action('wp_enqueue_scripts', 'contact_us_button_enqueue_scripts', 1);


require_once plugin_dir_path(__FILE__) . '/contact-us-options-fields.php';


function contact_us_button_view()
{
    if ($buttonsSettings = get_option('cub_buttonsSettings')):
        $mainButtonSettings = get_option('cub_mainButtonSettings');
        ?>
        <div class="cubp-social-buttons">
            <?php
            foreach ($buttonsSettings as $button) {
                echo "<a class='cubp-social-button " . $button['contact_us_button_options_name'] . "' href='" . $button['contact_us_button_options_a'] . "'>" . $button['contact_us_button_options_logo'] . "</a>";
            } ?>
            <span class="cubp-first-social-button seo-all-in-one-but" style="background-color:<?php
            echo ! empty($mainButtonSettings['contact_us_button_options_main_button_color']) ? $mainButtonSettings['contact_us_button_options_main_button_color'] : '#4dc147' ?>">
            <?php
            if ($mainButtonSettings['contact_us_button_options_main_button_logo']): ?>
                <?php
                echo $mainButtonSettings['contact_us_button_options_main_button_logo']; ?>
            <?php
            else: ?>
                <i class="fa fa-phone fa-shake" aria-hidden="true"></i>
            <?php
            endif; ?>
            </span>
        </div>
    <?php
    endif;
}

add_action('wp_footer', 'contact_us_button_view');