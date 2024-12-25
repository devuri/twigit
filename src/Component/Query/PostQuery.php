<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Query;

use WP_Query;

class PostQuery
{
    public static function getPosts(array $args = []): array
    {
        $query = new WP_Query($args);

        return array_map(function ($post) {
            return new \Twigit\Models\Post($post);
        }, $query->posts);
    }
}
