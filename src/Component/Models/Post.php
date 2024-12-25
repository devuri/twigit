<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Models;

use WP_Post;

class Post
{
    public $ID;
    public $title;
    public $content;
    public $permalink;

    public function __construct(WP_Post $post)
    {
        $this->ID = $post->ID;
        $this->title = $post->post_title;
        $this->content = apply_filters('the_content', $post->post_content);
        $this->permalink = get_permalink($post);
    }

    public static function fromID($id): self
    {
        return new self(get_post($id));
    }
}
