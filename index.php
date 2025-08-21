<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Google tag (gtag.js) -->
       <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q97FT9R5JM"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q97FT9R5JM');
        </script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> style="background:white;">
        <?php wp_body_open(); ?>
        <?php do_action('get_header'); ?>

        <div id="app">
            <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
        </div>

        <?php do_action('get_footer'); ?>
        <?php wp_footer(); ?>
    </body>

</html>
