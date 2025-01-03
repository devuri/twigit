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

class Query implements FunctionsInterface
{
    /**
     * Query & Post Retrieval.
     */
    public static function getFunctions(): array
    {
        return [
            // Built-in WordPress query functions
            new TwigFunction('get_posts', 'get_posts'),
            new TwigFunction('get_post', 'get_post'),
            // Custom Twigit Query function
            new TwigFunction('post_query', [\Twigit\Query\PostQuery::class, 'getPosts']),
        ];
    }
}
