<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Platform\SetupTool;

use Ibexa\Platform\SetupTool\Command\IbexaSetupCommand;

class CommandProvider implements \Composer\Plugin\Capability\CommandProvider
{
    public function getCommands()
    {
        return [
            new IbexaSetupCommand(),
        ];
    }
}
