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

class Twigit
{
    private \Twig\Environment $twigEnvironment;
    protected static array $templates;

    public function __construct(string $appDirPath, array $options = [], $templates = [])
    {
		self::$templates = $templates;
        $this->twigEnvironment = (new TwigEnvironment($appDirPath, $options))->create();
    }

    public function twig(): ?\Twig\Environment
    {
        return $this->twigEnvironment;
    }

    public function render(string $template, array $context = []): string
    {
        $context = array_merge(self::getContext(), $context);

        return $this->twigEnvironment->render($template, $context);
    }

    public static function getContext(): array
    {
        $context = Context::init()->get();

        $context = ACFIntegration::addFieldsToContext($context);

        return apply_filters('twigit_context', $context);
    }

    public static function init(string $appDirPath, array $options = [], $templates = []): self
    {
        return new self($appDirPath, $options, $templates);
    }

    public function templateFilter(): void
    {
        add_filter('template_include', [$this, 'handleTemplate']);
    }

    public function handleTemplate(string $template): void
    {
        Template::resolveTemplate($this->twigEnvironment, self::getContext(), self::$templates);
    }
}
