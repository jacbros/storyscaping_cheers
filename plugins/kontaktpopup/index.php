<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
* Plugin Name: Popup contact form
* Plugin URI: https://jakobottosen.dk/cheers
* Description: This is a contact form Plugin based HTML5, CSS, JS & PHP
* Version: 1.5.6
* Author: Jakob F. Ottosen
* Author URI: https://jakobottosen.dk/cheers
* License: GPL2
*/

function elementor_accordion_title() { ?>
	<script>
		jQuery(document).ready(function() {
			jQuery( '.elementor-accordion .elementor-tab-title' ).removeClass( 'elementor-active' );
			jQuery( '.elementor-accordion .elementor-tab-content' ).css( 'display', 'none' );
		});
	</script>
<?php }
add_action( 'wp_footer', 'elementor_accordion_title', 99 );

function popupButton(){
    $knap = '';
    $knap .= '<section class="popupcontainer">';
    $knap .= '<button class="popupShowButton"><i class="fa fa-envelope1 fa-envelope fa-3x"></i></button>';
    $knap .= '</section>';
    
    return $knap;
}

function popupContact(){
    $content = '';
    $content .= '<div class="contact-wrapper">';
    $content .= '<div class="contact-form">';
    $content .= '<div class="popupCloseButton">X</div>';
    $content .= '<div class="contact-face"></div>';
    $content .= '<div id="contact-header">';
    $content .= '<h1 id="contact-header-title">Kontakt mig</h1>';
    $content .= '</div>';
    $content .= '<section class="form">';
    $content .= '<form action="#">';
    $content .= '<div id="contact-body">';
    $content .= '<p id="contact-body-text">Hvis du undrer dig over noget vedr. Cheers, skal du endelig skrive.<br>Vi er altid til rådighed og forsøger at svare så hurtit som muligt.</p>';
    $content .= '</div>';
    $content .= '<div class="input">';
    $content .= '<input type="email" id="email" placeholder="Din E-mail" name="email" required>';
    $content .= '<i class="fa fa-at fa-2x"></i>';
    $content .= '</div>';
    $content .= '<div class="textarea">';
    $content .= '<textarea placeholder="Din besked" required></textarea>';
    $content .= '<i class="fa-envelope2 fa fa-envelope fa-2x"></i>';
    $content .= '</div>';
    $content .= '<div id="submitForm">';
    $content .= '<input type="submit" value="Send" id="submitBtn" name="submitBtn">';
    $content .= '</div>';
    $content .= '<div id="contact-footer">';
    $content .= '</div>';
    $content .= '</form>';
    $content .= '</section>';
    $content .= '</div>';
    $content .= '</div>';
    
    return $content;
    //Her printer vi vores variable til siden som html. Så den vises
}

#First parameter is a self choosen name for a unique short-code. Second parameter is the name of the function that creates the form
    add_shortcode('display_form','popupContact');
    add_shortcode('popup_button','popupButton');
    
    add_action('wp_enqueue_scripts','register_styles_and_scripts_for_plugin');
    function register_styles_and_scripts_for_plugin() 
    {
        wp_enqueue_style('fontAwesomeCDN', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
        
        wp_enqueue_style('CustomFont','https://fonts.googleapis.com/css?family=Baloo+Bhai|Quicksand&display=swap');
        
        wp_enqueue_style('CustomStylesheet', plugins_url('kontaktpopup/css/style.css'));
        
        wp_deregister_script('jquery');
        
        wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
        
        wp_enqueue_script('CustomScript', plugins_url('kontaktpopup/js/script.js'), array('jquery'), null, true);
    }
?>
