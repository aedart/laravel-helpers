<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Validation;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\Facades\Validator;

/**
 * Validator Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Validation\ValidatorAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Validation
 */
trait ValidatorTrait
{
    /**
     * Validator Factory Instance
     *
     * @var Factory|null
     */
    protected $validator = null;

    /**
     * Set validator
     *
     * @param Factory|null $factory Validator Factory Instance
     *
     * @return self
     */
    public function setValidator(?Factory $factory)
    {
        $this->validator = $factory;

        return $this;
    }

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
    public function getValidator(): ?Factory
    {
        if (!$this->hasValidator()) {
            $this->setValidator($this->getDefaultValidator());
        }
        return $this->validator;
    }

    /**
     * Check if validator has been set
     *
     * @return bool True if validator has been set, false if not
     */
    public function hasValidator(): bool
    {
        return isset($this->validator);
    }

    /**
     * Get a default validator value, if any is available
     *
     * @return Factory|null A default validator value or Null if no default value is available
     */
    public function getDefaultValidator(): ?Factory
    {
        return Validator::getFacadeRoot();
    }
}