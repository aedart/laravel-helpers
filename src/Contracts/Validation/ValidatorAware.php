<?php namespace Aedart\Laravel\Helpers\Contracts\Validation;

use Illuminate\Contracts\Validation\Factory;

/**
 * <h1>Validator Aware</h1>
 *
 * Components are able to specify and obtain a validator factory,
 * able of making various validation instances
 *
 * @see \Illuminate\Contracts\Validation\Factory
 * @see \Illuminate\Contracts\Validation\Validator
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Validation
 */
interface ValidatorAware {

    /**
     * Set the given validator
     *
     * @param Factory $factory Instance of a validator factory
     *
     * @return void
     */
    public function setValidator(Factory $factory);

    /**
     * Get the given validator
     *
     * If no validator has been set, this method will
     * set and return a default validator, if any such
     * value is available
     *
     * @see getDefaultValidator()
     *
     * @return Factory|null validator or null if none validator has been set
     */
    public function getValidator();

    /**
     * Get a default validator value, if any is available
     *
     * @return Factory|null A default validator value or Null if no default value is available
     */
    public function getDefaultValidator();

    /**
     * Check if validator has been set
     *
     * @return bool True if validator has been set, false if not
     */
    public function hasValidator();

    /**
     * Check if a default validator is available or not
     *
     * @return bool True of a default validator is available, false if not
     */
    public function hasDefaultValidator();
}