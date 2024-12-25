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

class WidgetHelper
{
    public static function render($widgetId)
    {
        ob_start();
        the_widget($widgetId);

        return ob_get_clean();
    }
}
