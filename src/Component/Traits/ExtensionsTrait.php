<?php

/*
 * This file is part of the Twigit package.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twigit\Traits;

use Twig\TwigFunction;

trait ExtensionsTrait
{
    /**
     * Creates a TwigFunction for the given function name, if it exists.
     *
     * @param string $function The name of the function to wrap.
     *
     * @return TwigFunction The created TwigFunction.
     */
    public static function maybeAdd(string $function): TwigFunction
    {
        if ( ! \function_exists($function)) {
            return new TwigFunction($function, function () use ($function) {
                return \sprintf('Function "%s" is undefined.', $function);
            });
        }

        return new TwigFunction($function, $function);
    }

    /**
     * Example of another potential helper method for TwigFunction creation.
     * This could be used for creating TwigFunctions with a predefined closure.
     *
     * @param string   $name     The name of the Twig function.
     * @param callable $callback The function to execute when the Twig function is called.
     *
     * @return TwigFunction
     */
    public static function createStaticFunction(string $name, callable $callback): TwigFunction
    {
        return new TwigFunction($name, $callback);
    }
}
