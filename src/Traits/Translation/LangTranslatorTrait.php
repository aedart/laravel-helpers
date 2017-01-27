<?php

namespace Aedart\Laravel\Helpers\Traits\Translation;

use Illuminate\Support\Facades\Lang;
use Illuminate\Translation\Translator;

/**
 * <h1>Lang Translator Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Translation\LangTranslatorAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait LangTranslatorTrait
{
    /**
     * Instance of a translator
     *
     * @var Translator|null
     */
    protected $langTranslator = null;

    /**
     * Set the given lang translator
     *
     * @param Translator $translator Instance of a translator
     *
     * @return void
     */
    public function setLangTranslator(Translator $translator)
    {
        $this->langTranslator = $translator;
    }

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
    public function getLangTranslator()
    {
        if (!$this->hasLangTranslator() && $this->hasDefaultLangTranslator()) {
            $this->setLangTranslator($this->getDefaultLangTranslator());
        }
        return $this->langTranslator;
    }

    /**
     * Get a default lang translator value, if any is available
     *
     * @return Translator|null A default lang translator value or Null if no default value is available
     */
    public function getDefaultLangTranslator()
    {
        return Lang::getFacadeRoot();
    }

    /**
     * Check if lang translator has been set
     *
     * @return bool True if lang translator has been set, false if not
     */
    public function hasLangTranslator()
    {
        return isset($this->langTranslator);
    }

    /**
     * Check if a default lang translator is available or not
     *
     * @return bool True of a default lang translator is available, false if not
     */
    public function hasDefaultLangTranslator()
    {
        $default = $this->getDefaultLangTranslator();
        return isset($default);
    }
}