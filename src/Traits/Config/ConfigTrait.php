<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Config;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\Config;

/**
 * @deprecated Use \Aedart\Support\Helpers\Config\ConfigTrait, in aedart/athenaeum package
 *
 * Config Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Config\ConfigAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Config
 */
trait ConfigTrait
{
    /**
     * Config Repository instance
     *
     * @var Repository|null
     */
    protected $config = null;

    /**
     * Set config
     *
     * @param Repository|null $repository Config Repository instance
     *
     * @return self
     */
    public function setConfig(?Repository $repository)
    {
        $this->config = $repository;

        return $this;
    }

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
    public function getConfig(): ?Repository
    {
        if (!$this->hasConfig()) {
            $this->setConfig($this->getDefaultConfig());
        }
        return $this->config;
    }

    /**
     * Check if config has been set
     *
     * @return bool True if config has been set, false if not
     */
    public function hasConfig(): bool
    {
        return isset($this->config);
    }

    /**
     * Get a default config value, if any is available
     *
     * @return Repository|null A default config value or Null if no default value is available
     */
    public function getDefaultConfig(): ?Repository
    {
        return Config::getFacadeRoot();
    }
}
