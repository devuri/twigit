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

class Conditionals implements FunctionsInterface
{
    /**
     * WordPress Conditional Tags.
     *
     * @return array
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('is_singular', 'is_singular'),
            new TwigFunction('is_archive', 'is_archive'),
            new TwigFunction('is_home', 'is_home'),
            new TwigFunction('is_page', 'is_page'),
            new TwigFunction('is_category', 'is_category'),
        ];
    }
}
