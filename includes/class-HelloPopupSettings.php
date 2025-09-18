<?php

class HelloPopupSettings {

    public static function register() {
        register_setting('hello_popup_group', 'hello_popup_options');

        self::add_field('active', 'Activer le popup', 'checkbox');
        self::add_field('title', 'Titre', 'text');
        self::add_field('content', 'Corps du texte', 'textarea');
        self::add_field('button_text', 'Texte du bouton', 'text');
        self::add_field('button_link', 'Lien du bouton', 'url');
        self::add_field('cookie_duration', 'Durée du cookie (jours)', 'number');

        add_settings_section('hello_popup_section', 'Paramètres du Popup', null, 'hello_popup_settings');

    }

    private static function add_field($id, $label, $type) {
        add_settings_field(
            "hello_popup_$id",
            $label,
            [__CLASS__, 'render_field'],
            'hello_popup_settings',
            'hello_popup_section',
            ['id' => $id, 'type' => $type]
        );
    }

    public static function render_field($args) {
        $options = get_option('hello_popup_options');
        $id = $args['id'];
        $type = $args['type'];
        $value = $options[$id] ?? '';
        switch ($type) {
            case 'checkbox':
                echo "<input type='checkbox' name='hello_popup_options[$id]' value='1' " . checked(1, $value, false) . " />";
                break;
            case 'textarea':
                echo "<textarea name='hello_popup_options[$id]' rows='4' cols='50'>" . esc_textarea($value) . "</textarea>";
                break;
            default:
                echo "<input type='$type' name='hello_popup_options[$id]' value='" . esc_attr($value) . "' />";
        }
    }

    public static function get($key, $default = '') {
        $options = get_option('hello_popup_options', []);
        return $options[$key] ?? $default;
    }
}
