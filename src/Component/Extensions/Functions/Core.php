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

class Core implements FunctionsInterface
{
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('site_url', 'get_site_url'),
            new TwigFunction('home_url', 'get_home_url'),
            new TwigFunction('wp_head', 'wp_head'),
            new TwigFunction('wp_footer', 'wp_footer'),
            new TwigFunction('wp_body_open', 'wp_body_open'),
            new TwigFunction('body_class', 'body_class'),
        ];
    }
}
