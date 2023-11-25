<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='max-image-preview:large'>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="https://templatekit.jegtheme.com/hikker/xmlrpc.php">
    <title>Durbeen &#8211; Hiking &amp; Mountain Trekking Elementor Template Kit by Jegtheme</title>
    <link rel="alternate" type="application/rss+xml" title="Durbeen &raquo; Feed" href="feed/index.htm">
    <link rel="alternate" type="application/rss+xml" title="Durbeen &raquo; Comments Feed" href="comments/feed/index.htm">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #section_2,
        #section_1 {
            position: relative;
            overflow: hidden;
            background-position: center;
            background-repeat: no-repeat;
            /* height: 100%; */
            /* You can remove this line unless you want the section to take up the entire height */
        }

        #elementor-background-overlay_1 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            /* height: 100%; */
            /* You can remove this line unless you want the overlay to take up the entire height */
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
            background-color: #000;
            opacity: .5;
            transition: background .3s, border-radius .3s, opacity .3s;
        }

        .crsl_tp {
            margin-top: 0px !important;
        }

        /* .carousel-inner {
            border-radius: 10% !important;
        } */

        @media (max-width: 767px) {

            /* Mobile View Styling */
            #elementor-background-overlay_1,
            #section_1 {
                background-size: cover !important;
                height: 100vh;
                /* Adjust based on your design requirements */
            }

            #section_2 {
                background-size: cover !important;
                height: 30vh;
                /* Adjust based on your design requirements */
            }

            .crsl_img {
                height: 100px;
            }
        }

        @media (min-width: 768px) {

            /* Desktop View Styling */
            #elementor-background-overlay_1,
            #section_2,
            #section_1 {
                height: 100%;
                /* Adjust based on your design requirements */
            }

            .crsl_img {
                height: 400px !important;
                padding-right: 10%;
                padding-left: 10%;
                /* width: 100% !important; */
            }
        }

        #to-top {
            position: fixed;
            right: 80px;
            bottom: -100px;
            z-index: 1;
            padding: 9px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            background: rgba(34, 34, 34, 0.8);
            color: #fff;
            font-size: 30px;
            line-height: 20px;
            cursor: pointer;
            -webkit-transition: 0.75s;
            transition: 0.75s;
        }

        #to-top:hover {
            /* background: #19a9e5; */
            background: #57b479;
        }

        #whatsapp-widget {
            background: #38de75 !important;
            position: fixed;
            right: 30px;
            bottom: 30px;
            z-index: 1;
            padding: 9px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            color: #fff;
            font-size: 50px;
            line-height: 20px;
            cursor: pointer;
            -webkit-transition: 0.75s;
            transition: 0.75s;
            background: #57b479;
        }

        #whatsapp-widget:hover {
            background: #186f38 !important;
            font-size: 40px;
        }
    </style>
    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='jkit-elements-main-css' href='<?php echo base_url() ?>external/wp-content/plugins/jeg-elementor-kit/assets/css/elements/main.css?ver=2.6.2' media='all'>
    <link rel='stylesheet' id='wp-block-library-css' href='<?= base_url() ?>external/wp-includes/css/dist/block-library/style.min.css?ver=6.1.4' media='all'>
    <link rel='stylesheet' id='classic-theme-styles-css' href='<?= base_url() ?>external/wp-includes/css/classic-themes.min.css?ver=1' media='all'>
    <style id='global-styles-inline-css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel='stylesheet' id='allow-webp-image-css' href='<?= base_url() ?>external/wp-content/plugins/allow-webp-image/public/css/allow-webp-image-public.css?ver=1.0.1' media='all'>
    <link rel='stylesheet' id='template-kit-export-css' href='<?= base_url() ?>external/wp-content/plugins/template-kit-export/public/assets/css/template-kit-export-public.min.css?ver=1.0.21' media='all'>
    <link rel='stylesheet' id='hfe-style-css' href='<?= base_url() ?>external/wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor.css?ver=1.6.13' media='all'>
    <link rel='stylesheet' id='elementor-icons-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.23.0' media='all'>
    <link rel='stylesheet' id='elementor-frontend-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=3.16.4' media='all'>
    <link rel='stylesheet' id='swiper-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/swiper/css/swiper.min.css?ver=5.3.6' media='all'>
    <link rel='stylesheet' id='elementor-post-19-css' href='<?= base_url() ?>external/wp-content/uploads/sites/139/elementor/css/post-19.css?ver=1695377318' media='all'>
    <link rel='stylesheet' id='elementor-global-css' href='<?= base_url() ?>external/wp-content/uploads/sites/139/elementor/css/global.css?ver=1695356447' media='all'>
    <link rel='stylesheet' id='elementor-post-17-css' href='<?= base_url() ?>external/wp-content/uploads/sites/139/elementor/css/post-17.css?ver=1695356448' media='all'>
    <link rel='stylesheet' id='hfe-widgets-style-css' href='<?= base_url() ?>external/wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend.css?ver=1.6.13' media='all'>
    <link rel='stylesheet' id='font-awesome-5-all-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=3.16.4' media='all'>
    <link rel='stylesheet' id='font-awesome-4-shim-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=3.16.4' media='all'>
    <link rel='stylesheet' id='elementor-post-357-css' href='<?= base_url() ?>external/wp-content/uploads/sites/139/elementor/css/post-357.css?ver=1695356448' media='all'>
    <link rel='stylesheet' id='elementor-post-358-css' href='<?= base_url() ?>external/wp-content/uploads/sites/139/elementor/css/post-358.css?ver=1695356448' media='all'>
    <link rel='stylesheet' id='hello-elementor-css' href='<?= base_url() ?>external/wp-content/themes/hello-elementor/style.min.css?ver=2.6.1' media='all'>
    <link rel='stylesheet' id='hello-elementor-theme-style-css' href='<?= base_url() ?>external/wp-content/themes/hello-elementor/theme.min.css?ver=2.6.1' media='all'>
    <link rel='stylesheet' id='google-fonts-1-css' href='<?= base_url() ?>external/css?family=Oswald%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CHeebo%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=6.1.4' media='all'>
    <link rel='stylesheet' id='elementor-icons-jkiticon-css' href='<?= base_url() ?>external/wp-content/plugins/jeg-elementor-kit/assets/fonts/jkiticon/jkiticon.css?ver=2.6.2' media='all'>
    <link rel='stylesheet' id='elementor-icons-shared-0-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3' media='all'>
    <link rel='stylesheet' id='elementor-icons-fa-solid-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3' media='all'>
    <link rel='stylesheet' id='elementor-icons-fa-brands-css' href='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3' media='all'>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <script src='<?= base_url() ?>external/wp-includes/js/jquery/jquery.min.js?ver=3.6.1' id='jquery-core-js'></script>
    <script src='<?= base_url() ?>external/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
    <script src='<?= base_url() ?>external/wp-content/plugins/allow-webp-image/public/js/allow-webp-image-public.js?ver=1.0.1' id='allow-webp-image-js'></script>
    <script src='<?= base_url() ?>external/wp-content/plugins/template-kit-export/public/assets/js/template-kit-export-public.min.js?ver=1.0.21' id='template-kit-export-js'></script>
    <script src='<?= base_url() ?>external/wp-content/plugins/elementor/assets/lib/font-awesome/js/v4-shims.min.js?ver=3.16.4' id='font-awesome-4-shim-js'></script>
    <link rel="https://api.w.org/" href="<?= base_url() ?>external/wp-json/index.htm">
    <link rel="alternate" type="application/json" href="<?= base_url() ?>external/wp-json/wp/v2/pages/17">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://templatekit.jegtheme.com/hikker/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?= base_url() ?>external/wp-includes/wlwmanifest.xml">
    <meta name="generator" content="WordPress 6.1.4">
    <link rel="canonical" href="index.htm">
    <link rel='shortlink' href='index.htm'>
    <link rel="alternate" type="application/json+oembed" href="<?= base_url() ?>external/wp-json/oembed/1.0/embed?url=https%3A%2F%2Ftemplatekit.jegtheme.com%2Fhikker%2F">
    <link rel="alternate" type="text/xml+oembed" href="<?= base_url() ?>external/wp-json/oembed/1.0/embed-1?url=https%3A%2F%2Ftemplatekit.jegtheme.com%2Fhikker%2F&#038;format=xml">
    <meta name="generator" content="Elementor 3.16.4; features: e_dom_optimization, e_optimized_assets_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-auto">
</head>

<body class="home page-template page-template-elementor_header_footer page page-id-17 ehf-header ehf-footer ehf-template-hello-elementor ehf-stylesheet-hello-elementor jkit-color-scheme elementor-default elementor-template-full-width elementor-kit-19 elementor-page elementor-page-17">
    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-dark-grayscale">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 0.49803921568627"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.49803921568627"></fefuncg>
                    <fefuncb type="table" tablevalues="0 0.49803921568627"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-grayscale">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 1"></fefuncg>
                    <fefuncb type="table" tablevalues="0 1"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-yellow">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.54901960784314 0.98823529411765"></fefuncr>
                    <fefuncg type="table" tablevalues="0 1"></fefuncg>
                    <fefuncb type="table" tablevalues="0.71764705882353 0.25490196078431"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-red">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.27843137254902"></fefuncg>
                    <fefuncb type="table" tablevalues="0.5921568627451 0.27843137254902"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-midnight">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 0"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.64705882352941"></fefuncg>
                    <fefuncb type="table" tablevalues="0 1"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-magenta-yellow">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.78039215686275 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.94901960784314"></fefuncg>
                    <fefuncb type="table" tablevalues="0.35294117647059 0.47058823529412"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-green">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.65098039215686 0.40392156862745"></fefuncr>
                    <fefuncg type="table" tablevalues="0 1"></fefuncg>
                    <fefuncb type="table" tablevalues="0.44705882352941 0.4"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-orange">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </fecolormatrix>
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.098039215686275 1"></fefuncr>
                    <fefuncg type="table" tablevalues="0 0.66274509803922"></fefuncg>
                    <fefuncb type="table" tablevalues="0.84705882352941 0.41960784313725"></fefuncb>
                    <fefunca type="table" tablevalues="1 1"></fefunca>
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in"></fecomposite>
            </filter>
        </defs>
    </svg>
    <div id="page" class="hfeed site">

        <header id="masthead" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
            <p class="main-title bhf-hidden" itemprop="headline"><a href="<?php base_url() ?>" title="Durbeen" rel="home">Durbeen</a></p>
            <div data-elementor-type="wp-post" data-elementor-id="357" class="elementor elementor-357">
                <section class="elementor-section elementor-top-section elementor-element elementor-element-7f240d7 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7f240d7" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-660c39b" data-id="660c39b" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-c01d95b elementor-widget elementor-widget-image" data-id="c01d95b" data-element_type="widget" data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                        <a href="<?= base_url() ?>"><img width="1285" height="385" src="<?= base_url() ?>external/wp-content/uploads/sites/139/2021/08/logo.png" class="attachment-full size-full wp-image-340" alt="" decoding="async" loading="lazy" srcset="<?= base_url() ?>external/wp-content/uploads/sites/139/2021/08/logo.png 1285w, <?= base_url() ?>external/wp-content/uploads/sites/139/2021/08/logo-300x90.png 300w, <?= base_url() ?>external/wp-content/uploads/sites/139/2021/08/logo-1024x307.png 1024w, <?= base_url() ?>external/wp-content/uploads/sites/139/2021/08/logo-768x230.png 768w, <?= base_url() ?>external/wp-content/uploads/sites/139/2021/08/logo-800x240.png 800w" sizes="(max-width: 1285px) 100vw, 1285px">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-60 elementor-top-column elementor-element elementor-element-4a224fd" data-id="4a224fd" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-a208d25 elementor-widget elementor-widget-jkit_nav_menu" data-id="a208d25" data-element_type="widget" data-widget_type="jkit_nav_menu.default">
                                    <div class="elementor-widget-container">
                                        <div class="jeg-elementor-kit jkit-nav-menu break-point-tablet submenu-click-title jeg_module_17__654c63d5c4f46" data-item-indicator="&lt;i aria-hidden=&quot;true&quot; class=&quot;jki jki-chevron-down-light&quot;&gt;&lt;/i&gt;">
                                            <button class="jkit-hamburger-menu"><i aria-hidden="true" class="jki jki-bars-solid"></i></button>
                                            <div class="jkit-menu-wrapper">
                                                <div class="jkit-menu-container">
                                                    <ul id="menu-menu-1" class="jkit-menu jkit-menu-direction-flex jkit-submenu-position-top">
                                                        <li id="menu-item-389" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-17 current_page_item menu-item-389">
                                                            <a href="<?= base_url() ?>" aria-current="page">Home</a>
                                                        </li>
                                                        <li id="menu-item-388" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-388">
                                                            <a href="<?= base_url() ?>about-us">About</a>
                                                        </li>
                                                        <li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9">
                                                            <a href="#">Weekend Trip</a>
                                                            <ul class="sub-menu">
                                                                <li id="menu-item-476" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-476">
                                                                    <a href="#">Trip 1</a>
                                                                </li>
                                                                <li id="menu-item-536" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-536">
                                                                    <a href="#">Trip 2</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11">
                                                            <a href="#">Popular Trip</a>
                                                            <ul class="sub-menu">
                                                                <li id="menu-item-535" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-535">
                                                                    <a href="#">Trip 1</a>
                                                                </li>
                                                                <li id="menu-item-538" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-538">
                                                                    <a href="#">Trip 2</a>
                                                                </li>
                                                                <li id="menu-item-475" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-475">
                                                                    <a href="#">Trip 3</a>
                                                                </li>
                                                                <li id="menu-item-474" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-474">
                                                                    <a href="#">Trip 2</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13">
                                                            <a href="#">Adv & Thrill Trip</a>
                                                            <ul class="sub-menu">
                                                                <li id="menu-item-534" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-534">
                                                                    <a href="#">Trip 1</a>
                                                                </li>
                                                                <li id="menu-item-577" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-577">
                                                                    <!-- <a href="2021/08/06/top-5-destination-hiking-trekking-in-indonesia-2021/index.htm">Trip</a> -->
                                                                    <a href="#">Trip</a>

                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li id="menu-item-473" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-473 disabled" aria-disabled="true">
                                                            <a href="#">9119199987</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="jkit-nav-identity-panel">
                                                    <div class="jkit-nav-site-title"><a href="index.htm" class="jkit-nav-logo"><img src="<?= base_url() ?>external/wp-content/uploads/sites/139/2021/08/logo-CZSKN7.png"></a>
                                                    </div>
                                                    <button class="jkit-close-menu"><i aria-hidden="true" class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="jkit-overlay"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-4673235 elementor-hidden-phone elementor-hidden-tablet" data-id="4673235" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-becee8b elementor-shape-circle e-grid-align-right elementor-grid-0 elementor-widget elementor-widget-social-icons" data-id="becee8b" data-element_type="widget" data-widget_type="social-icons.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-social-icons-wrapper elementor-grid">
                                            <span class="elementor-grid-item">
                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-animation-shrink elementor-repeater-item-9bffea0" target="_blank">
                                                    <span class="elementor-screen-only">Facebook-f</span>
                                                    <i class="fab fa-facebook-f"></i> </a>
                                            </span>
                                            <span class="elementor-grid-item">
                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-animation-shrink elementor-repeater-item-9058f94" target="_blank">
                                                    <span class="elementor-screen-only">Instagram</span>
                                                    <i class="fab fa-instagram"></i> </a>
                                            </span>
                                            <span class="elementor-grid-item">
                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-animation-shrink elementor-repeater-item-53e68eb" target="_blank">
                                                    <span class="elementor-screen-only">Youtube</span>
                                                    <i class="fab fa-youtube"></i> </a>
                                            </span>
                                            <!-- <span class="elementor-grid-item">
                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-tripadvisor elementor-animation-shrink elementor-repeater-item-cf4747c" target="_blank">
                                                    <span class="elementor-screen-only">Tripadvisor</span>
                                                    <i class="fab fa-tripadvisor"></i> </a>
                                            </span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </header>