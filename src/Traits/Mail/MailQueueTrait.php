<?php namespace Aedart\Laravel\Helpers\Traits\Mail;

use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Support\Facades\Mail;

/**
 * <h1>Mail Queue Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Mail\MailQueueAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait MailQueueTrait {

    /**
     * Instance of a Mail-Queue
     *
     * @var MailQueue|null
     */
    protected $mailQueue = null;

    /**
     * Set the given mail queue
     *
     * @param MailQueue $queue Instance of a Mail-Queue
     *
     * @return void
     */
    public function setMailQueue(MailQueue $queue) {
        $this->mailQueue = $queue;
    }

    /**
     * Get the given mail queue
     *
     * If no mail queue has been set, this method will
     * set and return a default mail queue, if any such
     * value is available
     *
     * @see getDefaultMailQueue()
     *
     * @return MailQueue|null mail queue or null if none mail queue has been set
     */
    public function getMailQueue() {
        if (!$this->hasMailQueue() && $this->hasDefaultMailQueue()) {
            $this->setMailQueue($this->getDefaultMailQueue());
        }
        return $this->mailQueue;
    }

    /**
     * Get a default mail queue value, if any is available
     *
     * @return MailQueue|null A default mail queue value or Null if no default value is available
     */
    public function getDefaultMailQueue() {
        return Mail::getFacadeRoot();
    }

    /**
     * Check if mail queue has been set
     *
     * @return bool True if mail queue has been set, false if not
     */
    public function hasMailQueue() {
        if (!is_null($this->mailQueue)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default mail queue is available or not
     *
     * @return bool True of a default mail queue is available, false if not
     */
    public function hasDefaultMailQueue() {
        if (!is_null($this->getDefaultMailQueue())) {
            return true;
        }
        return false;
    }
}