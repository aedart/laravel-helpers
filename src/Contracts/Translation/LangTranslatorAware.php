<?php

namespace Aedart\Laravel\Helpers\Contracts\Translation;

use Illuminate\Translation\Translator;

/**
 * <h1>Lang Translator Aware</h1>
 *
 * Components are able to specify and obtain a Translator
 * utility component.
 *
 * @see \Illuminate\Translation\Translator
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface LangTranslatorAware
{
    /**
     * Set the given lang translator
     *
     * @param Translator $translator Instance of a translator
     *
     * @return void
     */
    public function setLangTranslator(Translator $translator);

    /**
     * Get the given lang translator
     *
     * If no lang translator has been set, this method will
     * set and return a default lang translator, if any such
     * value is available
     *
     * @see getDefaultLangTranslator()
     *
     * @return Translator|null lang translator or null if none lang translator has been set
     */
    public function getLangTranslator();

    /**
     * Get a default lang translator value, if any is available
     *
     * @return Translator|null A default lang translator value or Null if no default value is available
     */
    public function getDefaultLangTranslator();

    /**
     * Check if lang translator has been set
     *
     * @return bool True if lang translator has been set, false if not
     */
    public function hasLangTranslator();

    /**
     * Check if a default lang translator is available or not
     *
     * @return bool True of a default lang translator is available, false if not
     */
    public function hasDefaultLangTranslator();
}