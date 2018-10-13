<?php

namespace Aedart\Laravel\Helpers\Contracts\Mail;

use Illuminate\Contracts\Mail\Mailer;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Mail\MailerAware, in aedart/athenaeum package
 *
 * Mailer Aware
 *
 * @see \Illuminate\Contracts\Mail\Mailer
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Mail
 */
interface MailerAware
{
    /**
     * Set mailer
     *
     * @param Mailer|null $mailer Mailer Instance
     *
     * @return self
     */
    public function setMailer(?Mailer $mailer);

    /**
     * Get mailer
     *
     * If no mailer has been set, this method will
     * set and return a default mailer, if any such
     * value is available
     *
     * @see getDefaultMailer()
     *
     * @return Mailer|null mailer or null if none mailer has been set
     */
    public function getMailer(): ?Mailer;

    /**
     * Check if mailer has been set
     *
     * @return bool True if mailer has been set, false if not
     */
    public function hasMailer(): bool;

    /**
     * Get a default mailer value, if any is available
     *
     * @return Mailer|null A default mailer value or Null if no default value is available
     */
    public function getDefaultMailer(): ?Mailer;
}
