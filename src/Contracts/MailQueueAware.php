<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Contracts\Mail\MailQueue;

/**
 * <h1>Mail Queue Aware</h1>
 *
 * Components are able to specify and obtain a Mail-queue
 * utility component.
 *
 * @see \Illuminate\Contracts\Mail\MailQueue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface MailQueueAware {

    /**
     * Set the given mail queue
     *
     * @param MailQueue $queue Instance of a Mail-Queue
     *
     * @return void
     */
    public function setMailQueue(MailQueue $queue);

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
    public function getMailQueue();

    /**
     * Get a default mail queue value, if any is available
     *
     * @return MailQueue|null A default mail queue value or Null if no default value is available
     */
    public function getDefaultMailQueue();

    /**
     * Check if mail queue has been set
     *
     * @return bool True if mail queue has been set, false if not
     */
    public function hasMailQueue();

    /**
     * Check if a default mail queue is available or not
     *
     * @return bool True of a default mail queue is available, false if not
     */
    public function hasDefaultMailQueue();
}