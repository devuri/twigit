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

class Loops implements FunctionsInterface
{
    /**
     * The WordPress Loop (Typically used in PHP, but included for completeness in Twig).
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('have_posts', 'have_posts'),
            new TwigFunction('the_post', 'the_post'),
        ];
    }
}
