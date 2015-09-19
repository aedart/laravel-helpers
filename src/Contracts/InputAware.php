<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Http\Request;

/**
 * <h1>Input Aware</h1>
 *
 * Components are able to specify and obtain a request (input)
 * utility component.
 *
 * @see \Illuminate\Http\Request
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface InputAware {

    /**
     * Set the given input
     *
     * @param Request $request Instance of a request (input)
     *
     * @return void
     */
    public function setInput(Request $request);

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
    public function getInput();

    /**
     * Get a default input value, if any is available
     *
     * @return Request|null A default input value or Null if no default value is available
     */
    public function getDefaultInput();

    /**
     * Check if input has been set
     *
     * @return bool True if input has been set, false if not
     */
    public function hasInput();

    /**
     * Check if a default input is available or not
     *
     * @return bool True of a default input is available, false if not
     */
    public function hasDefaultInput();

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
    public function get($key = null, $default = null);
}