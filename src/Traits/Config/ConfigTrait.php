<?php

namespace Aedart\Laravel\Helpers\Traits\Config;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\Config;

/**
 * <h1>Config Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Config\ConfigAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait ConfigTrait
{
    /**
     * Instance of the Configuration Repository
     *
     * @var Repository|null
     */
    protected $config = null;

    /**
     * Set the given config
     *
     * @param Repository $repository Instance of the Configuration Repository
     *
     * @return void
     */
    public function setConfig(Repository $repository)
    {
        $this->config = $repository;
    }

    /**
     * Get the given config
     *
     * If no config has been set, this method will
     * set and return a default config, if any such
     * value is available
     *
     * @see getDefaultConfig()
     *
     * @return Repository|null config or null if none config has been set
     */
    public function getConfig()
    {
        if (!$this->hasConfig() && $this->hasDefaultConfig()) {
            $this->setConfig($this->getDefaultConfig());
        }
        return $this->config;
    }

    /**
     * Get a default config value, if any is available
     *
     * @return Repository|null A default config value or Null if no default value is available
     */
    public function getDefaultConfig()
    {
        return Config::getFacadeRoot();
    }

    /**
     * Check if config has been set
     *
     * @return bool True if config has been set, false if not
     */
    public function hasConfig()
    {
        if (!is_null($this->config)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default config is available or not
     *
     * @return bool True of a default config is available, false if not
     */
    public function hasDefaultConfig()
    {
        if (!is_null($this->getDefaultConfig())) {
            return true;
        }
        return false;
    }
}