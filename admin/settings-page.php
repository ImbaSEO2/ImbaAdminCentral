<?php

function imba_seo_menu() {
    add_menu_page(
        'Imba SEO', 
        'Imba', 
        'manage_options', 
        'imba-seo-plugin', 
        'imba_seo_main_page', 
        'dashicons-analytics', 
        3
    );
    
    $sections = ['SEO', 'Google Ads', 'Social Media', 'Web Development'];
    foreach ($sections as $section) {
        add_submenu_page(
            'imba-seo-plugin', 
            $section, 
            $section, 
            'manage_options', 
            'imba-seo-' . strtolower(str_replace(' ', '-', $section)), 
            function() use ($section) { imba_seo_section_page($section); }
        );
    }
}
add_action('admin_menu', 'imba_seo_menu');

function imba_seo_main_page() {
    ?>
    <div class="wrap">
        <h1>Imba SEO Services</h1>
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'SEO')">SEO</button>
            <button class="tablinks" onclick="openTab(event, 'Google Ads')">Google Ads</button>
        </div>
        <div id="SEO" class="tabcontent">
            <h3>SEO Services</h3>
            <p>Insert your SEO content here...</p>
        </div>
    </div>
    <?php
}

function imba_seo_section_page($section) {
    echo "<h2>$section</h2>";
}

?>
