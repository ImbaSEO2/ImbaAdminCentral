<?php
function imba_seo_floating_section() {
    ?>
    <div id="imba-seo-floating-section" style="position:fixed;bottom:20px;right:20px;background:#f1f1f1;color:#23282d;padding:20px;border-radius:8px;border:1px solid #ccd0d4;box-shadow:0px 2px 4px rgba(0,0,0,0.1);z-index:9999;width:250px;text-align:center;font-family:Arial, sans-serif;">
        <div id="imba-seo-content">
            <h3 style="margin: 0 0 10px;font-size:16px;font-weight:600;color:#0073aa;"><?php _e('Imba SEO', 'imba-seo-plugin'); ?></h3>
            <div style="margin-bottom:15px;">
                <a href="<?php echo admin_url('admin.php?page=imba-seo-plugin'); ?>" style="background-color:#0073aa;color:white;padding:8px 15px;border-radius:5px;text-decoration:none;display:inline-block;width:100%;font-size:14px;">
                    <?php _e('Admin Page', 'imba-seo-plugin'); ?>
                </a>
            </div>
            <div style="margin-bottom:15px;">
                <a href="https://imbaseo.se/kontakta-oss/" target="_blank" style="background-color:#46b450;color:white;padding:8px 15px;border-radius:5px;text-decoration:none;display:inline-block;width:100%;font-size:14px;">
                    <?php _e('Contact Us', 'imba-seo-plugin'); ?>
                </a>
            </div>
        </div>

        <!-- Minimize Button -->
        <button id="imba-seo-minimize" style="background:none;border:none;color:#0073aa;cursor:pointer;padding:5px;">
            <span id="imba-seo-toggle-text"><?php _e('Minimize', 'imba-seo-plugin'); ?></span>
        </button>
    </div>

    <style>
        #imba-seo-floating-section.minimized {
            height: 40px;
            width: 100px;
            padding: 5px;
        }

        #imba-seo-floating-section.minimized #imba-seo-content {
            display: none;
        }

        #imba-seo-floating-section a:hover {
            opacity: 0.85;
        }
    </style>

    <script>
        document.getElementById('imba-seo-minimize').addEventListener('click', function() {
            var floatingSection = document.getElementById('imba-seo-floating-section');
            var toggleText = document.getElementById('imba-seo-toggle-text');
            floatingSection.classList.toggle('minimized');
            
            if (floatingSection.classList.contains('minimized')) {
                toggleText.textContent = '<?php _e('Expand', 'imba-seo-plugin'); ?>';
            } else {
                toggleText.textContent = '<?php _e('Minimize', 'imba-seo-plugin'); ?>';
            }
        });
    </script>
    <?php
}
add_action('admin_footer', 'imba_seo_floating_section');
