<?php

function imba_seo_admin_page() {
    ?>
    <div class="wrap imba-admin-page">
        <!-- Top Title -->
        <div class="imba-top-bar">
            <h1 style="font-size: 24px; font-weight: 600; color: #333; text-align: center;"><?php _e('Imba SEO Plugin', 'imba-seo-plugin'); ?></h1>
        </div>

        <!-- Currency Switcher -->
        <div class="currency-switcher" style="text-align: right; margin-bottom: 20px;">
            <label for="currency"><?php _e('Choose Currency:', 'imba-seo-plugin'); ?></label>
            <select id="currency" onchange="switchCurrency()">
                <option value="SEK"><?php _e('SEK', 'imba-seo-plugin'); ?></option>
                <option value="EUR"><?php _e('Euro', 'imba-seo-plugin'); ?></option>
            </select>
        </div>

        <!-- Seamless Tabbed Navigation -->
        <div class="imba-tabs">
            <button class="imba-tablinks active" onclick="openTab(event, 'Home')"><?php _e('Home', 'imba-seo-plugin'); ?></button>
            <button class="imba-tablinks" onclick="openTab(event, 'SEO')"><?php _e('SEO', 'imba-seo-plugin'); ?></button>
            <button class="imba-tablinks" onclick="openTab(event, 'GoogleAds')"><?php _e('Google Ads', 'imba-seo-plugin'); ?></button>
            <button class="imba-tablinks" onclick="openTab(event, 'websites')"><?php _e('Web Imba Websites', 'imba-seo-plugin'); ?></button>
            <button class="imba-tablinks" onclick="openTab(event, 'ecommerce')"><?php _e('Web Imba Ecommerce', 'imba-seo-plugin'); ?></button>
            <button class="imba-tablinks" onclick="openTab(event, 'SocialMedia')"><?php _e('Social Media', 'imba-seo-plugin'); ?></button>
            <button class="imba-tablinks" onclick="openTab(event, 'BlogManagement')"><?php _e('Blog Management', 'imba-seo-plugin'); ?></button>
            <button class="imba-tablinks" onclick="openTab(event, 'Analytics')"><?php _e('Analytics', 'imba-seo-plugin'); ?></button>
        </div>

        <!-- Tab Content Containers -->
        <div id="Home" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/home-tab.php'; ?>
            <script>console.log('Home tab content loaded');</script>
        </div>

        <div id="SEO" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/seo-tab.php'; ?>
            <script>console.log('SEO tab content loaded');</script>
        </div>

        <div id="GoogleAds" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/gads-tab.php'; ?>
            <script>console.log('Google Ads tab content loaded');</script>
        </div>

        <div id="websites" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/websites-tab.php'; ?>
            <script>console.log('Websites tab content loaded');</script>
        </div>

        <div id="ecommerce" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/ecommerce-tab.php'; ?>
            <script>console.log('Ecommerce tab content loaded');</script>
        </div>

        <div id="SocialMedia" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/sm-tab.php'; ?>
            <script>console.log('Social Media tab content loaded');</script>
        </div>

        <div id="BlogManagement" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/blog-tab.php'; ?>
            <script>console.log('Blog Management tab content loaded');</script>
        </div>

        <div id="Analytics" class="imba-tabcontent">
            <?php include plugin_dir_path(__FILE__) . 'tabs/analytic-tab.php'; ?>
            <script>console.log('Analytics tab content loaded');</script>
        </div>
    </div>

    <script type="text/javascript">
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            // Get all tabcontent elements and hide them
            tabcontent = document.getElementsByClassName("imba-tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none"; // Hide all tabs
                tabcontent[i].classList.remove("active");
                console.log('Hiding tab:', tabcontent[i].id); // Debugging
            }

            // Remove the active class from all tab links
            tablinks = document.getElementsByClassName("imba-tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
                console.log('Removing active class from tab link:', tablinks[i].innerText); // Debugging
            }

            // Show the current tab's content and add the "active" class
            var currentTab = document.getElementById(tabName);
            if (currentTab) {
                currentTab.style.display = "block"; // Show the selected tab
                currentTab.classList.add("active");
                console.log('Showing tab:', tabName); // Debugging
            } else {
                console.log('Tab not found:', tabName); // Debugging
            }

            // Add the active class to the clicked tab link
            evt.currentTarget.classList.add("active");
        }

        // Set the first tab as active by default on page load
        document.addEventListener("DOMContentLoaded", function() {
            var firstTab = document.querySelector(".imba-tablinks");
            if (firstTab) {
                firstTab.click(); // Simulate a click on the first tab
                console.log('Default tab clicked:', firstTab.innerText); // Debugging
            }
        });

        function switchCurrency() {
            var currency = document.getElementById('currency').value;
            console.log('Switching to currency:', currency); // Debugging

            if (currency === 'SEK') {
                document.querySelectorAll('.price-sek').forEach(function(price) {
                    price.style.display = 'inline';
                });
                document.querySelectorAll('.price-eur').forEach(function(price) {
                    price.style.display = 'none';
                });
            } else {
                document.querySelectorAll('.price-sek').forEach(function(price) {
                    price.style.display = 'none';
                });
                document.querySelectorAll('.price-eur').forEach(function(price) {
                    price.style.display = 'inline';
                });
            }
        }
    </script>
    <?php
}

function imba_seo_admin_enqueue_styles() {
    wp_enqueue_style('imba-admin-styles', plugin_dir_url(__FILE__) . 'css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'imba_seo_admin_enqueue_styles');

?>
