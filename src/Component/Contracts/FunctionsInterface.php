<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Contracts;

use Twig\TwigFunction;

interface FunctionsInterface
{
    /**
     * Returns an array of TwigFunction instances.
     *
     * @return TwigFunction[]
     */
    public static function getFunctions(): array;
}
