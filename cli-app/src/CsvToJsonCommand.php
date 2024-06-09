<?php

namespace App;

use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CsvToJsonCommand extends Command 
{
    public static function getDefaultName(): ?string
    {
        return 'csv-to-json';
    }

    protected function configure(): void
    {
        $this
            ->setDefinition(
                new InputDefinition([
                    new InputOption('input', '', InputOption::VALUE_REQUIRED, 'Input file name'),
                    new InputOption('output', '', InputOption::VALUE_REQUIRED, 'Output file name'),
                ])
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inputFileName = $input->getOption('input');
        $outputFileName = $input->getOption('output');

        if(!file_exists($inputFileName)) {
            $output->writeln("<error>File not found!</error>");
            return Command::FAILURE;
        }

        $items = array_map('str_getcsv', file($inputFileName));

        $headers = array_shift($items);

        $jsonContent = [];

        foreach($items as $item) {
            $jsonContent[] = array_combine($headers, $item);
        }

        file_put_contents($outputFileName, json_encode($jsonContent, JSON_PRETTY_PRINT));
        $output->writeln('<info>File successfully created!</info>');
        return Command::SUCCESS;
    }
}