<?php

namespace Aedart\Laravel\Helpers\Contracts\Validation;

use Illuminate\Contracts\Validation\Factory;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Validation\ValidatorFactoryAware, in aedart/athenaeum package
 *
 * Validator Aware
 *
 * @see \Illuminate\Contracts\Validation\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Validation
 */
interface ValidatorAware
{
    /**
     * Set validator
     *
     * @param Factory|null $factory Validator Factory Instance
     *
     * @return self
     */
    public function setValidator(?Factory $factory);

    /**
     * Get validator
     *
     * If no validator has been set, this method will
     * set and return a default validator, if any such
     * value is available
     *
     * @see getDefaultValidator()
     *
     * @return Factory|null validator or null if none validator has been set
     */
    public function getValidator(): ?Factory;

    /**
     * Check if validator has been set
     *
     * @return bool True if validator has been set, false if not
     */
    public function hasValidator(): bool;

    /**
     * Get a default validator value, if any is available
     *
     * @return Factory|null A default validator value or Null if no default value is available
     */
    public function getDefaultValidator(): ?Factory;
}
