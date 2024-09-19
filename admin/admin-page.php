<?php

function imba_seo_admin_page() {
    ?>
    <div class="wrap imba-admin-page">
        <!-- Top Title -->
        <div class="imba-top-bar">
            <h1 style="font-size: 24px; font-weight: 600; color: #333; text-align: center;">Imba SEO Plugin</h1>
        </div>

        <!-- Seamless Tabbed Navigation -->
        <div class="imba-tabs">
            <button class="imba-tablinks active" onclick="openTab(event, 'Home')">Home</button>
            <button class="imba-tablinks" onclick="openTab(event, 'SEO')">SEO</button>
            <button class="imba-tablinks" onclick="openTab(event, 'GoogleAds')">Google Ads</button>
            <button class="imba-tablinks" onclick="openTab(event, 'SocialMedia')">Social Media</button>
            <button class="imba-tablinks" onclick="openTab(event, 'WebDev')">Web Development</button>
            <button class="imba-tablinks" onclick="openTab(event, 'BlogManagement')">Blog Management</button>
            <button class="imba-tablinks" onclick="openTab(event, 'Analytics')">Analytics</button>
        </div>

        <!-- Tab Content for Home -->
        <div id="Home" class="imba-tabcontent" style="display: block;">
            <div class="imba-cards">
                <div class="imba-card">
                    <h3>Sökmotoroptimering nivå 1</h3>
                    <p>Öka din synlighet och få mer trafik med vår tjänst SEO Nivå 1! Låt oss optimera din webbplats för att nå nya höjder i sökresultaten, öka engagemanget och växa din verksamhet.</p>
                    <div class="imba-card-footer">
                        <a href="https://imbaseo.se/kontakta-oss/" class="imba-icon-link">📄 Kontakta oss</a>
                        <a href="https://imbaseo.se/sokmotoroptimering/" class="imba-icon-link">⚙️ Läs mer om SEO nivå 1</a>
                    </div>
                </div>
                <div class="imba-card">
                    <h3>Sökmotoroptimering nivå 2</h3>
                    <p>Maximera din onlinepotential med vår tjänst SEO Nivå 2! Få avancerade optimeringsstrategier som ger ännu mer trafik, förbättrar konverteringar och ger ditt företag en konkurrensfördel..</p>
                    <div class="imba-card-footer">
                        <a href="https://imbaseo.se/kontakta-oss/" class="imba-icon-link">📄 Kontakta oss</a>
                        <a href="https://imbaseo.se/sokmotoroptimering/" class="imba-icon-link">⚙️ Läs mer om SEO nivå 2</a>
                    </div>
                </div>
                <div class="imba-card">
                    <h3>Sökmotoroptimering nivå 3</h3>
                    <p>Dominera sökresultaten med vår tjänst SEO Nivå 3! Upplev storskalig optimering, skräddarsydda strategier och premiumsupport för att säkerställa maximal trafik, konverteringar och långsiktig tillväxt för ditt företag.</p>
                    <div class="imba-card-footer">
                        <a href="https://imbaseo.se/kontakta-oss/" class="imba-icon-link">📄 Kontakta oss</a>
                        <a href="https://imbaseo.se/sokmotoroptimering/" class="imba-icon-link">⚙️ Läs mer om SEO nivå 2</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Content for SEO -->
        <div id="SEO" class="imba-tabcontent" style="display: none;">
            <div class="imba-cards">
                <div class="imba-card">
                    <h3>Keyword Management</h3>
                    <p>Track and manage your website keywords for optimal SEO performance.</p>
                    <div class="imba-card-footer">
                        <a href="#" class="imba-icon-link">📄 Documentation</a>
                        <a href="#" class="imba-icon-link">⚙️ Configure</a>
                    </div>
                </div>
                <div class="imba-card">
                    <h3>SEO Analytics</h3>
                    <p>Analyze your SEO performance data and rankings.</p>
                    <div class="imba-card-footer">
                        <a href="#" class="imba-icon-link">📄 Documentation</a>
                        <a href="#" class="imba-icon-link">📊 View Analytics</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Content for Google Ads -->
        <div id="GoogleAds" class="imba-tabcontent" style="display: none;">
            <div class="imba-cards">
                <div class="imba-card">
                    <h3>Campaign Setup</h3>
                    <p>Create and manage your Google Ads campaigns effectively.</p>
                    <div class="imba-card-footer">
                        <a href="#" class="imba-icon-link">📄 Documentation</a>
                        <a href="#" class="imba-icon-link">⚙️ Setup Campaign</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Content for Social Media -->
        <div id="SocialMedia" class="imba-tabcontent" style="display: none;">
            <div class="imba-cards">
                <div class="imba-card">
                    <h3>Content Planning</h3>
                    <p>Plan and manage your social media content for better engagement.</p>
                    <div class="imba-card-footer">
                        <a href="#" class="imba-icon-link">📄 Documentation</a>
                        <a href="#" class="imba-icon-link">🗓 Plan Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Content for Web Development -->
        <div id="WebDev" class="imba-tabcontent" style="display: none;">
            <div class="imba-cards">
                <div class="imba-card">
                    <h3>Website Optimization</h3>
                    <p>Improve website speed, security, and performance with optimization tools.</p>
                    <div class="imba-card-footer">
                        <a href="#" class="imba-icon-link">📄 Documentation</a>
                        <a href="#" class="imba-icon-link">⚙️ Optimize Now</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        /* General Page Styling */
        .imba-admin-page {
            font-family: Arial, sans-serif;
        }

        /* Top Bar */
        .imba-top-bar {
            background-color: #f9f9f9;
            padding: 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        /* Tabbed Navigation */
        .imba-tabs {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .imba-tablinks {
            background-color: transparent;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: 600;
            color: #555;
        }

        .imba-tablinks.active {
            color: #0073aa;
            border-bottom: 3px solid #0073aa;
        }

        /* Cards Styling */
        .imba-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .imba-card {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 30%;
            transition: box-shadow 0.3s ease;
        }

        .imba-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .imba-card h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .imba-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        /* Footer of the card */
        .imba-card-footer {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .imba-icon-link {
            font-size: 12px;
            color: #0073aa;
            text-decoration: none;
        }

        .imba-icon-link:hover {
            text-decoration: underline;
        }

    </style>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            // Hide all tab content by default
            tabcontent = document.getElementsByClassName("imba-tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove "active" class from all tabs
            tablinks = document.getElementsByClassName("imba-tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab and add "active" class to the clicked tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <?php
}
