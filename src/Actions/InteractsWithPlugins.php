<?php

declare(strict_types=1);

namespace Pest\Actions;

use Pest\Contracts\Plugins\HandlesArguments;
use Pest\Plugin\Loader;

/**
 * @internal
 */
final class InteractsWithPlugins
{
    /**
     * Transform the input arguments by passing it to the relevant plugins.
     *
     * @param array<string> $argv
     *
     * @return array<string>
     */
    public static function handleArguments(array $argv): array
    {
        $plugins = Loader::getPlugins(HandlesArguments::class);

        /** @var HandlesArguments $plugin */
        foreach ($plugins as $plugin) {
            $argv = $plugin->handleArguments($argv);
        }

        return $argv;
    }
}