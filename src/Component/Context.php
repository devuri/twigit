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

class Context
{
    private static ?Context $instance = null;
    private array $cache = [];

    protected function __construct()
    {
        $this->initializeCache();
    }

    public static function init(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get(?string $key = null): array
    {
        if (null !== $key) {
            return $this->cache['context'][$key] ?? [];
        }

        return $this->cache['context'];
    }

    public function resetCache(): void
    {
        $this->initializeCache();
    }

    protected function initializeCache(): void
    {
        $this->cache['context'] = [
            'site' => $this->getSiteInfo(),
            'user' => $this->getUserInfo(),
            'menu' => $this->getMenuInfo(),
            'page' => $this->getPageInfo(),
            'post' => $this->getPostInfo(),
            'archive' => $this->getArchiveInfo(),
            'search_query' => $this->getSearchQuery(),
            'search_results' => $this->getSearchResults(),
            'taxonomy' => $this->getTaxonomyInfo(),
            'date' => $this->getDateInfo(),
            'author' => $this->getAuthorInfo(),
        ];
    }

    protected function getSiteInfo(): array
    {
        return [
            'url' => home_url(),
            'site_url' => get_site_url(),
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
            'theme_url' => get_template_directory_uri(),
            'current_user' => wp_get_current_user(),
            'is_logged_in' => is_user_logged_in(),
            'pagination' => Pagination::getPaginationLinks(),
            'options' => ThemeOptions::getOptions(),

			// header info
			'language_attributes' => get_language_attributes(),
			'content-type' => get_bloginfo('html_type'),
			'charset' => get_bloginfo('charset'),
			'wp_get_document_title' => wp_get_document_title(),
			'stylesheet_url' => get_bloginfo('stylesheet_url'),
			'body_class' => [$this, 'get_body_class'],
        ];
    }

	private function get_body_class()
	{
		return 'class="' . esc_attr( implode( ' ', get_body_class( $css_class ) ) ) . '"';
	}

    protected function getUserInfo(): array
    {
        return is_user_logged_in() ? [
            'name' => wp_get_current_user()->display_name,
            'email' => wp_get_current_user()->user_email,
            'logged_in' => true,
        ] : [
            'logged_in' => false,
        ];
    }

    protected function getMenuInfo(): array
    {
        return wp_get_nav_menu_items('primary') ?: [];
    }

    protected function getPageInfo(): ?array
    {
        if ( ! is_page()) {
            return null;
        }

        return [
            'title' => get_the_title(),
            'content' => apply_filters('the_content', get_post_field('post_content')),
            'id' => get_the_ID(),
        ];
    }

    protected function getPostInfo(): ?array
    {
        if ( ! is_single()) {
            return null;
        }

        return [
            'title' => get_the_title(),
            'content' => apply_filters('the_content', get_post_field('post_content')),
            'author' => [
                'name' => get_the_author(),
                'url' => get_author_posts_url((int) get_the_author_meta('ID')),
            ],
            'date' => get_the_date(),
            'categories' => get_the_category(),
            'tags' => get_the_tags(),
        ];
    }

    protected function getArchiveInfo(): ?array
    {
        if ( ! is_archive()) {
            return null;
        }

        return [
            'title' => get_the_archive_title(),
            'description' => get_the_archive_description(),
            'posts' => $this->getPosts(['posts_per_page' => 10]),
        ];
    }

    protected function getSearchQuery(): ?string
    {
        return is_search() ? get_search_query() : null;
    }

    protected function getSearchResults(): ?array
    {
        if ( ! is_search()) {
            return null;
        }

        return $this->getPosts(['s' => get_search_query(), 'posts_per_page' => 10]);
    }

    protected function getTaxonomyInfo(): ?array
    {
        if ( ! (is_category() || is_tag() || is_tax())) {
            return null;
        }

        return [
            'name' => single_term_title('', false),
            'description' => term_description(),
            'posts' => $this->getPosts(['posts_per_page' => 10]),
        ];
    }

    protected function getDateInfo(): ?array
    {
        if ( ! is_date()) {
            return null;
        }

        return [
            'year' => get_query_var('year'),
            'month' => get_query_var('monthnum'),
            'day' => get_query_var('day'),
            'posts' => $this->getPosts(['posts_per_page' => 10]),
        ];
    }

    protected function getAuthorInfo(): ?array
    {
        if ( ! is_author()) {
            return null;
        }

        return [
            'name' => get_the_author(),
            'bio' => get_the_author_meta('description'),
            'posts' => $this->getPosts(['author' => get_the_author_meta('ID'), 'posts_per_page' => 10]),
        ];
    }

    protected function getPosts(array $args): array
    {
        return array_map(function ($post) {
            return [
                'title' => get_the_title($post),
                'url' => get_permalink($post),
                'excerpt' => get_the_excerpt($post),
            ];
        }, get_posts($args));
    }
}
