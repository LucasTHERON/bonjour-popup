<?php

class HelloPopup {
    private $admin;
    private $frontend;
    private $assets;

    public function __construct() {
        require_once plugin_dir_path(__FILE__) . 'class-HelloPopupAdmin.php';
        require_once plugin_dir_path(__FILE__) . 'class-HelloPopupSettings.php';
        require_once plugin_dir_path(__FILE__) . 'class-HelloPopupFrontend.php';
        require_once plugin_dir_path(__FILE__) . 'class-HelloPopupAssets.php';

        $this->admin    = new HelloPopupAdmin();
        $this->frontend = new HelloPopupFrontend();
        $this->assets   = new HelloPopupAssets();
    }

    public function run() {
        if ( is_admin() ) {
            $this->admin->init();
        } else {
            $this->frontend->init();
        }
        
        $this->assets->init();
    }
}
