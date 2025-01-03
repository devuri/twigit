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

class Functions extends AbstractExtension
{
    public function getFunctions(): array
    {
        return array_merge(
            /*
             * -----------------------------------------------------
             *  WordPress Core URL & Theme Hook Functions
             * -----------------------------------------------------
             */
            Functions\Core::getFunctions(),

            /*
             * -----------------------------------------------------
             *  Theme Directory & Asset URLs
             * -----------------------------------------------------
             */
            Functions\DirectoryAsset::getFunctions(),

            /*
             * -----------------------------------------------------
             *  WordPress Core Utility Functions
             *  (Titles, Content, Excerpts, Permalinks, etc.)
             * -----------------------------------------------------
             */
            Functions\Utility::getFunctions(),

            /*
             * -----------------------------------------------------
             *  The WordPress Loop (Typically used in PHP,
             *  but included for completeness in Twig)
             * -----------------------------------------------------
             */
            Functions\Loops::getFunctions(),

            /*
             * -----------------------------------------------------
             *  Comments, Menus, Widgets, Sidebars
             * -----------------------------------------------------
             */
            Functions\MenusWidgets::getFunctions(),

            /*
             * -----------------------------------------------------
             *  Attachment & Media Functions
             * -----------------------------------------------------
             */
            Functions\Attachment::getFunctions(),

            /*
             * -----------------------------------------------------
             *  Query & Post Retrieval
             * -----------------------------------------------------
             */
            Functions\Query::getFunctions(),

            /*
             * -----------------------------------------------------
             *  WordPress Conditional Tags
             * -----------------------------------------------------
             */
            Functions\Conditionals::getFunctions(),

            /*
             * -----------------------------------------------------
             *  Taxonomies & Terms
             * -----------------------------------------------------
             */
            Functions\Taxonomy::getFunctions(),

            /*
             * -----------------------------------------------------
             *  ACF (Advanced Custom Fields) - Direct & Helper
             * -----------------------------------------------------
             *  Note: Requires ACF plugin installed & active.
             */
            Functions\Acf::getFunctions(),

            /*
             * -----------------------------------------------------
             *  Custom Image Processing (Twigit)
             * -----------------------------------------------------
             */
            Functions\Image::getFunctions(),

            /*
             * -----------------------------------------------------
             *  Debug Functions
             * -----------------------------------------------------
             */
            Functions\Debug::getFunctions()
        );
    }
}
