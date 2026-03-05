<?php

    function dynamic_theme_support(){
        add_theme_support('title-tag');// coming from wp it self the setting and general title tag
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }
    // add a hook
    add_action('after_setup_theme', 'dynamic_theme_support');

    function register_style_setup()
    {
        $version=wp_get_theme()->get('Version');
        wp_enqueue_style('style_reg',get_template_directory_uri()."/style.css", array('bootstrap_reg'), $version, 'all');
        wp_enqueue_style('bootstrap_reg','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
        wp_enqueue_style('fontawsome_reg','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0', 'all');
    }

    add_action('wp_enqueue_scripts', 'register_style_setup');


    function register_scripts_setup()
    {
        wp_enqueue_script('Jquery_reg','https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
        wp_enqueue_script('bootstrap_script_reg','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
        wp_enqueue_script('popper_reg','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
        wp_enqueue_script('js_reg',get_template_directory_uri()."/assets/Js/main.js", array(), '1.0', true);
    }

    add_action('wp_enqueue_scripts', 'register_scripts_setup');


    function menu_setup()
    {
        $locations=array(
            'primary'=> "desktop primary left sidebar",
            'footer'=> "desktop footer menu"
        );
        register_nav_menus($locations);


    }

    //hook
    add_action('init', 'menu_setup');



    function widgets_setup ()
    {
        register_sidebar(array(
            'before_title'=>'',
            'after_title'=>'',
            'before_widget'=>' <ul class="social-list list-inline py-3 mx-auto">',
            'after_widget'=>'</ul>',
            'name'=>'sidebar area',
            'id'=>'sidebar-1',
            'description'=>'this is the sidebar area',
        )

        );

        register_sidebar(array(
            'before_title'=>'',
            'after_title'=>'',
            'before_widget'=>' <ul class="social-list list-inline py-3 mx-auto">',
            'after_widget'=>'</ul>',

                'name'=>'footer area',
                'id'=>'footer-1',
                'description'=>'this is the footer area',
            )

        );

    }


add_action('widgets_init', 'widgets_setup');
