<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\App;

/**
 * <h1>App Trait</h1>
 *
 * @see \Aedart\Facade\Helpers\Contracts\AppAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait AppTrait {

    /**
     * Instance of Application
     *
     * @var Application|null
     */
    protected $app = null;

    /**
     * Set the given app
     *
     * @param Application $application Instance of Application
     *
     * @return void
     */
    public function setApp(Application $application) {
        $this->app = $application;
    }

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
    public function getApp() {
        if (!$this->hasApp() && $this->hasDefaultApp()) {
            $this->setApp($this->getDefaultApp());
        }
        return $this->app;
    }

    /**
     * Get a default app value, if any is available
     *
     * @return Application|null A default app value or Null if no default value is available
     */
    public function getDefaultApp() {
        return App::getFacadeRoot();
    }

    /**
     * Check if app has been set
     *
     * @return bool True if app has been set, false if not
     */
    public function hasApp() {
        if (!is_null($this->app)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default app is available or not
     *
     * @return bool True of a default app is available, false if not
     */
    public function hasDefaultApp() {
        if (!is_null($this->getDefaultApp())) {
            return true;
        }
        return false;
    }
}