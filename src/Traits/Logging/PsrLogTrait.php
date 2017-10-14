<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Logging;

use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;

/**
 * Psr Logger Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Logging\PsrLogAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Logging
 */
trait PsrLogTrait
{
    /**
     * Prs Logger
     *
     * @var LoggerInterface|null
     */
    protected $psrLog = null;

    /**
     * Set psr log
     *
     * @param LoggerInterface|null $logger Prs Logger
     *
     * @return self
     */
    public function setPsrLog(?LoggerInterface $logger)
    {
        $this->psrLog = $logger;

        return $this;
    }

    /**
     * Get psr log
     *
     * If no psr log has been set, this method will
     * set and return a default psr log, if any such
     * value is available
     *
     * @see getDefaultPsrLog()
     *
     * @return LoggerInterface|null psr log or null if none psr log has been set
     */
    public function getPsrLog(): ?LoggerInterface
    {
        if (!$this->hasPsrLog()) {
            $this->setPsrLog($this->getDefaultPsrLog());
        }
        return $this->psrLog;
    }

    /**
     * Check if psr log has been set
     *
     * @return bool True if psr log has been set, false if not
     */
    public function hasPsrLog(): bool
    {
        return isset($this->psrLog);
    }

    /**
     * Get a default psr log value, if any is available
     *
     * @return LoggerInterface|null A default psr log value or Null if no default value is available
     */
    public function getDefaultPsrLog(): ?LoggerInterface
    {
        return Log::getFacadeRoot();
    }
}