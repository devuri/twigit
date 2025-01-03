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

class Taxonomy implements FunctionsInterface
{
    /**
     * Taxonomies & Terms.
     *
     * @return array
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('get_terms', 'get_terms'),
            new TwigFunction('get_term_link', 'get_term_link'),
            new TwigFunction('get_the_category', 'get_the_category'),
            new TwigFunction('the_category', 'the_category'),
        ];
    }
}
