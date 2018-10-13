<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Container;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Facade;

/**
 * @deprecated Use \Aedart\Support\Helpers\Container\ContainerTrait, in aedart/athenaeum package
 *
 * Container Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Container\ContainerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Container
 */
trait ContainerTrait
{
    /**
     * IoC Service Container instance
     *
     * @var Container|null
     */
    protected $container = null;

    /**
     * Set container
     *
     * @param Container|null $serviceContainer IoC Service Container instance
     *
     * @return self
     */
    public function setContainer(?Container $serviceContainer)
    {
        $this->container = $serviceContainer;

        return $this;
    }

    /**
     * Get container
     *
     * If no container has been set, this method will
     * set and return a default container, if any such
     * value is available
     *
     * @see getDefaultContainer()
     *
     * @return Container|null container or null if none container has been set
     */
    public function getContainer(): ?Container
    {
        if (!$this->hasContainer()) {
            $this->setContainer($this->getDefaultContainer());
        }
        return $this->container;
    }

    /**
     * Check if container has been set
     *
     * @return bool True if container has been set, false if not
     */
    public function hasContainer(): bool
    {
        return isset($this->container);
    }

    /**
     * Get a default container value, if any is available
     *
     * @return Container|null A default container value or Null if no default value is available
     */
    public function getDefaultContainer(): ?Container
    {
        return Facade::getFacadeApplication();
    }
}
