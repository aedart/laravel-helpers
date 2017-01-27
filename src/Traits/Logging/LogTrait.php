<?php

namespace Aedart\Laravel\Helpers\Traits\Logging;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Log as LogFacade;

/**
 * <h1>Log Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Logging\LogAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait LogTrait
{
    /**
     * Instance of the Laravel Logger
     *
     * @var Log|null
     */
    protected $log = null;

    /**
     * Set the given log
     *
     * @param Log $logger Instance of the Laravel Logger
     *
     * @return void
     */
    public function setLog(Log $logger)
    {
        $this->log = $logger;
    }

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
    public function getLog()
    {
        if (!$this->hasLog() && $this->hasDefaultLog()) {
            $this->setLog($this->getDefaultLog());
        }
        return $this->log;
    }

    /**
     * Get a default log value, if any is available
     *
     * @return Log|null A default log value or Null if no default value is available
     */
    public function getDefaultLog()
    {
        return LogFacade::getFacadeRoot();
    }

    /**
     * Check if log has been set
     *
     * @return bool True if log has been set, false if not
     */
    public function hasLog()
    {
        return isset($this->log);
    }

    /**
     * Check if a default log is available or not
     *
     * @return bool True of a default log is available, false if not
     */
    public function hasDefaultLog()
    {
        $default = $this->getDefaultLog();
        return isset($default);
    }
}