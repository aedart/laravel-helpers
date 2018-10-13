<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\View;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\View\Compilers\BladeCompiler;

/**
 * @deprecated Use \Aedart\Support\Helpers\View\BladeTrait, in aedart/athenaeum package
 *
 * Blade Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\View\BladeAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\View
 */
trait BladeTrait
{
    /**
     * Blade Compiler Instance
     *
     * @var BladeCompiler|null
     */
    protected $blade = null;

    /**
     * Set blade
     *
     * @param BladeCompiler|null $compiler Blade Compiler Instance
     *
     * @return self
     */
    public function setBlade(?BladeCompiler $compiler)
    {
        $this->blade = $compiler;

        return $this;
    }

    /**
     * Get blade
     *
     * If no blade has been set, this method will
     * set and return a default blade, if any such
     * value is available
     *
     * @see getDefaultBlade()
     *
     * @return BladeCompiler|null blade or null if none blade has been set
     */
    public function getBlade(): ?BladeCompiler
    {
        if (!$this->hasBlade()) {
            $this->setBlade($this->getDefaultBlade());
        }
        return $this->blade;
    }

    /**
     * Check if blade has been set
     *
     * @return bool True if blade has been set, false if not
     */
    public function hasBlade(): bool
    {
        return isset($this->blade);
    }

    /**
     * Get a default blade value, if any is available
     *
     * @return BladeCompiler|null A default blade value or Null if no default value is available
     */
    public function getDefaultBlade(): ?BladeCompiler
    {
        // The blade compiler is usually only available, once
        // Laravel's view service provider has been initialised.
        // Thus, before just returning the Blade Facade's root
        // instance, we must make sure that the view facade
        // actually returns something
        $view = View::getFacadeRoot();
        if (isset($view)) {
            return Blade::getFacadeRoot();
        }
        return $view;
    }
}
