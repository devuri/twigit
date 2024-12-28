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
    /**
     * Shortcut method to resolve and render the template.
     */
    public static function resolveTemplate(\Twig\Environment $twig, array $context, array $templates = []): void
    {
        self::render($twig, $context, $templates);
    }

    /**
     * Renders the appropriate Twig template based on WordPress conditional tags.
     *
     * @throws \Exception If the selected template file does not exist.
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

        $templates       = array_merge($defaultTemplates, $templates);
        $postItem        = self::getPost();
        $loader          = $twig->getLoader();
		$context['item'] = $postItem;
        $selectedTemplate = self::selectTemplate($templates, $postItem, $loader);

        self::tryRenderTemplate($twig, $selectedTemplate, $context);
    }

    /**
     * Determine the final template name to be used, using array_reduce to check WordPress conditionals.
     */
    protected static function selectTemplate(array $templates, ?\WP_Post $post, \Twig\Loader\FilesystemLoader $loader): string
    {
        return array_reduce(
            array_keys($templates),
            function ($selected, $condition) use ($templates, $post, $loader) {
                if (\function_exists($condition) && $condition()) {
                    // Special handling for is_page slug
                    if ($condition === 'is_page' && isset($post->post_name)) {
                        $pageTemplate = "{$post->post_name}.twig";
                        if (self::templateExists($loader, $pageTemplate)) {
                            return $pageTemplate;
                        }
                    }
                    return $templates[$condition];
                }
                return $selected;
            },
            'index.twig'
        );
    }

    /**
     * Attempts to render the selected Twig template and echoes the output.
     *
     * @throws \Exception If the template cannot be found or any Twig error occurs.
     */
    protected static function tryRenderTemplate(\Twig\Environment $twig, string $selectedTemplate, array $context): void
    {
        try {
            echo $twig->render($selectedTemplate, $context);
        } catch (\Exception $e) {
            // Check if the exception message indicates a missing template.
            if (strpos($e->getMessage(), 'to find template') !== false) {
                throw new \Exception("Unable to find template: {$selectedTemplate}");
            }
            throw $e;
        }
    }

    /**
     * Checks if a template file exists within the first path from Twig's FilesystemLoader.
     */
    protected static function templateExists(\Twig\Loader\FilesystemLoader $loader, string $file): bool
    {
        return file_exists($loader->getPaths()[0] . "/{$file}");
    }

    /**
     * Retrieves the global $post object.
     */
    protected static function getPost(): ?\WP_Post
    {
        global $post;
        return sanitize_post($post);
    }
}
