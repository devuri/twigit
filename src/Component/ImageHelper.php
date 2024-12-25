<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit;

class ImageHelper
{
    public static function getImage($id, $size = 'thumbnail'): ?array
    {
        $image = wp_get_attachment_image_src($id, $size);
        if ($image) {
            return [
                'url' => $image[0],
                'width' => $image[1],
                'height' => $image[2],
            ];
        }

        return null;
    }

    public static function getAltText($id): ?string
    {
        return get_post_meta($id, '_wp_attachment_image_alt', true);
    }
}
