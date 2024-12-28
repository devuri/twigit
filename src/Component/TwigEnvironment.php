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
use Twig\Loader\FilesystemLoader;
use Twigit\Extensions\Filters;
use Twigit\Extensions\Functions;

class TwigEnvironment
{
    private array $envOptions;
    private string $appDirPath;
    private string $templatesDir;
    private string $coreTemplatesDir;
    private \Twig\Environment $twig;

    public function __construct(string $appDirPath, array $options = [], ?string $tenantID = null)
    {
        $this->appDirPath = $appDirPath;
        $this->templatesDir = $this->setTemplatesDir($tenantID);
        $this->coreTemplatesDir = \dirname(__DIR__) . '/templates';
        $cached = self::debugMode() ? false : $this->appDirPath . '/cache/twigit';

        $this->envOptions = array_merge([
            'autoescape' => 'html', // use false to disable but be careful
            'cache' => $cached,
            'debug' => self::debugMode(),
        ], $options);
    }

    public static function debugMode(): bool
    {
        return \defined('WP_DEBUG') && true === \constant('WP_DEBUG');
    }

    /**
     * Creates and returns a Twig environment instance.
     *
     * @throws Exception If the templates directory does not exist or if there is an error
     *                   initializing the Twig loader.
     *
     * @return \Twig\Environment The initialized Twig environment instance.
     */
    public function create(): \Twig\Environment
    {
        $this->validateTemplatesDirectory($this->templatesDir);

        try {
            $loader = new FilesystemLoader([$this->templatesDir, $this->coreTemplatesDir]);
            // $loader->addPath($this->coreTemplatesDir, 'kiosk');
        } catch (Exception $e) {
            exit($e);
        }

        $this->twig = new \Twig\Environment($loader, $this->getEnvironmentOptions());

        $this->registerExtensions();

        return $this->twig;
    }

    public function getEnvironment(): \Twig\Environment
    {
        return $this->twig;
    }

    public function registerExtensions(): \Twig\Environment
    {
        $this->twig->addExtension(new Functions());
        $this->twig->addExtension(new Filters());

        return $this->twig;
    }

    /**
     * Sets the directory path for templates based on the provided tenant ID.
     *
     * This method determines the appropriate directory path for templates.
     * If a tenant ID is provided, the method appends it to the templates directory path.
     * Otherwise, it defaults to the main templates directory.
     *
     * @param null|string $tenantID Optional. The tenant ID to specify a subdirectory in the templates directory.
     *                              If null, the main templates directory path is returned.
     *
     * @return string The resolved path to the templates directory, with or without a tenant-specific subdirectory.
     */
    private function setTemplatesDir(?string $tenantID = null): string
    {
        if ($tenantID) {
            $templatesdir = "{$this->appDirPath}/templates/{$tenantID}";
        }

        $templatesdir = "{$this->appDirPath}/templates";

        if (!$this->validateTemplatesDirectory($templatesdir, false)) {
            if (!mkdir($templatesdir, 0777, true)) {
                throw new Exception("Failed to create `templates` directory");
            }
        }

        return $templatesdir;
    }

    /**
     * Validates that the templates directory exists.
     *
     * @throws Exception If the templates directory does not exist.
     */
    private function validateTemplatesDirectory(string $templatesDir, bool $withException = true): bool
    {

        $isValidDirectory = is_dir($templatesDir);

        if ( ! $isValidDirectory && $withException ) {
            throw new Exception("Templates directory does not exist: {$templatesDir}");
        }

        return $isValidDirectory;
    }

    /**
     * Returns the environment options for Twig.
     *
     * @return array The Twig environment options.
     */
    private function getEnvironmentOptions(): array
    {
        return $this->envOptions;
    }
}
