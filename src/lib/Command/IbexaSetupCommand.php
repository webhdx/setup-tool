<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Platform\SetupTool\Command;

use Composer\Command\BaseCommand;
use Composer\IO\IOInterface;
use Ibexa\Platform\SetupTool\IbexaProductVersion;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class IbexaSetupCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('ibexa:setup')
             ->setDescription('Runs post install configuration tool.')
//             ->setDefinition([
//                 new InputArgument('package', InputArgument::OPTIONAL, 'Package to inspect, if not provided all packages are.'),
//             ])
             ->addOption('platformsh', null, InputOption::VALUE_NONE, 'Install Platform.sh config files')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('platformsh')) {
            $this->getIO()->write('Installing Platform.sh config files...', true, IOInterface::NORMAL);

            $product = IbexaProductVersion::getInstalledProduct();
            $version = IbexaProductVersion::getInstalledProductVersion();

            $fileSystem = new Filesystem();

            // common files
            $fileSystem->mirror(
                __DIR__ . '/../../../resources/platformsh/common/' . $version,
                $this->getApplication()->getInitialWorkingDirectory()
            );

            // product edition specific files
            $fileSystem->mirror(
                __DIR__ . '/../../../resources/platformsh/' . str_replace('/', '-', $product) . '/' . $version,
                $this->getApplication()->getInitialWorkingDirectory()
            );

            $this->getIO()->write('Platform.sh config files installed successfully', true, IOInterface::NORMAL);
        }
    }
}
