<?php

namespace Aedart\Laravel\Helpers\Traits\View;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\View;

/**
 * <h1>View Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\View\ViewAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\View
 */
trait ViewTrait
{
    /**
     * Instance of a View Factory
     *
     * @var Factory|null
     */
    protected $view = null;

    /**
     * Set the given view
     *
     * @param Factory $factory Instance of a View Factory
     *
     * @return void
     */
    public function setView(Factory $factory)
    {
        $this->view = $factory;
    }

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
    public function getView()
    {
        if (!$this->hasView() && $this->hasDefaultView()) {
            $this->setView($this->getDefaultView());
        }
        return $this->view;
    }

    /**
     * Get a default view value, if any is available
     *
     * @return Factory|null A default view value or Null if no default value is available
     */
    public function getDefaultView()
    {
        static $view;
        return isset($view) ? $view : $view = View::getFacadeRoot();
    }

    /**
     * Check if view has been set
     *
     * @return bool True if view has been set, false if not
     */
    public function hasView()
    {
        return isset($this->view);
    }

    /**
     * Check if a default view is available or not
     *
     * @return bool True of a default view is available, false if not
     */
    public function hasDefaultView()
    {
        $default = $this->getDefaultView();
        return isset($default);
    }
}