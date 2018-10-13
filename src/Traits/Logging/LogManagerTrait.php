<?php

namespace Aedart\Laravel\Helpers\Traits\Logging;

use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Log;

/**
 * @deprecated Use \Aedart\Support\Helpers\Logging\LogManagerTrait, in aedart/athenaeum package
 *
 * Log Manager Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Logging\LogManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Logging
 */
trait LogManagerTrait
{
    /**
     * Log Manager instance
     *
     * @var LogManager|null
     */
    protected $logManager = null;

    /**
     * Set log manager
     *
     * @param LogManager|null $manager Log Manager instance
     *
     * @return self
     */
    public function setLogManager(?LogManager $manager)
    {
        $this->logManager = $manager;

        return $this;
    }

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
    public function getLogManager(): ?LogManager
    {
        if (!$this->hasLogManager()) {
            $this->setLogManager($this->getDefaultLogManager());
        }
        return $this->logManager;
    }

    /**
     * Check if log manager has been set
     *
     * @return bool True if log manager has been set, false if not
     */
    public function hasLogManager(): bool
    {
        return isset($this->logManager);
    }

    /**
     * Get a default log manager value, if any is available
     *
     * @return LogManager|null A default log manager value or Null if no default value is available
     */
    public function getDefaultLogManager(): ?LogManager
    {
        return Log::getFacadeRoot();
    }
}
