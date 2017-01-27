<?php

namespace Aedart\Laravel\Helpers\Traits\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/**
 * <h1>Input Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Http\InputAware;
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait InputTrait
{
    /**
     * Instance of a request (input)
     *
     * @var Request|null
     */
    protected $input = null;

    /**
     * Set the given input
     *
     * @param Request $request Instance of a request (input)
     *
     * @return void
     */
    public function setInput(Request $request)
    {
        $this->input = $request;
    }

    /**
     * Get the given input
     *
     * If no input has been set, this method will
     * set and return a default input, if any such
     * value is available
     *
     * @see getDefaultInput()
     *
     * @return Request|null input or null if none input has been set
     */
    public function getInput()
    {
        if (!$this->hasInput() && $this->hasDefaultInput()) {
            $this->setInput($this->getDefaultInput());
        }
        return $this->input;
    }

    /**
     * Get a default input value, if any is available
     *
     * @return Request|null A default input value or Null if no default value is available
     */
    public function getDefaultInput()
    {
        return Input::getFacadeRoot();
    }

    /**
     * Check if input has been set
     *
     * @return bool True if input has been set, false if not
     */
    public function hasInput()
    {
        if (!is_null($this->input)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default input is available or not
     *
     * @return bool True of a default input is available, false if not
     */
    public function hasDefaultInput()
    {
        if (!is_null($this->getDefaultInput())) {
            return true;
        }
        return false;
    }

    /**
     * Get an item from the input
     *
     * @see Input::get()
     *
     * @param string $key [optional]
     * @param mixed $default [optional]
     *
     * @return mixed
     */
    public function get($key = null, $default = null)
    {
        return $this->getInput()->input($key, $default);
    }
}