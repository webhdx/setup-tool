<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Platform\SetupTool;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capability\CommandProvider;
use Ibexa\Platform\SetupTool\CommandProvider as SetupToolCommandProvider;

class SetupTool implements PluginInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $io->write('[SetupTool] Activate', true, IOInterface::DEBUG);
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
        $io->write('[SetupTool] Deactivate', IOInterface::DEBUG);
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
        $io->write('[SetupTool] Uninstall', IOInterface::DEBUG);
    }

    public function getCapabilities()
    {
        return [
            CommandProvider::class => SetupToolCommandProvider::class,
        ];
    }
}
