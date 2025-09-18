<?php
/**
 * Plugin Name: Bonjour Popup
 * Description: Affiche un popup configurable lors de la première visite.
 * Version: 1.0.0
 * Author: Ydakar
 */

if ( ! defined('ABSPATH') ) exit;

// Auto-chargement simple
require_once plugin_dir_path(__FILE__) . 'includes/class-HelloPopup.php';

// Initialiser le plugin
function hello_popup_run_plugin() {
    $plugin = new HelloPopup();
    $plugin->run();
}

hello_popup_run_plugin();