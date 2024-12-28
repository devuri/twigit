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
use WP_Post;

class Template
{
    private \Twig\Environment $twig;

    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Shortcut method to resolve and render the template.
     */
    public function resolve(array $context, array $templates = []): void
    {
        $this->render($context, $templates);
    }

    /**
     * Shortcut method to resolve and render the template.
     */
    public function view(array $context, array $templates = []): void
    {
        $this->render($context, $templates);
    }

    /**
     * Renders the appropriate Twig template based on WordPress conditional tags.
     *
     * @throws Exception If the selected template file does not exist.
     */
    public function render(array $context, array $templates = []): void
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
        $postItem        = $this->getPost();
        // @phpstan-ignore-next-line
        $loaderPath      = $this->twig->getLoader()->getPaths();
        $context['item'] = $postItem;
        $selectedTemplate = $this->selectTemplate($templates, $postItem, $loaderPath);

        $this->tryRenderTemplate($selectedTemplate, $context);
    }

    /**
     * Determine the final template name to be used, using array_reduce to check WordPress conditionals.
     */
    protected function selectTemplate(array $templates, ?WP_Post $post, array $loaderPath): string
    {
        return array_reduce(
            array_keys($templates),
            function ($selected, $condition) use ($templates, $post, $loaderPath) {
                if (\function_exists($condition) && $condition()) {
                    // Special handling for is_page slug
                    if ('is_page' === $condition && isset($post->post_name)) {
                        $pageTemplate = "{$post->post_name}.twig";
                        if ($this->templateExists($loaderPath, $pageTemplate)) {
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
     * @throws Exception If the template cannot be found or any Twig error occurs.
     */
    protected function tryRenderTemplate(string $selectedTemplate, array $context): void
    {
        try {
            echo $this->twig->render($selectedTemplate, $context);
        } catch (Exception $e) {
            // Check if the exception message indicates a missing template.
            if (false !== strpos($e->getMessage(), 'to find template')) {
                throw new Exception("Unable to find template: {$selectedTemplate}");
            }

            throw $e;
        }
    }

    /**
     * Checks if a template file exists within the first path from Twig's FilesystemLoader.
     *
     * @param array  $loaderPath The paths to the templates
     * @param string $file       the template file like `page.twig`
     *
     * @return bool
     */
    protected function templateExists(array $loaderPath, string $file): bool
    {
        return file_exists($loaderPath[0] . "/{$file}");
    }

    /**
     * Retrieves the global $post object.
     */
    protected function getPost(): ?WP_Post
    {
        global $post;

        return sanitize_post($post);
    }
}
