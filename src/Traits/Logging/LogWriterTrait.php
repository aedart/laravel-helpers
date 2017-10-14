<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Logging;

use Illuminate\Log\Writer;
use Illuminate\Support\Facades\Log;

/**
 * Log Writer Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Logging\LogWriterAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Logging
 */
trait LogWriterTrait
{
    /**
     * Log Writer Instance (logger)
     *
     * @var Writer|null
     */
    protected $logWriter = null;

    /**
     * Set log writer
     *
     * @param Writer|null $writer Log Writer Instance (logger)
     *
     * @return self
     */
    public function setLogWriter(?Writer $writer)
    {
        $this->logWriter = $writer;

        return $this;
    }

    /**
     * Get log writer
     *
     * If no log writer has been set, this method will
     * set and return a default log writer, if any such
     * value is available
     *
     * @see getDefaultLogWriter()
     *
     * @return Writer|null log writer or null if none log writer has been set
     */
    public function getLogWriter(): ?Writer
    {
        if (!$this->hasLogWriter()) {
            $this->setLogWriter($this->getDefaultLogWriter());
        }
        return $this->logWriter;
    }

    /**
     * Check if log writer has been set
     *
     * @return bool True if log writer has been set, false if not
     */
    public function hasLogWriter(): bool
    {
        return isset($this->logWriter);
    }

    /**
     * Get a default log writer value, if any is available
     *
     * @return Writer|null A default log writer value or Null if no default value is available
     */
    public function getDefaultLogWriter(): ?Writer
    {
        return Log::getFacadeRoot();
    }
}