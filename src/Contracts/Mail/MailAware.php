<?php namespace Aedart\Laravel\Helpers\Contracts\Mail;

use Illuminate\Contracts\Mail\Mailer;

/**
 * <h1>Mail Aware</h1>
 *
 * Components are able to specify and obtain a Mail-sender
 * utility component.
 *
 * @see \Illuminate\Contracts\Mail\Mailer
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface MailAware {

    /**
     * Set the given mail
     *
     * @param Mailer $mailer Instance of a Mail-sender component
     *
     * @return void
     */
    public function setMail(Mailer $mailer);

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
    public function getMail();

    /**
     * Get a default mail value, if any is available
     *
     * @return Mailer|null A default mail value or Null if no default value is available
     */
    public function getDefaultMail();

    /**
     * Check if mail has been set
     *
     * @return bool True if mail has been set, false if not
     */
    public function hasMail();

    /**
     * Check if a default mail is available or not
     *
     * @return bool True of a default mail is available, false if not
     */
    public function hasDefaultMail();
}