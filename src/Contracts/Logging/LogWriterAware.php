<?php

namespace Aedart\Laravel\Helpers\Contracts\Logging;

use Illuminate\Log\Writer;

/**
 * Log Writer Aware
 *
 * @see \Illuminate\Log\Writer
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Logging
 */
interface LogWriterAware
{
    /**
     * Set log writer
     *
     * @param Writer|null $writer Log Writer Instance (logger)
     *
     * @return self
     */
    public function setLogWriter(?Writer $writer);

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
    public function getLogWriter(): ?Writer;

    /**
     * Check if log writer has been set
     *
     * @return bool True if log writer has been set, false if not
     */
    public function hasLogWriter(): bool;

    /**
     * Get a default log writer value, if any is available
     *
     * @return Writer|null A default log writer value or Null if no default value is available
     */
    public function getDefaultLogWriter(): ?Writer;
}