<?php

namespace Aedart\Laravel\Helpers\Contracts\View;

use Illuminate\Contracts\View\Factory;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\View\ViewFactoryAware, in aedart/athenaeum package
 *
 * View Aware
 *
 * @see \Illuminate\Contracts\View\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\View
 */
interface ViewAware
{
    /**
     * Set view
     *
     * @param Factory|null $factory View Factory
     *
     * @return self
     */
    public function setView(?Factory $factory);

    /**
     * Get view
     *
     * If no view has been set, this method will
     * set and return a default view, if any such
     * value is available
     *
     * @see getDefaultView()
     *
     * @return Factory|null view or null if none view has been set
     */
    public function getView(): ?Factory;

    /**
     * Check if view has been set
     *
     * @return bool True if view has been set, false if not
     */
    public function hasView(): bool;

    /**
     * Get a default view value, if any is available
     *
     * @return Factory|null A default view value or Null if no default value is available
     */
    public function getDefaultView(): ?Factory;
}
