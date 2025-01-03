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
use Twigit\Traits\ExtensionsTrait;

class Debug implements FunctionsInterface
{
    use ExtensionsTrait;

    /**
     * Debug Functions.
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('var_dump', 'var_dump'),
            new TwigFunction('print_r', 'print_r'),
            self::maybeAdd('dump'),
        ];
    }
}
