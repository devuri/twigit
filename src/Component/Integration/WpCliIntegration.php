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

use WP_CLI;

class WpCliIntegration
{
    public static function registerCommands(): void
    {
        if (\defined('WP_CLI') && WP_CLI) {
            // @phpstan-ignore-next-line
            WP_CLI::add_command('twigit', function (): void {
                // @phpstan-ignore-next-line
                WP_CLI::success('Twigit command executed.');
            });
        }
    }
}
