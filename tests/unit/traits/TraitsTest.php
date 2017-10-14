<?php

use Aedart\Laravel\Helpers\Contracts\Auth\Access\GateAware;
use Aedart\Laravel\Helpers\Contracts\Auth\AuthAware;
use Aedart\Laravel\Helpers\Contracts\Auth\AuthFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Auth\AuthManagerAware;
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordAware;
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerManagerAware;
use Aedart\Laravel\Helpers\Contracts\Broadcasting\BroadcastAware;
use Aedart\Laravel\Helpers\Contracts\Broadcasting\BroadcastFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Bus\BusAware;
use Aedart\Laravel\Helpers\Contracts\Bus\QueueingBusAware;
use Aedart\Laravel\Helpers\Contracts\Cache\CacheAware;
use Aedart\Laravel\Helpers\Contracts\Cache\CacheFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Cache\CacheStoreAware;
use Aedart\Laravel\Helpers\Contracts\Config\ConfigAware;
use Aedart\Laravel\Helpers\Contracts\Console\ArtisanAware;
use Aedart\Laravel\Helpers\Contracts\Container\ContainerAware;
use Aedart\Laravel\Helpers\Contracts\Cookie\CookieAware;
use Aedart\Laravel\Helpers\Contracts\Cookie\QueueingCookieAware;
use Aedart\Laravel\Helpers\Contracts\Database\DBAware;
use Aedart\Laravel\Helpers\Contracts\Database\DBManagerAware;
use Aedart\Laravel\Helpers\Contracts\Database\SchemaAware;
use Aedart\Laravel\Helpers\Contracts\Encryption\CryptAware;
use Aedart\Laravel\Helpers\Contracts\Events\EventAware;
use Aedart\Laravel\Helpers\Contracts\Filesystem\CloudStorageAware;
use Aedart\Laravel\Helpers\Contracts\Filesystem\FileAware;
use Aedart\Laravel\Helpers\Contracts\Filesystem\StorageAware;
use Aedart\Laravel\Helpers\Contracts\Filesystem\StorageFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Foundation\AppAware;
use Aedart\Laravel\Helpers\Contracts\Hashing\HashAware;
use Aedart\Laravel\Helpers\Contracts\Http\RequestAware;
use Aedart\Laravel\Helpers\Contracts\Logging\LogAware;
use Aedart\Laravel\Helpers\Contracts\Logging\LogWriterAware;
use Aedart\Laravel\Helpers\Contracts\Logging\PsrLogAware;
use Aedart\Laravel\Helpers\Contracts\Mail\MailerAware;
use Aedart\Laravel\Helpers\Contracts\Mail\MailQueueAware;
use Aedart\Laravel\Helpers\Contracts\Notifications\NotificationDispatcherAware;
use Aedart\Laravel\Helpers\Contracts\Notifications\NotificationFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Queue\QueueAware;
use Aedart\Laravel\Helpers\Contracts\Queue\QueueFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Queue\QueueMonitorAware;
use Aedart\Laravel\Helpers\Contracts\Redis\RedisAware;
use Aedart\Laravel\Helpers\Contracts\Redis\RedisFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Routing\RedirectAware;
use Aedart\Laravel\Helpers\Contracts\Routing\ResponseAware;
use Aedart\Laravel\Helpers\Contracts\Routing\RouteAware;
use Aedart\Laravel\Helpers\Contracts\Routing\URLAware;
use Aedart\Laravel\Helpers\Contracts\Session\SessionAware;
use Aedart\Laravel\Helpers\Contracts\Session\SessionManagerAware;
use Aedart\Laravel\Helpers\Contracts\Translation\LangAware;
use Aedart\Laravel\Helpers\Contracts\Validation\ValidatorAware;
use Aedart\Laravel\Helpers\Contracts\View\BladeAware;
use Aedart\Laravel\Helpers\Contracts\View\ViewAware;
use Aedart\Laravel\Helpers\Traits\Auth\Access\GateTrait;
use Aedart\Laravel\Helpers\Traits\Auth\AuthFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Auth\AuthManagerTrait;
use Aedart\Laravel\Helpers\Traits\Auth\AuthTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerManagerTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordTrait;
use Aedart\Laravel\Helpers\Traits\Broadcasting\BroadcastFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Broadcasting\BroadcastTrait;
use Aedart\Laravel\Helpers\Traits\Bus\BusTrait;
use Aedart\Laravel\Helpers\Traits\Bus\QueueingBusTrait;
use Aedart\Laravel\Helpers\Traits\Cache\CacheFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Cache\CacheStoreTrait;
use Aedart\Laravel\Helpers\Traits\Cache\CacheTrait;
use Aedart\Laravel\Helpers\Traits\Config\ConfigTrait;
use Aedart\Laravel\Helpers\Traits\Console\ArtisanTrait;
use Aedart\Laravel\Helpers\Traits\Container\ContainerTrait;
use Aedart\Laravel\Helpers\Traits\Cookie\CookieTrait;
use Aedart\Laravel\Helpers\Traits\Cookie\QueueingCookieTrait;
use Aedart\Laravel\Helpers\Traits\Database\DBManagerTrait;
use Aedart\Laravel\Helpers\Traits\Database\DBTrait;
use Aedart\Laravel\Helpers\Traits\Database\SchemaTrait;
use Aedart\Laravel\Helpers\Traits\Encryption\CryptTrait;
use Aedart\Laravel\Helpers\Traits\Events\EventTrait;
use Aedart\Laravel\Helpers\Traits\Filesystem\CloudStorageTrait;
use Aedart\Laravel\Helpers\Traits\Filesystem\FileTrait;
use Aedart\Laravel\Helpers\Traits\Filesystem\StorageFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Filesystem\StorageTrait;
use Aedart\Laravel\Helpers\Traits\Foundation\AppTrait;
use Aedart\Laravel\Helpers\Traits\Hashing\HashTrait;
use Aedart\Laravel\Helpers\Traits\Http\RequestTrait;
use Aedart\Laravel\Helpers\Traits\Logging\LogTrait;
use Aedart\Laravel\Helpers\Traits\Logging\LogWriterTrait;
use Aedart\Laravel\Helpers\Traits\Logging\PsrLogTrait;
use Aedart\Laravel\Helpers\Traits\Mail\MailerTrait;
use Aedart\Laravel\Helpers\Traits\Mail\MailQueueTrait;
use Aedart\Laravel\Helpers\Traits\Notifications\NotificationDispatcherTrait;
use Aedart\Laravel\Helpers\Traits\Notifications\NotificationFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueMonitorTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueTrait;
use Aedart\Laravel\Helpers\Traits\Redis\RedisFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Redis\RedisTrait;
use Aedart\Laravel\Helpers\Traits\Routing\RedirectTrait;
use Aedart\Laravel\Helpers\Traits\Routing\ResponseTrait;
use Aedart\Laravel\Helpers\Traits\Routing\RouteTrait;
use Aedart\Laravel\Helpers\Traits\Routing\URLTrait;
use Aedart\Laravel\Helpers\Traits\Session\SessionManagerTrait;
use Aedart\Laravel\Helpers\Traits\Session\SessionTrait;
use Aedart\Laravel\Helpers\Traits\Translation\LangTrait;
use Aedart\Laravel\Helpers\Traits\Validation\ValidatorTrait;
use Aedart\Laravel\Helpers\Traits\View\BladeTrait;
use Aedart\Laravel\Helpers\Traits\View\ViewTrait;
use Illuminate\Auth\AuthManager;
use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\PasswordBrokerFactory;
use Illuminate\Contracts\Broadcasting\Broadcaster;
use Illuminate\Contracts\Broadcasting\Factory as BroadcastFactory;
use Illuminate\Contracts\Bus\Dispatcher as BusDispatcher;
use Illuminate\Contracts\Bus\QueueingDispatcher;
use Illuminate\Contracts\Cache\Factory as CacheFactory;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Cookie\Factory as CookieFactory;
use Illuminate\Contracts\Cookie\QueueingFactory as QueueingCookieFactory;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Filesystem\Factory as StorageFactory;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Contracts\Notifications\Dispatcher as NotificationDispatcher;
use Illuminate\Contracts\Notifications\Factory as NotificationFactory;
use Illuminate\Contracts\Queue\Factory as QueueFactory;
use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Contracts\Queue\Queue as QueueInterface;
use Illuminate\Contracts\Redis\Factory as RedisFactory;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Translation\Translator as TranslatorInterface;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Database\ConnectionInterface as DbConnectionInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Schema\Builder as SchemaBuilder;
use Illuminate\Filesystem\Filesystem as NativeFilesystem;
use Illuminate\Http\Request;
use Illuminate\Log\Writer;
use Illuminate\Redis\Connections\Connection;
use Illuminate\Routing\Redirector;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Config as ConfigFacade;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use Psr\Log\LoggerInterface;
use Faker\Factory as FakerFactory;
use \Mockery as m;

/**
 * TraitsTest
 *
 * @group unit
 * @group traits
 * @group all-traits
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class TraitsTest extends TraitTestCase
{

    public function _before()
    {
        // We have a problem here in that foreach fixture,
        // from the traitsProvider() method, the _before()
        // and _after() method are invoked. This is painfully
        // slow.

        // Avoid traditional startup...
        //parent::_before();

        // Create faker if needed
        if(!isset($this->faker)){
            $this->faker = FakerFactory::create();
        }

        // Start Laravel app.
        if(!$this->hasApplicationBeenStarted()){
            $this->startApplication();
        }

        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        ConfigFacade::set('app.key', Str::random(32));
    }

    public function _after()
    {
        // Prevent laravel from stopping, as this just increases
        // the time it takes to execute
        // @see cleanup() inside this test
    }

    /************************************************************************
     * Data providers
     ***********************************************************************/

    public function traitsProvider()
    {
        return [
            // Auth
            'GateTrait'                     => [GateTrait::class, GateAware::class, Gate::class],
            'AuthManagerTrait'              => [AuthManagerTrait::class, AuthManagerAware::class, AuthManager::class],
            'AuthFactoryTrait'              => [AuthFactoryTrait::class, AuthFactoryAware::class, AuthManager::class],
            'AuthTrait'                     => [AuthTrait::class, AuthAware::class, Guard::class],
            'PasswordBrokerFactoryTrait'    => [PasswordBrokerFactoryTrait::class, PasswordBrokerFactoryAware::class, PasswordBrokerFactory::class],
            'PasswordBrokerManagerTrait'    => [PasswordBrokerManagerTrait::class, PasswordBrokerManagerAware::class, PasswordBrokerManager::class],
            'PasswordTrait'                 => [PasswordTrait::class, PasswordAware::class, PasswordBroker::class],

            // Broadcasting
            'BroadcastTrait'                => [BroadcastTrait::class, BroadcastAware::class, Broadcaster::class],
            'BroadcastFactoryTrait'         => [BroadcastFactoryTrait::class, BroadcastFactoryAware::class, BroadcastFactory::class],

            // Bus
            'BusTrait'                      => [BusTrait::class, BusAware::class, BusDispatcher::class],
            'QueueingBusTrait'              => [QueueingBusTrait::class, QueueingBusAware::class, QueueingDispatcher::class],

            // Cache
            'CacheFactoryTrait'             => [CacheFactoryTrait::class, CacheFactoryAware::class, CacheFactory::class],
            'CacheStoreTrait'               => [CacheStoreTrait::class, CacheStoreAware::class, Store::class],
            'CacheTrait'                    => [CacheTrait::class, CacheAware::class, CacheRepository::class],

            // Config
            'ConfigTrait'                   => [ConfigTrait::class, ConfigAware::class, ConfigRepository::class],

            // Console
            'ArtisanTrait'                  => [ArtisanTrait::class, ArtisanAware::class, Kernel::class],

            // Container
            'ContainerTrait'                => [ContainerTrait::class, ContainerAware::class, Container::class],

            // Cookie
            'CookieTrait'                   => [CookieTrait::class, CookieAware::class, CookieFactory::class],
            'QueueingCookieTrait'           => [QueueingCookieTrait::class, QueueingCookieAware::class, QueueingCookieFactory::class],

            // Database
            'DBManagerTrait'                => [DBManagerTrait::class, DBManagerAware::class, DatabaseManager::class],
            'DBTrait'                       => [DBTrait::class, DBAware::class, DbConnectionInterface::class],
            'SchemaTrait'                   => [SchemaTrait::class, SchemaAware::class, SchemaBuilder::class],

            // Encryption
            'CryptTrait'                    => [CryptTrait::class, CryptAware::class, Encrypter::class],

            // Events
            'EventTrait'                    => [EventTrait::class, EventAware::class, EventDispatcher::class],

            // Filesystem
            'FileTrait'                     => [FileTrait::class, FileAware::class, NativeFilesystem::class],
            'StorageFactoryTrait'           => [StorageFactoryTrait::class, StorageFactoryAware::class, StorageFactory::class],
            'StorageTrait'                  => [StorageTrait::class, StorageAware::class, Filesystem::class],
            'CloudStorageTrait'             => [CloudStorageTrait::class, CloudStorageAware::class, Cloud::class],

            // Foundation
            'AppTrait'                      => [AppTrait::class, AppAware::class, Application::class],

            // Hashing
            'HashTrait'                     => [HashTrait::class, HashAware::class, Hasher::class],

            // Http
            'RequestTrait'                  => [RequestTrait::class, RequestAware::class, Request::class],

            // Logging
            'LogTrait'                      => [LogTrait::class, LogAware::class, Log::class],
            'LogWriterTrait'                => [LogWriterTrait::class, LogWriterAware::class, Writer::class],
            'PsrLogTrait'                   => [PsrLogTrait::class, PsrLogAware::class, LoggerInterface::class],

            // Mail
            'MailerTrait'                   => [MailerTrait::class, MailerAware::class, Mailer::class],
            'MailQueueTrait'                => [MailQueueTrait::class, MailQueueAware::class, MailQueue::class],

            // Notifications
            'NotificationFactoryTrait'      => [NotificationFactoryTrait::class, NotificationFactoryAware::class, NotificationFactory::class],
            'NotificationDispatcherTrait'   => [NotificationDispatcherTrait::class, NotificationDispatcherAware::class, NotificationDispatcher::class],

            // Queue
            'QueueFactoryTrait'             => [QueueFactoryTrait::class, QueueFactoryAware::class, QueueFactory::class],
            'QueueMonitorTrait'             => [QueueMonitorTrait::class, QueueMonitorAware::class, Monitor::class],
            'QueueTrait'                    => [QueueTrait::class, QueueAware::class, QueueInterface::class],

            // Redis
            'RedisFactoryTrait'             => [RedisFactoryTrait::class, RedisFactoryAware::class, RedisFactory::class],
            'RedisTrait'                    => [RedisTrait::class, RedisAware::class, Connection::class],

            // Routing
            'RedirectTrait'                 => [RedirectTrait::class, RedirectAware::class, Redirector::class],
            'ResponseTrait'                 => [ResponseTrait::class, ResponseAware::class, ResponseFactory::class],
            'RouteTrait'                    => [RouteTrait::class, RouteAware::class, Registrar::class],
            'URLTrait'                      => [URLTrait::class, URLAware::class, UrlGenerator::class],

            // Session
            'SessionManagerTrait'           => [SessionManagerTrait::class, SessionManagerAware::class, SessionManager::class],
            'SessionTrait'                  => [SessionTrait::class, SessionAware::class, Session::class],

            // Translation
            'LangTrait'                     => [LangTrait::class, LangAware::class, TranslatorInterface::class],

            // Validation
            'ValidatorTrait'                => [ValidatorTrait::class, ValidatorAware::class, ValidationFactory::class],

            // View
            'BladeTrait'                    => [BladeTrait::class, BladeAware::class, BladeCompiler::class],
            'ViewTrait'                     => [ViewTrait::class, ViewAware::class, ViewFactory::class],
        ];
    }

    /************************************************************************
     * Actual tests
     ***********************************************************************/

    /**
     * @test
     *
     * @dataProvider traitsProvider
     */
    public function canInvokeTraitMethods($trait, $expectedDefault, $customDefault)
    {
        $this->assertTrait($trait, $expectedDefault, $customDefault);
    }

    /**
     * @test
     *
     * @depends canInvokeTraitMethods
     */
    public function cleanup()
    {
        $this->stopApplication();
        m::close();
    }

}