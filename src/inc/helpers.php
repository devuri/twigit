<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 /**
  * Initializes and returns a Twig environment instance.
  *
  * This function configures and initializes a Twig environment using the specified base directory
  * path and environment options. It looks for templates within the `templates` subdirectory of the
  * application directory defined by the `$dirPath` parameter.
  *
  * ### Directory Path:
  * - The `$dirPath` parameter represents the base path of your application. For example, if your app's root is
  *   `mysite/public`, the base directory would be `mysite`. Twigit will look for templates within the `templates`
  *   subdirectory at `$dirPath/templates`.
  * - If the `templates` directory does not exist, Twigit will throw an exception. The directory can be empty, as
  *   Twigit will fall back to the default templates included with the package, but it must be present.
  *
  * ### Environment Options:
  * The `$options` parameter allows customization of the Twig environment behavior. Common options include:
  * - `'cache'`: Specify a directory path for caching compiled templates (e.g., `'cache' => '/path/to/cache'`).
  * - `'debug'`: Enable or disable debug mode (e.g., `'debug' => true`).
  *
  * For a complete list of available options, refer to the official Twig documentation.
  *
  * ### Templates:
  * The `$templates` parameter allows the addition of custom conditional checks mapped to specific Twig templates.
  * For example:
  * ```php
  * ['is_single' => 'custom-single.twig']
  * ```
  * These templates extend or override default template mapping, offering powerful customization options.
  *
  * @link https://twig.symfony.com/doc/3.x/api.html#environment-options Official Twig Environment Documentation.
  * @see  https://github.com/twigphp/Twig/blob/3.x/src/Environment.php#L112 Twig Environment Source Code.
  *
  * @param string $dirPath   Required. Base path to the application directory. Twigit will look for templates
  *                          in the `templates` subdirectory at `$dirPath/templates`.
  * @param array  $options   Optional. An associative array of environment options for Twig. Default is an empty array.
  *                          Examples include `'cache' => '/path/to/cache'` or `'debug' => true`.
  * @param array  $templates Optional. An associative array mapping conditional checks to Twig templates. Default is an empty array.
  *                          For example, `['is_page' => 'page-custom.twig']`.
  *
  * @throws Exception If the `templates` directory does not exist or if an error occurs while initializing the Twig loader.
  *
  * @return Twigit\Twigit The initialized Twig environment instance.
  */
 function twg(string $dirPath, array $options = [], array $templates = []): Twigit\Twigit
 {
     // Ensure the base directory and templates directory are correctly defined.
     // The `templates` directory must exist at `$dirPath/templates` for Twigit to work as expected.
     return Twigit\Twigit::init($dirPath, $options, $templates);
 }
