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
            new TwigFunction('site_url', 'get_site_url'),
            new TwigFunction('home_url', 'get_home_url'),
            new TwigFunction('wp_head', 'wp_head'),
            new TwigFunction('body_class', 'body_class'),
            new TwigFunction('wp_body_open', 'wp_body_open'),
            new TwigFunction('wp_footer', 'wp_body_open'),

            // Additional WordPress utility functions
            new TwigFunction('get_permalink', 'get_permalink'),
            new TwigFunction('get_the_title', 'get_the_title'),
            new TwigFunction('get_the_excerpt', 'get_the_excerpt'),
            new TwigFunction('wp_nav_menu', 'wp_nav_menu'),
            new TwigFunction('comments_template', 'comments_template'),
            new TwigFunction('_e', '_e'),

            // Add utility functions for integration and queries
            new TwigFunction('acf_field', ['Twigit\\Integration\\AcfIntegration', 'getField']),
            new TwigFunction('post_query', ['Twigit\\Query\\PostQuery', 'getPosts']),
            new TwigFunction('resize_image', ['Twigit\\Image\\ImageProcessor', 'resize']),
            new TwigFunction('convert_to_webp', ['Twigit\\Image\\ImageProcessor', 'toWebP']),

            // Add functions for custom post types, taxonomies, menus, and widgets
            new TwigFunction('get_menu', ['Twigit\\MenuHelper', 'getMenu']),
            new TwigFunction('render_widget', ['Twigit\\WidgetHelper', 'render']),

            // debug
            new TwigFunction('var_dump', 'var_dump'),
            new TwigFunction('print_r', 'print_r'),
            new TwigFunction('dump', 'dump'),
        ];
    }
}
