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

use Exception;

class Template
{
    public static function resolveTemplate(\Twig\Environment $twig, array $context, array $templates = []): void
    {
        self::render($twig, $context, $templates);
    }

    /**
     * Renders the appropriate Twig template based on WordPress conditional tags.
     *
     * @param \Twig\Environment $twig      The Twig environment instance.
     * @param array             $context   The context data to pass to the template.
     * @param array             $templates Optional. An associative array mapping WordPress conditional functions
     *                                     to their corresponding Twig template filenames.
     *                                     Defaults to predefined mappings.
     *
     * @throws Exception If the selected template file does not exist.
     */
    public static function render(\Twig\Environment $twig, array $context, array $templates = []): void
    {
        $defaultTemplates = [
            'is_embed'             => 'embed.twig',
            'is_404'               => '404.twig',
            'is_search'            => 'search.twig',
            'is_front_page'        => 'front_page.twig',
            'is_home'              => 'home.twig',
            'is_privacy_policy'    => 'privacy_policy.twig',
            'is_post_type_archive' => 'post_type_archive.twig',
            'is_tax'               => 'taxonomy.twig',
            'is_attachment'        => 'attachment.twig',
            'is_single'            => 'single.twig',
            'is_page'              => 'page.twig',
            'is_category'          => 'category.twig',
            'is_tag'               => 'tag.twig',
            'is_author'            => 'author.twig',
            'is_date'              => 'date.twig',
            'is_archive'           => 'archive.twig',
        ];

        $templates = array_merge($defaultTemplates, $templates);

        $selectedTemplate = array_reduce(array_keys($templates), function ($selected, $condition) use ($templates) {
            if (\function_exists($condition) && $condition()) {
                return $templates[$condition];
            }

            return $selected;
        }, 'index.twig');

        try {
            $rendered = $twig->render($selectedTemplate, $context);
        } catch (Exception $e) {
			if (strpos($e->getMessage(), "directory does not exist")) {
                throw new \Exception("Templates directory does not exist: {$selectedTemplate}");
            } elseif (strpos($e->getMessage(), "to find template")) {
                throw new \Exception("Unable to find template: {$selectedTemplate}");
            } else {
                throw new \Exception($e->getMessage());
            }
        }

        echo $rendered;
    }
}
