<?php

namespace Aedart\Laravel\Helpers\Contracts\Logging;

use Illuminate\Contracts\Logging\Log;

/**
 * <h1>Log Aware</h1>
 *
 * Components are able to specify and obtain a laravel logger
 * utility component.
 *
 * @see \Illuminate\Contracts\Logging\Log
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface LogAware
{
    /**
     * Set the given log
     *
     * @param Log $logger Instance of the Laravel Logger
     *
     * @return void
     */
    public function setLog(Log $logger);

    /**
     * Get the given log
     *
     * If no log has been set, this method will
     * set and return a default log, if any such
     * value is available
     *
     * @see getDefaultLog()
     *
     * @return Log|null log or null if none log has been set
     */
    public function getLog();

    /**
     * Get a default log value, if any is available
     *
     * @return Log|null A default log value or Null if no default value is available
     */
    public function getDefaultLog();

    /**
     * Check if log has been set
     *
     * @return bool True if log has been set, false if not
     */
    public function hasLog();

    /**
     * Check if a default log is available or not
     *
     * @return bool True of a default log is available, false if not
     */
    public function hasDefaultLog();
}