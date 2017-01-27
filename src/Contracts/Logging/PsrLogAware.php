<?php

namespace Aedart\Laravel\Helpers\Contracts\Logging;

use Psr\Log\LoggerInterface;

/**
 * <h1>Psr Log Aware</h1>
 *
 * Components are able to specify and obtain a Psr logger
 * utility component.
 *
 * @see \Psr\Log\LoggerInterface
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface PsrLogAware
{
    /**
     * Set the given psr log
     *
     * @param LoggerInterface $logger Instance of a Psr Logger
     *
     * @return void
     */
    public function setPsrLog(LoggerInterface $logger);

    /**
     * Get the given psr log
     *
     * If no psr log has been set, this method will
     * set and return a default psr log, if any such
     * value is available
     *
     * @see getDefaultPsrLog()
     *
     * @return LoggerInterface|null psr log or null if none psr log has been set
     */
    public function getPsrLog();

    /**
     * Get a default psr log value, if any is available
     *
     * @return LoggerInterface|null A default psr log value or Null if no default value is available
     */
    public function getDefaultPsrLog();

    /**
     * Check if psr log has been set
     *
     * @return bool True if psr log has been set, false if not
     */
    public function hasPsrLog();

    /**
     * Check if a default psr log is available or not
     *
     * @return bool True of a default psr log is available, false if not
     */
    public function hasDefaultPsrLog();
}