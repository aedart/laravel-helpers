<?php namespace Aedart\Laravel\Helpers\Traits\Translation;

use Illuminate\Support\Facades\Lang;
use Illuminate\Contracts\Translation\Translator;

/**
 * <h1>Lang Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Translation\LangAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait LangTrait {

    /**
     * Instance of a Laravel Translator
     *
     * @var Translator|null
     */
    protected $lang = null;

    /**
     * Set the given lang
     *
     * @param Translator $translator Instance of a Laravel Translator
     *
     * @return void
     */
    public function setLang(Translator $translator) {
        $this->lang = $translator;
    }

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
    public function getLang() {
        if (!$this->hasLang() && $this->hasDefaultLang()) {
            $this->setLang($this->getDefaultLang());
        }
        return $this->lang;
    }

    /**
     * Get a default lang value, if any is available
     *
     * @return Translator|null A default lang value or Null if no default value is available
     */
    public function getDefaultLang() {
        return Lang::getFacadeRoot();
    }

    /**
     * Check if lang has been set
     *
     * @return bool True if lang has been set, false if not
     */
    public function hasLang() {
        if (!is_null($this->lang)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default lang is available or not
     *
     * @return bool True of a default lang is available, false if not
     */
    public function hasDefaultLang() {
        if (!is_null($this->getDefaultLang())) {
            return true;
        }
        return false;
    }
}