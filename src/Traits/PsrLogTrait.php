<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;

/**
 * <h1>Psr Log Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\PsrLogAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait PsrLogTrait {

    /**
     * Instance of a Psr Logger
     *
     * @var LoggerInterface|null
     */
    protected $psrLog = null;

    /**
     * Set the given psr log
     *
     * @param LoggerInterface $logger Instance of a Psr Logger
     *
     * @return void
     */
    public function setPsrLog(LoggerInterface $logger) {
        $this->psrLog = $logger;
    }

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
    public function getPsrLog() {
        if (!$this->hasPsrLog() && $this->hasDefaultPsrLog()) {
            $this->setPsrLog($this->getDefaultPsrLog());
        }
        return $this->psrLog;
    }

    /**
     * Get a default psr log value, if any is available
     *
     * @return LoggerInterface|null A default psr log value or Null if no default value is available
     */
    public function getDefaultPsrLog() {
        return Log::getFacadeRoot();
    }

    /**
     * Check if psr log has been set
     *
     * @return bool True if psr log has been set, false if not
     */
    public function hasPsrLog() {
        if (!is_null($this->psrLog)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default psr log is available or not
     *
     * @return bool True of a default psr log is available, false if not
     */
    public function hasDefaultPsrLog() {
        if (!is_null($this->getDefaultPsrLog())) {
            return true;
        }
        return false;
    }
}