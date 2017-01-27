<?php

namespace Aedart\Laravel\Helpers\Traits\View;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\View\Compilers\BladeCompiler;

/**
 * <h1>Blade Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\View\BladeAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait BladeTrait
{
    /**
     * Instance of the Blade Compiler
     *
     * @var BladeCompiler|null
     */
    protected $blade = null;

    /**
     * Set the given blade
     *
     * @param BladeCompiler $compiler Instance of the Blade Compiler
     *
     * @return void
     */
    public function setBlade(BladeCompiler $compiler)
    {
        $this->blade = $compiler;
    }

    /**
     * Get the given blade
     *
     * If no blade has been set, this method will
     * set and return a default blade, if any such
     * value is available
     *
     * @see getDefaultBlade()
     *
     * @return BladeCompiler|null blade or null if none blade has been set
     */
    public function getBlade()
    {
        if (!$this->hasBlade() && $this->hasDefaultBlade()) {
            $this->setBlade($this->getDefaultBlade());
        }
        return $this->blade;
    }

    /**
     * Get a default blade value, if any is available
     *
     * @return BladeCompiler|null A default blade value or Null if no default value is available
     */
    public function getDefaultBlade()
    {
        // The blade compiler is usually only available, once
        // Laravel's view service provider has been initialised.
        // Thus, before just returning the Blade Facade's root
        // instance, we must make sure that the view facade
        // actually returns something
        $view = View::getFacadeRoot();
        if (!is_null($view)) {
            return Blade::getFacadeRoot();
        }
        return $view;
    }

    /**
     * Check if blade has been set
     *
     * @return bool True if blade has been set, false if not
     */
    public function hasBlade()
    {
        if (!is_null($this->blade)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default blade is available or not
     *
     * @return bool True of a default blade is available, false if not
     */
    public function hasDefaultBlade()
    {
        if (!is_null($this->getDefaultBlade())) {
            return true;
        }
        return false;
    }
}