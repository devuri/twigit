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

class Image implements FunctionsInterface
{
    use ExtensionsTrait;

    /**
     * Custom Image Processing (Twigit).
     */
    public static function getFunctions(): array
    {
        return [
            new TwigFunction('resize_image', [\Twigit\Image\ImageProcessor::class, 'resize']),
            new TwigFunction('convert_to_webp', [\Twigit\Image\ImageProcessor::class, 'toWebP']),
        ];
    }
}
