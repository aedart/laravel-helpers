<?php

namespace Aedart\Laravel\Helpers\Traits\Mail;

use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

/**
 * <h1>Mail Mailer Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Mail\MailMailerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait MailMailerTrait
{
    /**
     * Instance of a Laravel Mailer
     *
     * @var Mailer|null
     */
    protected $mailMailer = null;

    /**
     * Set the given mail mailer
     *
     * @param Mailer $mailer Instance of a Laravel Mailer
     *
     * @return void
     */
    public function setMailMailer(Mailer $mailer)
    {
        $this->mailMailer = $mailer;
    }

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
    public function getMailMailer()
    {
        if (!$this->hasMailMailer() && $this->hasDefaultMailMailer()) {
            $this->setMailMailer($this->getDefaultMailMailer());
        }
        return $this->mailMailer;
    }

    /**
     * Get a default mail mailer value, if any is available
     *
     * @return Mailer|null A default mail mailer value or Null if no default value is available
     */
    public function getDefaultMailMailer()
    {
        return Mail::getFacadeRoot();
    }

    /**
     * Check if mail mailer has been set
     *
     * @return bool True if mail mailer has been set, false if not
     */
    public function hasMailMailer()
    {
        return isset($this->mailMailer);
    }

    /**
     * Check if a default mail mailer is available or not
     *
     * @return bool True of a default mail mailer is available, false if not
     */
    public function hasDefaultMailMailer()
    {
        $default = $this->getDefaultMailMailer();
        return isset($default);
    }
}