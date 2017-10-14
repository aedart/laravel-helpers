<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Translation;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Support\Facades\Lang;

/**
 * Lang Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Translation\LangAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Translation
 */
trait LangTrait
{
    /**
     * Translator Instance
     *
     * @var Translator|null
     */
    protected $lang = null;

    /**
     * Set lang
     *
     * @param Translator|null $translator Translator Instance
     *
     * @return self
     */
    public function setLang(?Translator $translator)
    {
        $this->lang = $translator;

        return $this;
    }

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
    public function getLang(): ?Translator
    {
        if (!$this->hasLang()) {
            $this->setLang($this->getDefaultLang());
        }
        return $this->lang;
    }

    /**
     * Check if lang has been set
     *
     * @return bool True if lang has been set, false if not
     */
    public function hasLang(): bool
    {
        return isset($this->lang);
    }

    /**
     * Get a default lang value, if any is available
     *
     * @return Translator|null A default lang value or Null if no default value is available
     */
    public function getDefaultLang(): ?Translator
    {
        return Lang::getFacadeRoot();
    }
}