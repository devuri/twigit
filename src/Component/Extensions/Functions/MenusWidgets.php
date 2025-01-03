<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Extensions\Functions;

use Twig\TwigFunction;
use Twigit\Contracts\FunctionsInterface;

class MenusWidgets implements FunctionsInterface
{
    /**
     * Comments, Menus, Widgets, Sidebars.
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('wp_nav_menu', 'wp_nav_menu'),
            new TwigFunction('comments_template', 'comments_template'),
            new TwigFunction('dynamic_sidebar', 'dynamic_sidebar'),
            new TwigFunction('is_active_sidebar', 'is_active_sidebar'),

            /*
             * -----------------------------------------------------
             *  Custom Menus & Widgets (Twigit)
             * -----------------------------------------------------
             */
            new TwigFunction('get_menu', [\Twigit\MenuHelper::class, 'getMenu']),
            new TwigFunction('render_widget', [\Twigit\WidgetHelper::class, 'render']),
        ];
    }
}
