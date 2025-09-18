<?php

class HelloPopupFrontend {
    public function init() {
        add_action('wp_footer', [$this, 'render_popup']);
    }

    public function render_popup() {
        if (!HelloPopupSettings::get('active')) return;

        $title   = HelloPopupSettings::get('title');
        $content = HelloPopupSettings::get('content');
        $btn_txt = HelloPopupSettings::get('button_text');
        $btn_url = HelloPopupSettings::get('button_link');
        $cookie  = HelloPopupSettings::get('cookie_duration', 7);

        ?>
        <div id="hello-popup-popup" class="hello-popup-popup" style="display:none;">
            <div class="hello-popup-content">
                <h2><?php echo esc_html($title); ?></h2>
                <p><?php echo esc_html($content); ?></p>
                <?php if ($btn_url): ?>
                    <a href="<?php echo esc_url($btn_url); ?>" class="hello-popup-btn">
                        <?php echo esc_html($btn_txt); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <script>
        (function(){
            if(!document.cookie.includes("hello-popup_seen")){
                document.getElementById("hello-popup-popup").style.display = "block";
                var days = <?php echo intval($cookie); ?>;
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                document.cookie = "hello-popup_seen=1; expires=" + date.toUTCString() + "; path=/";
            }
        })();
        </script>
        <?php
    }
}
