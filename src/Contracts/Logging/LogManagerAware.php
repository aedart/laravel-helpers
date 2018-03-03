<?php

namespace Aedart\Laravel\Helpers\Contracts\Logging;

use Illuminate\Log\LogManager;

/**
 * Log Manager Aware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Logging
 */
interface LogManagerAware
{
    /**
     * Set log manager
     *
     * @param LogManager|null $manager Log Manager instance
     *
     * @return self
     */
    public function setLogManager(?LogManager $manager);

    /**
     * Get log manager
     *
     * If no log manager has been set, this method will
     * set and return a default log manager, if any such
     * value is available
     *
     * @see getDefaultLogManager()
     *
     * @return LogManager|null log manager or null if none log manager has been set
     */
    public function getLogManager(): ?LogManager;

    /**
     * Check if log manager has been set
     *
     * @return bool True if log manager has been set, false if not
     */
    public function hasLogManager(): bool;

    /**
     * Get a default log manager value, if any is available
     *
     * @return LogManager|null A default log manager value or Null if no default value is available
     */
    public function getDefaultLogManager(): ?LogManager;
}