<?php

namespace Aedart\Laravel\Helpers\Contracts\Translation;

use Illuminate\Contracts\Translation\Translator;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Translation\TranslatorAware, in aedart/athenaeum package
 *
 * Lang Aware
 *
 * @see \Illuminate\Contracts\Translation\Translator
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Translation
 */
interface LangAware
{
    /**
     * Set lang
     *
     * @param Translator|null $translator Translator Instance
     *
     * @return self
     */
    public function setLang(?Translator $translator);

    /**
     * Get lang
     *
     * If no lang has been set, this method will
     * set and return a default lang, if any such
     * value is available
     *
     * @see getDefaultLang()
     *
     * @return Translator|null lang or null if none lang has been set
     */
    public function getLang(): ?Translator;

    /**
     * Check if lang has been set
     *
     * @return bool True if lang has been set, false if not
     */
    public function hasLang(): bool;

    /**
     * Get a default lang value, if any is available
     *
     * @return Translator|null A default lang value or Null if no default value is available
     */
    public function getDefaultLang(): ?Translator;
}
