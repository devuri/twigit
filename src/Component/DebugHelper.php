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

class DebugHelper
{
    public static function debugContext(array $context): void
    {
        if (\defined('WP_DEBUG') && WP_DEBUG) {
            echo '<pre>' . print_r($context, true) . '</pre>';
        }
    }
}
