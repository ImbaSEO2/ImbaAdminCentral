<?php

function imba_seo_floating_section() {

    ?>

    <div id="imba-seo-floating-section" class="floating-visible">
        <div id="imba-seo-content">
            <h3 style="margin: 0 0 10px;font-size:16px;font-weight:600;color:#0073aa;">Imba SEO</h3>
            <div style="margin-bottom:15px;">
                <a href="<?php echo admin_url('admin.php?page=imba-seo-plugin'); ?>" style="background-color:#0073aa;color:white;padding:8px 15px;border-radius:5px;text-decoration:none;display:inline-block;width:100%;font-size:14px;">
                    Imba Admin Central
                </a>

            </div>
            <div style="margin-bottom:15px;">
                <a href="https://imbaseo.se/kontakta-oss/" target="_blank" style="background-color:#46b450;color:white;padding:8px 15px;border-radius:5px;text-decoration:none;display:inline-block;width:100%;font-size:14px;">
                    Kontakta oss
                </a>
            </div>
        </div>



        <!-- Minimize Button -->

        <button id="imba-seo-minimize" style="background:none;border:none;color:#0073aa;cursor:pointer;padding:5px;">
            <span id="imba-seo-toggle-text">Minimera denna rutan</span>
        </button>

    </div>



    <style>

        #imba-seo-floating-section {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #f1f1f1;
            color: #23282d;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ccd0d4;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            width: 250px;
            text-align: center;
            font-family: Arial, sans-serif;
            transition: all 0.3s ease;
        }

        #imba-seo-floating-section.floating-minimized {
            height: 30px;
            width: 30px;
            padding: 5px;
            border-radius: 50%;
			background-color: red;
            overflow: hidden;
        }
		
        #imba-seo-floating-section.floating-minimized #imba-seo-content {
            display: none;
        }

        #imba-seo-floating-section.floating-minimized #imba-seo-content {
            display: none;
        }

        #imba-seo-floating-section h3 {
            margin: 0 0 10px;
            font-size: 16px;
            font-weight: 600;
            color: #0073aa;
        }

        #imba-seo-floating-section div {
            margin-bottom: 15px;
        }

        #imba-seo-floating-section a {
            background-color: #0073aa;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            font-size: 14px;
        }

        #imba-seo-floating-section a:hover {
            opacity: 0.85;
        }

        #imba-seo-minimize {
            background: none;
            border: none;
            color: #0073aa;
            cursor: pointer;
            padding: 5px;
        }

    </style>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var floatingSection = document.getElementById('imba-seo-floating-section');
            var toggleText = document.getElementById('imba-seo-toggle-text');
            var minimizeButton = document.getElementById('imba-seo-minimize');

            minimizeButton.addEventListener('click', function() {
                floatingSection.classList.toggle('floating-minimized');

                if (floatingSection.classList.contains('floating-minimized')) {
                    toggleText.textContent = ' ';
                } else {
                    toggleText.textContent = 'Minimera denna rutan';
                }
            });
        });
    </script>

    <?php

}

add_action('admin_footer', 'imba_seo_floating_section');

