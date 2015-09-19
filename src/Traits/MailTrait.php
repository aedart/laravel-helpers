<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

/**
 * <h1>Mail Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\MailAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait MailTrait {

    /**
     * Instance of a Mail-sender component
     *
     * @var Mailer|null
     */
    protected $mail = null;

    /**
     * Set the given mail
     *
     * @param Mailer $mailer Instance of a Mail-sender component
     *
     * @return void
     */
    public function setMail(Mailer $mailer) {
        $this->mail = $mailer;
    }

    /**
     * Get the given mail
     *
     * If no mail has been set, this method will
     * set and return a default mail, if any such
     * value is available
     *
     * @see getDefaultMail()
     *
     * @return Mailer|null mail or null if none mail has been set
     */
    public function getMail() {
        if (!$this->hasMail() && $this->hasDefaultMail()) {
            $this->setMail($this->getDefaultMail());
        }
        return $this->mail;
    }

    /**
     * Get a default mail value, if any is available
     *
     * @return Mailer|null A default mail value or Null if no default value is available
     */
    public function getDefaultMail() {
        return Mail::getFacadeRoot();
    }

    /**
     * Check if mail has been set
     *
     * @return bool True if mail has been set, false if not
     */
    public function hasMail() {
        if (!is_null($this->mail)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default mail is available or not
     *
     * @return bool True of a default mail is available, false if not
     */
    public function hasDefaultMail() {
        if (!is_null($this->getDefaultMail())) {
            return true;
        }
        return false;
    }
}