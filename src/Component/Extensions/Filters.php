<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Filters extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('excerpt', [$this, 'getExcerpt']),
            new TwigFilter('capitalize', 'ucfirst'),

            // Add WordPress sanitization functions as filters
            new TwigFilter('esc_html', 'esc_html'),
            new TwigFilter('esc_attr', 'esc_attr'),
            new TwigFilter('esc_url', 'esc_url'),
            new TwigFilter('esc_textarea', 'esc_textarea'),

            // Additional sanitization functions
            new TwigFilter('sanitize_title', 'sanitize_title'),
            new TwigFilter('sanitize_email', 'sanitize_email'),
            new TwigFilter('sanitize_file_name', 'sanitize_file_name'),
            new TwigFilter('sanitize_text_field', 'sanitize_text_field'),
            new TwigFilter('wp_kses_post', 'wp_kses_post'),

            // Add URL and text helper filters
            new TwigFilter('striptags', 'strip_tags'),
            new TwigFilter('wp_trim_words', 'wp_trim_words'),
            new TwigFilter('esc_url_raw', 'esc_url_raw'),
            new TwigFilter('wpautop', 'wpautop'),
        ];
    }

    public function getExcerpt($content, $length = 50): string
    {
        return wp_trim_words($content, $length);
    }
}
