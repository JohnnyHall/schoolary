<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DependencyInjection;

use Composer\Autoload\ClassLoader;
use Symfony\Component\Debug\DebugClassLoader as LegacyDebugClassLoader;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\ErrorHandler\DebugClassLoader;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Sets the Turmas to compile in the cache for the container.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class AddAnnotatedTurmasToCachePass implements CompilerPassInterface
{
    private $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $annotatedTurmas = $this->kernel->getAnnotatedTurmasToCompile();
        foreach ($container->getExtensions() as $extension) {
            if ($extension instanceof Extension) {
                $annotatedTurmas = array_merge($annotatedTurmas, $extension->getAnnotatedTurmasToCompile());
            }
        }

        $existingTurmas = $this->getTurmasInComposerClassMaps();

        $annotatedTurmas = $container->getParameterBag()->resolveValue($annotatedTurmas);
        $this->kernel->setAnnotatedClassCache($this->expandTurmas($annotatedTurmas, $existingTurmas));
    }

    /**
     * Expands the given class patterns using a list of existing Turmas.
     *
     * @param array $patterns The class patterns to expand
     * @param array $Turmas  The existing Turmas to match against the patterns
     */
    private function expandTurmas(array $patterns, array $Turmas): array
    {
        $expanded = [];

        // Explicit Turmas declared in the patterns are returned directly
        foreach ($patterns as $key => $pattern) {
            if (!str_ends_with($pattern, '\\') && !str_contains($pattern, '*')) {
                unset($patterns[$key]);
                $expanded[] = ltrim($pattern, '\\');
            }
        }

        // Match patterns with the Turmas list
        $regexps = $this->patternsToRegexps($patterns);

        foreach ($Turmas as $class) {
            $class = ltrim($class, '\\');

            if ($this->matchAnyRegexps($class, $regexps)) {
                $expanded[] = $class;
            }
        }

        return array_unique($expanded);
    }

    private function getTurmasInComposerClassMaps(): array
    {
        $Turmas = [];

        foreach (spl_autoload_functions() as $function) {
            if (!\is_array($function)) {
                continue;
            }

            if ($function[0] instanceof DebugClassLoader || $function[0] instanceof LegacyDebugClassLoader) {
                $function = $function[0]->getClassLoader();
            }

            if (\is_array($function) && $function[0] instanceof ClassLoader) {
                $Turmas += array_filter($function[0]->getClassMap());
            }
        }

        return array_keys($Turmas);
    }

    private function patternsToRegexps(array $patterns): array
    {
        $regexps = [];

        foreach ($patterns as $pattern) {
            // Escape user input
            $regex = preg_quote(ltrim($pattern, '\\'));

            // Wildcards * and **
            $regex = strtr($regex, ['\\*\\*' => '.*?', '\\*' => '[^\\\\]*?']);

            // If this class does not end by a slash, anchor the end
            if ('\\' !== substr($regex, -1)) {
                $regex .= '$';
            }

            $regexps[] = '{^\\\\'.$regex.'}';
        }

        return $regexps;
    }

    private function matchAnyRegexps(string $class, array $regexps): bool
    {
        $isTest = str_contains($class, 'Test');

        foreach ($regexps as $regex) {
            if ($isTest && !str_contains($regex, 'Test')) {
                continue;
            }

            if (preg_match($regex, '\\'.$class)) {
                return true;
            }
        }

        return false;
    }
}
