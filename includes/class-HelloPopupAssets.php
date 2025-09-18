<?php

class HelloPopupAssets {
    public function init() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets() {
        wp_enqueue_style('hello-popup-style', plugin_dir_url(__FILE__) . '../assets/popup.css');
        wp_enqueue_script('hello-popup-script', plugin_dir_url(__FILE__) . '../assets/popup.js', [], '1.0.0', true);
    }
}
