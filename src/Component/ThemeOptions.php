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

class ThemeOptions
{
    public static function getOptions(): array
    {
        $options = [];
        $customizer_settings = apply_filters('twigit_customizer_settings', []);
        foreach ($customizer_settings as $setting) {
            $options[$setting] = get_theme_mod($setting);
        }

        return $options;
    }
}
