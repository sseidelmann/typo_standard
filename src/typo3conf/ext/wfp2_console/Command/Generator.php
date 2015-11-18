<?php
namespace WFP2\Wfp2Console\Command;

/***************************************************************
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 ***************************************************************/

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Generator for create some skeletons.
 * @package WFP2\Wfp2Console\Command
 * @author Sebastian Seidelmann <sebastian.seidelmann@wfp2.com>, wfp:2 GmbH & Co. KG
 */
class Generator extends Command
{
    /**
     * Saves the generator name.
     * @var string
     */
    private $generatorName;

    /**
     * Sets the generator name.
     * @param string $generatorName
     * @return void
     */
    protected function setGeneratorName($generatorName)
    {
        $this->generatorName = $generatorName;
    }


    /**
     * Writes a section.
     * @param OutputInterface $output
     * @param string          $text
     * @param string          $style
     * @return void
     */
    protected function writeSection(OutputInterface $output, $text, $style = 'bg=blue;fg=white')
    {
        $output->writeln(array(
            '',
            $this->getHelperSet()->get('formatter')->formatBlock($text, $style, true),
            '',
        ));
    }

    /**
     * Creates a basic question.
     * @param string     $question
     * @param bool|false $default
     * @param string     $sep
     * @return string
     */
    protected function createQuestion($question, $default = false, $sep = ':')
    {
        return $default?sprintf('<info>%s</info> [<comment>%s</comment>]%s ', $question, $default, $sep) : sprintf('<info>%s</info>%s ', $question, $sep);
    }

    /**
     * Writes the summery of the generation process.
     * @param OutputInterface $output
     * @param                 $errors
     * @return void
     */
    protected function writeGeneratorSummery(OutputInterface $output, $errors)
    {
        if (!$errors) {
            $this->writeSection($output, 'Everything is OK! Now get to work :).');
        } else {
            $this->writeSection($output, array(
                'The command was not able to configure everything automatically.',
                'You\'ll need to make the following changes manually.',
            ), 'error');
            $output->writeln($errors);
        }
    }

    /**
     * Returns the runner function.
     * @param OutputInterface $output
     * @param                 $errors
     * @return \Closure
     */
    protected function getRunner(OutputInterface $output, &$errors)
    {
        $runner = function ($err) use ($output, &$errors) {
            if ($err) {
                $output->writeln('<fg=red>FAILED</>');
                $errors = array_merge($errors, $err);
            } else {
                $output->writeln('<info>OK</info>');
            }
        };
        return $runner;
    }

    /**
     * Returns the skeleton path.
     * @return string
     */
    protected function getSkeletonPath()
    {
        return realpath(
            sprintf(
                '%s/wfp2_console/skeleton/%s/',
                \WFP2Environment::getExtPath(),
                $this->generatorName
            )
        ) . DIRECTORY_SEPARATOR;
    }


    /**
     * Renders a file.
     * @param string $template
     * @param string $target
     * @param array $parameters
     */
    protected function render($template, $target, array $parameters = array())
    {
        $template = $this->getSkeletonPath() . $template;
        if (!file_exists($template)) {
            throw new \RuntimeException('Template ' . $template . ' not found');
        }

        $source = file_get_contents($template);

        if (count($parameters)) {
            foreach ($parameters as $parameterKey => $parameterValue) {
                $source = str_replace('{' . $parameterKey . '}', $parameterValue, $source);
            }
        }

        if (file_put_contents($target, $source) === false) {
            throw new \RuntimeException('File ' . $target . ' was not written');
        }
    }
}