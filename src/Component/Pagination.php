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

class Pagination
{
    public static function getPaginationLinks(): array
    {
        global $wp_query;

        return [
            'next' => get_next_posts_link('Older Posts', $wp_query->max_num_pages),
            'prev' => get_previous_posts_link('Newer Posts'),
        ];
    }
}
