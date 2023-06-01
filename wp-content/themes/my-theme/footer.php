
<footer>
    <?php
        global $wp_widget_factory;
        the_widget($wp_widget_factory->get_widget_key( 'hstngr_widget' ), ['title' => 'Footer widget'])
    ?>
    <p>Copyright &copy; 2019</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
