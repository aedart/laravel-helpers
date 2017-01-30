<?php

namespace Aedart\Laravel\Helpers\Traits\Validation;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\Facades\Validator;

/**
 * <h1>Validator Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Validation\ValidatorAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Validation
 */
trait ValidatorTrait
{
    /**
     * Instance of a validator factory
     *
     * @var Factory|null
     */
    protected $validator = null;

    /**
     * Set the given validator
     *
     * @param Factory $factory Instance of a validator factory
     *
     * @return void
     */
    public function setValidator(Factory $factory)
    {
        $this->validator = $factory;
    }

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
    public function getValidator()
    {
        if (!$this->hasValidator() && $this->hasDefaultValidator()) {
            $this->setValidator($this->getDefaultValidator());
        }
        return $this->validator;
    }

    /**
     * Get a default validator value, if any is available
     *
     * @return Factory|null A default validator value or Null if no default value is available
     */
    public function getDefaultValidator()
    {
        return Validator::getFacadeRoot();
    }

    /**
     * Check if validator has been set
     *
     * @return bool True if validator has been set, false if not
     */
    public function hasValidator()
    {
        return isset($this->validator);
    }

    /**
     * Check if a default validator is available or not
     *
     * @return bool True of a default validator is available, false if not
     */
    public function hasDefaultValidator()
    {
        $default = $this->getDefaultValidator();
        return isset($default);
    }
}