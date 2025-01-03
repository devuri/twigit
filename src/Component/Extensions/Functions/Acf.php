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

class Acf implements FunctionsInterface
{
    use ExtensionsTrait;

    /**
     * ACF (Advanced Custom Fields) - Direct & Helper
     * Note: Requires ACF plugin installed & active.
     */
    public static function getFunctions(): array
    {
        return [
            self::maybeAdd('get_field'),
            self::maybeAdd('get_fields'),
            self::maybeAdd('get_field_object'),
            self::maybeAdd('have_rows'),
            self::maybeAdd('the_row'),
            self::maybeAdd('get_row_layout'),
            self::maybeAdd('get_sub_field'),

            // Twigit/ACF integration
            new TwigFunction('acf_field', [\Twigit\Integration\AcfIntegration::class, 'getField']),
        ];
    }
}
