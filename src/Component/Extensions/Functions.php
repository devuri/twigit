<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Functions extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [

            /*
             * -----------------------------------------------------
             *  WordPress Core URL & Theme Hook Functions
             * -----------------------------------------------------
             */
            new TwigFunction('site_url', 'get_site_url'),
            new TwigFunction('home_url', 'get_home_url'),
            new TwigFunction('wp_head', 'wp_head'),
            new TwigFunction('wp_footer', 'wp_footer'),
            new TwigFunction('wp_body_open', 'wp_body_open'),
            new TwigFunction('body_class', 'body_class'),

            /*
             * -----------------------------------------------------
             *  Theme Directory & Asset URLs
             * -----------------------------------------------------
             */
            new TwigFunction('get_stylesheet_directory_uri', 'get_stylesheet_directory_uri'),
            new TwigFunction('get_template_directory_uri', 'get_template_directory_uri'),

            /*
             * -----------------------------------------------------
             *  WordPress Core Utility Functions
             *  (Titles, Content, Excerpts, Permalinks, etc.)
             * -----------------------------------------------------
             */
            new TwigFunction('get_permalink', 'get_permalink'),
            new TwigFunction('get_the_title', 'get_the_title'),
            new TwigFunction('get_the_excerpt', 'get_the_excerpt'),
            new TwigFunction('get_the_content', 'get_the_content'),
            new TwigFunction('the_post_thumbnail', 'the_post_thumbnail'),
            new TwigFunction('get_the_post_thumbnail', 'get_the_post_thumbnail'),
            // Translations (Localization)
            new TwigFunction('_e', '_e'),
            // Echoes site info
            new TwigFunction('bloginfo', 'bloginfo'),
            // Returns site info
            new TwigFunction('get_bloginfo', 'get_bloginfo'),
            new TwigFunction('get_option', 'get_option'),

            /*
             * -----------------------------------------------------
             *  The WordPress Loop (Typically used in PHP,
             *  but included for completeness in Twig)
             * -----------------------------------------------------
             */
            new TwigFunction('have_posts', 'have_posts'),
            new TwigFunction('the_post', 'the_post'),

            /*
             * -----------------------------------------------------
             *  Comments, Menus, Widgets, Sidebars
             * -----------------------------------------------------
             */
            new TwigFunction('wp_nav_menu', 'wp_nav_menu'),
            new TwigFunction('comments_template', 'comments_template'),
            new TwigFunction('dynamic_sidebar', 'dynamic_sidebar'),
            new TwigFunction('is_active_sidebar', 'is_active_sidebar'),

            /*
             * -----------------------------------------------------
             *  Attachment & Media Functions
             * -----------------------------------------------------
             */
            new TwigFunction('wp_get_attachment_image_src', 'wp_get_attachment_image_src'),
            new TwigFunction('wp_get_attachment_metadata', 'wp_get_attachment_metadata'),
            new TwigFunction('wp_get_attachment_url', 'wp_get_attachment_url'),

            /*
             * -----------------------------------------------------
             *  Query & Post Retrieval
             * -----------------------------------------------------
             */
            // Built-in WordPress query functions
            new TwigFunction('get_posts', 'get_posts'),
            new TwigFunction('get_post', 'get_post'),
            // Custom Twigit Query function
            new TwigFunction('post_query', ['Twigit\\Query\\PostQuery', 'getPosts']),

            /*
             * -----------------------------------------------------
             *  WordPress Conditional Tags
             * -----------------------------------------------------
             */
            new TwigFunction('is_singular', 'is_singular'),
            new TwigFunction('is_archive', 'is_archive'),
            new TwigFunction('is_home', 'is_home'),
            new TwigFunction('is_page', 'is_page'),
            new TwigFunction('is_category', 'is_category'),

            /*
             * -----------------------------------------------------
             *  Taxonomies & Terms
             * -----------------------------------------------------
             */
            new TwigFunction('get_terms', 'get_terms'),
            new TwigFunction('get_term_link', 'get_term_link'),
            new TwigFunction('get_the_category', 'get_the_category'),
            new TwigFunction('the_category', 'the_category'),

            /*
             * -----------------------------------------------------
             *  ACF (Advanced Custom Fields) - Direct & Helper
             * -----------------------------------------------------
             *  Note: Requires ACF plugin installed & active.
             */
            // Direct ACF functions
            new TwigFunction('get_field', 'get_field'),
            new TwigFunction('the_field', 'the_field'),
            new TwigFunction('get_fields', 'get_fields'),
            new TwigFunction('get_field_object', 'get_field_object'),
            new TwigFunction('have_rows', 'have_rows'),
            new TwigFunction('the_row', 'the_row'),
            new TwigFunction('get_row_layout', 'get_row_layout'),
            new TwigFunction('get_sub_field', 'get_sub_field'),
            new TwigFunction('the_sub_field', 'the_sub_field'),

            // Twigit/ACF integration
            new TwigFunction('acf_field', ['Twigit\\Integration\\AcfIntegration', 'getField']),

            /*
             * -----------------------------------------------------
             *  Custom Image Processing (Twigit)
             * -----------------------------------------------------
             */
            new TwigFunction('resize_image', ['Twigit\\Image\\ImageProcessor', 'resize']),
            new TwigFunction('convert_to_webp', ['Twigit\\Image\\ImageProcessor', 'toWebP']),

            /*
             * -----------------------------------------------------
             *  Custom Menus & Widgets (Twigit)
             * -----------------------------------------------------
             */
            new TwigFunction('get_menu', ['Twigit\\MenuHelper', 'getMenu']),
            new TwigFunction('render_widget', ['Twigit\\WidgetHelper', 'render']),

            /*
             * -----------------------------------------------------
             *  Debug Functions
             * -----------------------------------------------------
             */
            new TwigFunction('var_dump', 'var_dump'),
            new TwigFunction('print_r', 'print_r'),
            new TwigFunction('dump', 'dump'),
        ];
    }
}
