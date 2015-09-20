<?php namespace Aedart\Laravel\Helpers\Contracts\Logging;

use Illuminate\Log\Writer;

/**
 * <h1>Log Writer Aware</h1>
 *
 * Components are able to specify and obtain a laravel log-writer
 * utility component.
 *
 * @see \Illuminate\Log\Writer
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface LogWriterAware {

    /**
     * Set the given log writer
     *
     * @param Writer $writer Instance of the Laravel Log Writer
     *
     * @return void
     */
    public function setLogWriter(Writer $writer);

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
    public function getLogWriter();

    /**
     * Get a default log writer value, if any is available
     *
     * @return Writer|null A default log writer value or Null if no default value is available
     */
    public function getDefaultLogWriter();

    /**
     * Check if log writer has been set
     *
     * @return bool True if log writer has been set, false if not
     */
    public function hasLogWriter();

    /**
     * Check if a default log writer is available or not
     *
     * @return bool True of a default log writer is available, false if not
     */
    public function hasDefaultLogWriter();
}