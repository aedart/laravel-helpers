<?php

namespace Aedart\Laravel\Helpers\Contracts\Config;

use Illuminate\Contracts\Config\Repository;

/**
 * <h1>Config Aware</h1>
 *
 * Components are able to specify and obtain a configuration repository
 *
 * @see \Illuminate\Contracts\Config\Repository
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface ConfigAware
{
    /**
     * Set the given config
     *
     * @param Repository $repository Instance of the Configuration Repository
     *
     * @return void
     */
    public function setConfig(Repository $repository);

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
    public function getConfig();

    /**
     * Get a default config value, if any is available
     *
     * @return Repository|null A default config value or Null if no default value is available
     */
    public function getDefaultConfig();

    /**
     * Check if config has been set
     *
     * @return bool True if config has been set, false if not
     */
    public function hasConfig();

    /**
     * Check if a default config is available or not
     *
     * @return bool True of a default config is available, false if not
     */
    public function hasDefaultConfig();
}