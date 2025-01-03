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

class Utility implements FunctionsInterface
{
    /**
     * WordPress Core Utility Functions
     * (Titles, Content, Excerpts, Permalinks, etc.).
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('get_permalink', 'get_permalink'),
            new TwigFunction('get_the_title', 'get_the_title'),
            new TwigFunction('get_the_excerpt', 'get_the_excerpt'),
            new TwigFunction('get_the_content', 'get_the_content'),
            new TwigFunction('the_post_thumbnail', 'the_post_thumbnail'),
            new TwigFunction('get_the_post_thumbnail', 'get_the_post_thumbnail'),
            new TwigFunction('_e', '_e'),
            new TwigFunction('bloginfo', 'bloginfo'),
            new TwigFunction('get_bloginfo', 'get_bloginfo'),
            new TwigFunction('get_option', 'get_option'),
        ];
    }
}
