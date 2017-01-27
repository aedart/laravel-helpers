<?php

namespace Aedart\Laravel\Helpers\Contracts\View;

use Illuminate\Contracts\View\Factory;

/**
 * <h1>View Aware</h1>
 *
 * Components are able to specify and obtain a View Factory
 * utility component
 *
 * @see \Illuminate\Contracts\View\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\View
 */
interface ViewAware
{
    /**
     * Set the given view
     *
     * @param Factory $factory Instance of a View Factory
     *
     * @return void
     */
    public function setView(Factory $factory);

    /**
     * Get the given view
     *
     * If no view has been set, this method will
     * set and return a default view, if any such
     * value is available
     *
     * @see getDefaultView()
     *
     * @return Factory|null view or null if none view has been set
     */
    public function getView();

    /**
     * Get a default view value, if any is available
     *
     * @return Factory|null A default view value or Null if no default value is available
     */
    public function getDefaultView();

    /**
     * Check if view has been set
     *
     * @return bool True if view has been set, false if not
     */
    public function hasView();

    /**
     * Check if a default view is available or not
     *
     * @return bool True of a default view is available, false if not
     */
    public function hasDefaultView();
}