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

class Attachment implements FunctionsInterface
{
    /**
     * Attachment & Media Functions.
     *
     * @return array
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('wp_get_attachment_image_src', 'wp_get_attachment_image_src'),
            new TwigFunction('wp_get_attachment_metadata', 'wp_get_attachment_metadata'),
            new TwigFunction('wp_get_attachment_url', 'wp_get_attachment_url'),
        ];
    }
}
