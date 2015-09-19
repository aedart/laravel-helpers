<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Log\Writer;
use Illuminate\Support\Facades\Log;

/**
 * <h1>Log Writer Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\LogWriterAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait LogWriterTrait {

    /**
     * Instance of the Laravel Log Writer
     *
     * @var Writer|null
     */
    protected $logWriter = null;

    /**
     * Set the given log writer
     *
     * @param Writer $writer Instance of the Laravel Log Writer
     *
     * @return void
     */
    public function setLogWriter(Writer $writer) {
        $this->logWriter = $writer;
    }

    /**
     * Get the given log writer
     *
     * If no log writer has been set, this method will
     * set and return a default log writer, if any such
     * value is available
     *
     * @see getDefaultLogWriter()
     *
     * @return Writer|null log writer or null if none log writer has been set
     */
    public function getLogWriter() {
        if (!$this->hasLogWriter() && $this->hasDefaultLogWriter()) {
            $this->setLogWriter($this->getDefaultLogWriter());
        }
        return $this->logWriter;
    }

    /**
     * Get a default log writer value, if any is available
     *
     * @return Writer|null A default log writer value or Null if no default value is available
     */
    public function getDefaultLogWriter() {
        return Log::getFacadeRoot();
    }

    /**
     * Check if log writer has been set
     *
     * @return bool True if log writer has been set, false if not
     */
    public function hasLogWriter() {
        if (!is_null($this->logWriter)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default log writer is available or not
     *
     * @return bool True of a default log writer is available, false if not
     */
    public function hasDefaultLogWriter() {
        if (!is_null($this->getDefaultLogWriter())) {
            return true;
        }
        return false;
    }
}