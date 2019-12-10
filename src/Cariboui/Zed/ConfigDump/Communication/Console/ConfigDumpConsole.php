<?php

declare(strict_types = 1);

namespace Cariboui\Zed\ConfigDump\Communication\Console;

use Cariboui\Shared\ConfigDump\Config;
use Spryker\Shared\Config\Config as SprykeConfig;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigDumpConsole extends Console
{
    protected const COMMAND_NAME = 'config:dump';
    protected const CONFIG_KEY_NAME = 'key';
    protected const CONFIG_KEY_NAME_SHORTCUT = 'key';

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setName(static::COMMAND_NAME)
            ->setDescription(<<<EOF
This command dumps the whole configuration that is loaded. Make sure that the correct environment is set.
You can optionally pass the "key", then only this specific configuration value is dumped.
EOF
        )
            ->addOption(static::CONFIG_KEY_NAME, static::CONFIG_KEY_NAME_SHORTCUT, InputOption::VALUE_REQUIRED);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($key = $input->getOption('key')) {
            dump(SprykeConfig::get($key));

            return static::CODE_SUCCESS;
        }

        dump(Config::getConfig()->getArrayCopy());

        return static::CODE_SUCCESS;
    }
}
