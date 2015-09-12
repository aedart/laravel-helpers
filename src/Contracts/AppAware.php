<?php namespace Aedart\Facade\Helpers\Contracts;

use Illuminate\Contracts\Foundation\Application;

/**
 * <h1>App Aware</h1>
 *
 * Components are able to specify and obtain an application instance
 *
 * @see \Illuminate\Contracts\Foundation\Application
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface AppAware {

    /**
     * Set the given app
     *
     * @param Application $application Instance of Application
     *
     * @return void
     */
    public function setApp(Application $application);

    /**
     * Get the given app
     *
     * If no app has been set, this method will
     * set and return a default app, if any such
     * value is available
     *
     * @see getDefaultApp()
     *
     * @return Application|null app or null if none app has been set
     */
    public function getApp();

    /**
     * Get a default app value, if any is available
     *
     * @return Application|null A default app value or Null if no default value is available
     */
    public function getDefaultApp();

    /**
     * Check if app has been set
     *
     * @return bool True if app has been set, false if not
     */
    public function hasApp();

    /**
     * Check if a default app is available or not
     *
     * @return bool True of a default app is available, false if not
     */
    public function hasDefaultApp();
}