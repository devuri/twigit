<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Cache;

class CacheManager
{
    public static function get($key)
    {
        return wp_cache_get($key);
    }

    public static function set($key, $value, $group = '', $expire = 3600): void
    {
        wp_cache_set($key, $value, $group, $expire);
    }

    public static function delete($key, $group = ''): void
    {
        wp_cache_delete($key, $group);
    }

    public static function clearGroup($group): void
    {
        wp_cache_flush_group($group);
    }
}
