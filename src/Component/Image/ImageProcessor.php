<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Image;

class ImageProcessor
{
    public static function resize($id, $width, $height, $crop = true): ?string
    {
        $image = wp_get_attachment_image_src($id, [$width, $height], $crop);

        return $image ? $image[0] : null;
    }

    public static function toWebP($id): ?string
    {
        // Example placeholder implementation for converting to WebP
        return self::resize($id, null, null, false);
    }
}
