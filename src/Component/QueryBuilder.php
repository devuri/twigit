<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit;

use WP_Query;

class QueryBuilder
{
    public static function query(array $args): array
    {
        $query = new WP_Query($args);

        return array_map(fn ($post) => new Models\Post($post), $query->posts);
    }
}
