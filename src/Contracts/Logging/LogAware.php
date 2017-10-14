<?php

namespace Aedart\Laravel\Helpers\Contracts\Logging;

use Illuminate\Contracts\Logging\Log;

/**
 * Log Aware
 *
 * @see \Illuminate\Contracts\Logging\Log
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Logging
 */
interface LogAware
{
    /**
     * Set log
     *
     * @param Log|null $logger Logger Instance
     *
     * @return self
     */
    public function setLog(?Log $logger);

    /**
     * Get log
     *
     * If no log has been set, this method will
     * set and return a default log, if any such
     * value is available
     *
     * @see getDefaultLog()
     *
     * @return Log|null log or null if none log has been set
     */
    public function getLog(): ?Log;

    /**
     * Check if log has been set
     *
     * @return bool True if log has been set, false if not
     */
    public function hasLog(): bool;

    /**
     * Get a default log value, if any is available
     *
     * @return Log|null A default log value or Null if no default value is available
     */
    public function getDefaultLog(): ?Log;
}