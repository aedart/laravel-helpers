<?php namespace Aedart\Laravel\Helpers\Contracts\View;

use Illuminate\View\Compilers\BladeCompiler;

/**
 * <h1>Blade Aware</h1>
 *
 * Components are able to specify and obtain the Blade Compiler
 *
 * @see \Illuminate\View\Compilers\BladeCompiler
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface BladeAware {

    /**
     * Set the given blade
     *
     * @param BladeCompiler $compiler Instance of the Blade Compiler
     *
     * @return void
     */
    public function setBlade(BladeCompiler $compiler);

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
    public function getBlade();

    /**
     * Get a default blade value, if any is available
     *
     * @return BladeCompiler|null A default blade value or Null if no default value is available
     */
    public function getDefaultBlade();

    /**
     * Check if blade has been set
     *
     * @return bool True if blade has been set, false if not
     */
    public function hasBlade();

    /**
     * Check if a default blade is available or not
     *
     * @return bool True of a default blade is available, false if not
     */
    public function hasDefaultBlade();
}