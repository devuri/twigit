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

    public function __construct(string $appDirPath, array $options = [])
    {
        $this->twigEnvironment = (new TwigEnvironment($appDirPath, $options))->create();
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

    public static function init(string $appDirPath, array $options = []): self
    {
        return new self($appDirPath, $options);
    }

    public function action(): void
    {
        add_action('template_include', [$this, 'handleTemplate']);
    }

    public function handleTemplate(string $template): void
    {
        Template::resolveTemplate($this->twigEnvironment, self::getContext());
    }
}