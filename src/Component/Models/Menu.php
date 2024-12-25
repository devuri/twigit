<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Models;

class Menu
{
    public static function getMenu(string $location): array
    {
        $locations = get_nav_menu_locations();
        if ( ! isset($locations[$location])) {
            return [];
        }

        $menu = wp_get_nav_menu_items($locations[$location]);

        return array_map(function ($item) {
            return [
                'title' => $item->title,
                'url' => $item->url,
            ];
        }, $menu);
    }
}
