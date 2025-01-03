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

class DirectoryAsset implements FunctionsInterface
{
    /**
     * Theme Directory & Asset URLs.
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('get_stylesheet_directory_uri', 'get_stylesheet_directory_uri'),
            new TwigFunction('get_template_directory_uri', 'get_template_directory_uri'),
        ];
    }
}
