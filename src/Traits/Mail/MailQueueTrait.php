<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Mail;

use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Support\Facades\Mail;

/**
 * @deprecated Use \Aedart\Support\Helpers\Mail\MailQueueTrait, in aedart/athenaeum package
 *
 * Mail Queue Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Mail\MailQueueAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Mail
 */
trait MailQueueTrait
{
    /**
     * Mail Queue Instance
     *
     * @var MailQueue|null
     */
    protected $mailQueue = null;

    /**
     * Set mail queue
     *
     * @param MailQueue|null $queue Mail Queue Instance
     *
     * @return self
     */
    public function setMailQueue(?MailQueue $queue)
    {
        $this->mailQueue = $queue;

        return $this;
    }

    /**
     * Get mail queue
     *
     * If no mail queue has been set, this method will
     * set and return a default mail queue, if any such
     * value is available
     *
     * @see getDefaultMailQueue()
     *
     * @return MailQueue|null mail queue or null if none mail queue has been set
     */
    public function getMailQueue(): ?MailQueue
    {
        if (!$this->hasMailQueue()) {
            $this->setMailQueue($this->getDefaultMailQueue());
        }
        return $this->mailQueue;
    }

    /**
     * Check if mail queue has been set
     *
     * @return bool True if mail queue has been set, false if not
     */
    public function hasMailQueue(): bool
    {
        return isset($this->mailQueue);
    }

    /**
     * Get a default mail queue value, if any is available
     *
     * @return MailQueue|null A default mail queue value or Null if no default value is available
     */
    public function getDefaultMailQueue(): ?MailQueue
    {
        return Mail::getFacadeRoot();
    }
}
