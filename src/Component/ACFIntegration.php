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

class ACFIntegration
{
    public static function addFieldsToContext(array $context): array
    {
        if (\function_exists('get_fields')) {
            $context['fields'] = get_fields();
        }

        return $context;
    }
}
