<?php

namespace Aedart\Laravel\Helpers\Contracts\Logging;

use Psr\Log\LoggerInterface;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Logging\LogAware, in aedart/athenaeum package
 *
 * Psr Logger Aware
 *
 * @see \Psr\Log\LoggerInterface
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Logging
 */
interface PsrLogAware
{
    /**
     * Set psr log
     *
     * @param LoggerInterface|null $logger Prs Logger
     *
     * @return \Aedart\Laravel\Helpers\Traits\Logging\PsrLogTrait
     */
    public function setPsrLog(?LoggerInterface $logger);

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
    public function getPsrLog(): ?LoggerInterface;

    /**
     * Check if psr log has been set
     *
     * @return bool True if psr log has been set, false if not
     */
    public function hasPsrLog(): bool;

    /**
     * Get a default psr log value, if any is available
     *
     * @return LoggerInterface|null A default psr log value or Null if no default value is available
     */
    public function getDefaultPsrLog(): ?LoggerInterface;
}
