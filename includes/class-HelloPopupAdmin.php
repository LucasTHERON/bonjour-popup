<?php

class HelloPopupAdmin {
    
    public function init() {
        add_action('admin_menu', [$this, 'add_menu']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function add_menu() {
        // add_options_page(
        //     'Popup',
        //     'Popup',
        //     'manage_options',
        //     'hello-popup-settings',
        //     [$this, 'render_settings_page']
        // );
        
        add_menu_page(
            'Popup',
            'Popup',
            'manage_options',
            'hello-popup-settings',
            [$this, 'render_settings_page']
        );
    }

    public function register_settings() {
        HelloPopupSettings::register();
    }

    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1>Paramètres du Popup</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('hello_popup_group');
                do_settings_sections('hello_popup_settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
