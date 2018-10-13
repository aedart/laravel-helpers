<?php

namespace Aedart\Laravel\Helpers\Contracts\Config;

use Illuminate\Contracts\Config\Repository;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Config\ConfigAware, in aedart/athenaeum package
 *
 * Config Aware
 *
 * @see \Illuminate\Contracts\Config\Repository
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Config
 */
interface ConfigAware
{
    /**
     * Set config
     *
     * @param Repository|null $repository Config Repository instance
     *
     * @return self
     */
    public function setConfig(?Repository $repository);

    /**
     * Get config
     *
     * If no config has been set, this method will
     * set and return a default config, if any such
     * value is available
     *
     * @see getDefaultConfig()
     *
     * @return Repository|null config or null if none config has been set
     */
    public function getConfig(): ?Repository;

    /**
     * Check if config has been set
     *
     * @return bool True if config has been set, false if not
     */
    public function hasConfig(): bool;

    /**
     * Get a default config value, if any is available
     *
     * @return Repository|null A default config value or Null if no default value is available
     */
    public function getDefaultConfig(): ?Repository;
}
