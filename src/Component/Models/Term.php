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

use WP_Term;

class Term
{
    public $ID;
    public $name;
    public $slug;
    public $description;

    public function __construct(WP_Term $term)
    {
        $this->ID = $term->term_id;
        $this->name = $term->name;
        $this->slug = $term->slug;
        $this->description = $term->description;
    }

    public static function fromID($id): self
    {
        return new self(get_term($id));
    }
}
