<?php

namespace Aedart\Laravel\Helpers\Contracts\View;

use Illuminate\View\Compilers\BladeCompiler;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\View\BladeAware, in aedart/athenaeum package
 *
 * Blade Aware
 *
 * @see \Illuminate\View\Compilers\BladeCompiler
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\View
 */
interface BladeAware
{
    /**
     * Set blade
     *
     * @param BladeCompiler|null $compiler Blade Compiler Instance
     *
     * @return self
     */
    public function setBlade(?BladeCompiler $compiler);

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
    public function getBlade(): ?BladeCompiler;

    /**
     * Check if blade has been set
     *
     * @return bool True if blade has been set, false if not
     */
    public function hasBlade(): bool;

    /**
     * Get a default blade value, if any is available
     *
     * @return BladeCompiler|null A default blade value or Null if no default value is available
     */
    public function getDefaultBlade(): ?BladeCompiler;
}
