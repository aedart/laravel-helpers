<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\View;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\View;

/**
 * @deprecated Use \Aedart\Support\Helpers\View\ViewFactoryTrait, in aedart/athenaeum package
 *
 * View Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\View\ViewAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\View
 */
trait ViewTrait
{
    /**
     * View Factory
     *
     * @var Factory|null
     */
    protected $view = null;

    /**
     * Set view
     *
     * @param Factory|null $factory View Factory
     *
     * @return self
     */
    public function setView(?Factory $factory)
    {
        $this->view = $factory;

        return $this;
    }

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
    public function getView(): ?Factory
    {
        if (!$this->hasView()) {
            $this->setView($this->getDefaultView());
        }
        return $this->view;
    }

    /**
     * Check if view has been set
     *
     * @return bool True if view has been set, false if not
     */
    public function hasView(): bool
    {
        return isset($this->view);
    }

    /**
     * Get a default view value, if any is available
     *
     * @return Factory|null A default view value or Null if no default value is available
     */
    public function getDefaultView(): ?Factory
    {
        return View::getFacadeRoot();
    }
}
