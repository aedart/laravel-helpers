<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Logging;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Log as LogFacade;

/**
 * Log Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Logging\LogAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Logging
 */
trait LogTrait
{
    /**
     * Logger Instance
     *
     * @var Log|null
     */
    protected $log = null;

    /**
     * Set log
     *
     * @param Log|null $logger Logger Instance
     *
     * @return self
     */
    public function setLog(?Log $logger)
    {
        $this->log = $logger;

        return $this;
    }

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
    public function getLog(): ?Log
    {
        if (!$this->hasLog()) {
            $this->setLog($this->getDefaultLog());
        }
        return $this->log;
    }

    /**
     * Check if log has been set
     *
     * @return bool True if log has been set, false if not
     */
    public function hasLog(): bool
    {
        return isset($this->log);
    }

    /**
     * Get a default log value, if any is available
     *
     * @return Log|null A default log value or Null if no default value is available
     */
    public function getDefaultLog(): ?Log
    {
        return LogFacade::getFacadeRoot();
    }
}