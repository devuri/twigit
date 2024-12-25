<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Integration;

class AcfIntegration
{
    public static function getField($fieldName, $postId = null)
    {
        return \function_exists('get_field') ? get_field($fieldName, $postId) : null;
    }

    public static function addFieldsToContext(array $context, $postId = null): array
    {
        if (\function_exists('get_fields')) {
            $context['acf'] = get_fields($postId);
        }

        return $context;
    }
}
