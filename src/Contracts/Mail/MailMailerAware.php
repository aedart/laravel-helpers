<?php namespace Aedart\Laravel\Helpers\Contracts\Mail;

use Illuminate\Mail\Mailer;

/**
 * <h1>Mail Mailer Aware</h1>
 *
 * Components are able to specify and obtain a Laravel Mailer
 * utility component.
 *
 * @see \Illuminate\Mail\Mailer
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface MailMailerAware {

    /**
     * Set the given mail mailer
     *
     * @param Mailer $mailer Instance of a Laravel Mailer
     *
     * @return void
     */
    public function setMailMailer(Mailer $mailer);

    /**
     * Get the given mail mailer
     *
     * If no mail mailer has been set, this method will
     * set and return a default mail mailer, if any such
     * value is available
     *
     * @see getDefaultMailMailer()
     *
     * @return Mailer|null mail mailer or null if none mail mailer has been set
     */
    public function getMailMailer();

    /**
     * Get a default mail mailer value, if any is available
     *
     * @return Mailer|null A default mail mailer value or Null if no default value is available
     */
    public function getDefaultMailMailer();

    /**
     * Check if mail mailer has been set
     *
     * @return bool True if mail mailer has been set, false if not
     */
    public function hasMailMailer();

    /**
     * Check if a default mail mailer is available or not
     *
     * @return bool True of a default mail mailer is available, false if not
     */
    public function hasDefaultMailMailer();
}