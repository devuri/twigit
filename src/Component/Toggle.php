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

class Toggle
{
    private const OPTION_NAME = 'twigit_enabled';

    public function __construct()
    {
    }

    public function register(): void
    {
        add_action('admin_menu', [$this, 'settingsPage']);
        add_action('admin_init', [$this, 'twigitGroup']);
    }

    public function settingsPage(): void
    {
        add_options_page(
            'Twigit Settings',
            'Twigit',
            'manage_options',
            'twigit-settings',
            [$this, 'renderPage']
        );
    }

    public function twigitGroup(): void
    {
        register_setting('twigit_settings_group', self::OPTION_NAME, [
            'type' => 'boolean',
            'description' => 'Enable or disable Twigit.',
            'sanitize_callback' => 'rest_sanitize_boolean',
            'default' => false,
        ]);

        add_settings_section(
            'twigit_main_section',
            'Twigit Settings',
            null,
            'twigit-settings'
        );

        add_settings_field(
            'twigit_enable_field',
            'Enable Twigit',
            [$this, 'renderField'],
            'twigit-settings',
            'twigit_main_section'
        );
    }

    public function renderPage(): void
    {
        ?>
        <div class="wrap">
            <h1>Twigit Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('twigit_settings_group');
        do_settings_sections('twigit-settings');
        submit_button();
        ?>
            </form>
        </div>
        <?php
    }

    public function renderField(): void
    {
        $value = get_option(self::OPTION_NAME, false);
        ?>
        <input type="checkbox" name="<?php echo esc_attr(self::OPTION_NAME); ?>" value="1" <?php checked($value, true); ?>>
        <label for="<?php echo esc_attr(self::OPTION_NAME); ?>">Enable Twigit</label>
        <?php
    }
}
