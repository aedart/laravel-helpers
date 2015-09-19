<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Translation\Translator;

/**
 * <h1>Lang Aware</h1>
 *
 * Components are able to specify and obtain a Laravel Translator
 * utility component.
 *
 * @see \Illuminate\Translation\Translator
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface LangAware {

    /**
     * Set the given lang
     *
     * @param Translator $translator Instance of a Laravel Translator
     *
     * @return void
     */
    public function setLang($translator);

    /**
     * Get the given lang
     *
     * If no lang has been set, this method will
     * set and return a default lang, if any such
     * value is available
     *
     * @see getDefaultLang()
     *
     * @return Translator|null lang or null if none lang has been set
     */
    public function getLang();

    /**
     * Get a default lang value, if any is available
     *
     * @return Translator|null A default lang value or Null if no default value is available
     */
    public function getDefaultLang();

    /**
     * Check if lang has been set
     *
     * @return bool True if lang has been set, false if not
     */
    public function hasLang();

    /**
     * Check if a default lang is available or not
     *
     * @return bool True of a default lang is available, false if not
     */
    public function hasDefaultLang();
}