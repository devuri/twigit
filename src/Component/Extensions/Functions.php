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

            // Additional WordPress utility functions
            new TwigFunction('get_permalink', 'get_permalink'),
            new TwigFunction('get_the_title', 'get_the_title'),
            new TwigFunction('get_the_excerpt', 'get_the_excerpt'),
            new TwigFunction('wp_nav_menu', 'wp_nav_menu'),
            new TwigFunction('comments_template', 'comments_template'),

            // Add utility functions for integration and queries
            new TwigFunction('acf_field', ['Twigit\\Integration\\AcfIntegration', 'getField']),
            new TwigFunction('post_query', ['Twigit\\Query\\PostQuery', 'getPosts']),
            new TwigFunction('resize_image', ['Twigit\\Image\\ImageProcessor', 'resize']),
            new TwigFunction('convert_to_webp', ['Twigit\\Image\\ImageProcessor', 'toWebP']),

            // Add functions for custom post types, taxonomies, menus, and widgets
            new TwigFunction('get_menu', ['Twigit\\MenuHelper', 'getMenu']),
            new TwigFunction('render_widget', ['Twigit\\WidgetHelper', 'render']),
        ];
    }
}
