<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Foundation;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\App;

/**
 * @deprecated Use \Aedart\Support\Helpers\Foundation\AppTrait, in aedart/athenaeum package
 *
 * App Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Foundation\AppAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Foundation
 */
trait AppTrait
{
    /**
     * Application Instance
     *
     * @var Application|null
     */
    protected $app = null;

    /**
     * Set app
     *
     * @param Application|null $application Application Instance
     *
     * @return self
     */
    public function setApp(?Application $application)
    {
        $this->app = $application;

        return $this;
    }

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
    public function getApp(): ?Application
    {
        if (!$this->hasApp()) {
            $this->setApp($this->getDefaultApp());
        }
        return $this->app;
    }

    /**
     * Check if app has been set
     *
     * @return bool True if app has been set, false if not
     */
    public function hasApp(): bool
    {
        return isset($this->app);
    }

    /**
     * Get a default app value, if any is available
     *
     * @return Application|null A default app value or Null if no default value is available
     */
    public function getDefaultApp(): ?Application
    {
        return App::getFacadeRoot();
    }
}
