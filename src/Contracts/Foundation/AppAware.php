<?php

namespace Aedart\Laravel\Helpers\Contracts\Foundation;

use Illuminate\Contracts\Foundation\Application;

/**
 * App Aware
 *
 * @see \Illuminate\Contracts\Foundation\Application
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Foundation
 */
interface AppAware
{
    /**
     * Set app
     *
     * @param Application|null $application Application Instance
     *
     * @return self
     */
    public function setApp(?Application $application);

    /**
     * Get app
     *
     * If no app has been set, this method will
     * set and return a default app, if any such
     * value is available
     *
     * @see getDefaultApp()
     *
     * @return Application|null app or null if none app has been set
     */
    public function getApp(): ?Application;

    /**
     * Check if app has been set
     *
     * @return bool True if app has been set, false if not
     */
    public function hasApp(): bool;

    /**
     * Get a default app value, if any is available
     *
     * @return Application|null A default app value or Null if no default value is available
     */
    public function getDefaultApp(): ?Application;
}