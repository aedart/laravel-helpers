<?php
use Aedart\Laravel\Helpers\Traits\Auth\Access\GateTrait;
use Aedart\Laravel\Helpers\Traits\Auth\AuthManagerTrait;
use Aedart\Laravel\Helpers\Traits\Auth\AuthTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerManagerTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordTrait;
use Aedart\Laravel\Helpers\Traits\Broadcasting\BroadcastFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Broadcasting\BroadcastTrait;
use Aedart\Laravel\Helpers\Traits\Bus\BusTrait;
use Aedart\Laravel\Helpers\Traits\Cache\CacheFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Cache\CacheTrait;
use Aedart\Laravel\Helpers\Traits\Config\ConfigTrait;
use Aedart\Laravel\Helpers\Traits\Console\ArtisanTrait;
use Aedart\Laravel\Helpers\Traits\Cookie\CookieTrait;
use Aedart\Laravel\Helpers\Traits\Database\DBManagerTrait;
use Aedart\Laravel\Helpers\Traits\Database\DBTrait;
use Aedart\Laravel\Helpers\Traits\Database\SchemaTrait;
use Aedart\Laravel\Helpers\Traits\Encryption\CryptTrait;
use Aedart\Laravel\Helpers\Traits\Events\EventTrait;
use Aedart\Laravel\Helpers\Traits\Filesystem\FileTrait;
use Aedart\Laravel\Helpers\Traits\Filesystem\StorageFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Filesystem\StorageTrait;
use Aedart\Laravel\Helpers\Traits\Foundation\AppTrait;
use Aedart\Laravel\Helpers\Traits\Hashing\HashTrait;
use Aedart\Laravel\Helpers\Traits\Http\InputTrait;
use Aedart\Laravel\Helpers\Traits\Http\RequestTrait;
use Aedart\Laravel\Helpers\Traits\Logging\LogTrait;
use Aedart\Laravel\Helpers\Traits\Logging\LogWriterTrait;
use Aedart\Laravel\Helpers\Traits\Logging\PsrLogTrait;
use Aedart\Laravel\Helpers\Traits\Mail\MailMailerTrait;
use Aedart\Laravel\Helpers\Traits\Mail\MailQueueTrait;
use Aedart\Laravel\Helpers\Traits\Mail\MailTrait;
use Aedart\Laravel\Helpers\Traits\Notifications\NotificationDispatcherTrait;
use Aedart\Laravel\Helpers\Traits\Notifications\NotificationFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Queue\BaseQueueTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueManagerTrait;
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
use Aedart\Laravel\Helpers\Traits\Translation\LangTranslatorTrait;
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
use Illuminate\Contracts\Cache\Factory as CacheFactory;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Illuminate\Contracts\Filesystem\Factory as StorageFactory;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Mail\Mailer as MailerInterface;
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
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Cookie\CookieJar;
use Illuminate\Database\ConnectionInterface as DbConnectionInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Schema\Builder as SchemaBuilder;
use Illuminate\Filesystem\Filesystem as NativeFilesystem;
use Illuminate\Http\Request;
use Illuminate\Log\Writer;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\Queue;
use Illuminate\Queue\QueueManager;
use Illuminate\Redis\Connections\Connection;
use Illuminate\Routing\Redirector;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config as ConfigFacade;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use Psr\Log\LoggerInterface;
use Symfony\Component\Translation\TranslatorInterface;
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

        // HOTFIX, see https://github.com/orchestral/testbench/pull/128
        // This can be removed again, when fixed by author
        if(!ConfigFacade::has('broadcasting.connections.null')){
            ConfigFacade::set('broadcasting.connections.null', [
                'driver' => 'null'
            ]);
        }

        // HOTFIX, see https://github.com/orchestral/testbench/pull/129
        // This can be removed again, when fixed by author
        $providers = ConfigFacade::get('app.providers');
        if(!in_array(\Illuminate\Notifications\NotificationServiceProvider::class, $providers)){
            App::register(\Illuminate\Notifications\NotificationServiceProvider::class);
        }
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
            'GateTrait'                     => [GateTrait::class, Gate::class, Gate::class],
            'AuthManagerTrait'              => [AuthManagerTrait::class, AuthManager::class, AuthManager::class],
            'AuthTrait'                     => [AuthTrait::class, Guard::class, Guard::class],
            'PasswordBrokerFactoryTrait'    => [PasswordBrokerFactoryTrait::class, PasswordBrokerFactory::class, PasswordBrokerFactory::class],
            'PasswordBrokerManagerTrait'    => [PasswordBrokerManagerTrait::class, PasswordBrokerManager::class, PasswordBrokerManager::class],
            'PasswordTrait'                 => [PasswordTrait::class, PasswordBroker::class, PasswordBroker::class],

            // Broadcasting
            'BroadcastTrait'                => [BroadcastTrait::class, Broadcaster::class, Broadcaster::class],
            'BroadcastFactoryTrait'         => [BroadcastFactoryTrait::class, BroadcastFactory::class, BroadcastFactory::class],

            // Bus
            'BusTrait'                      => [BusTrait::class, BusDispatcher::class, BusDispatcher::class],

            // Cache
            'CacheFactoryTrait'             => [CacheFactoryTrait::class, CacheFactory::class, CacheFactory::class],
            'CacheTrait'                    => [CacheTrait::class, CacheRepository::class, CacheRepository::class],

            // Config
            'ConfigTrait'                   => [ConfigTrait::class, ConfigRepository::class, ConfigRepository::class],

            // Console
            'ArtisanTrait'                  => [ArtisanTrait::class, Kernel::class, Kernel::class],

            // Cookie
            'CookieTrait'                   => [CookieTrait::class, CookieJar::class, CookieJar::class],

            // Database
            'DBManagerTrait'                => [DBManagerTrait::class, DatabaseManager::class, DatabaseManager::class],
            'DBTrait'                       => [DBTrait::class, DbConnectionInterface::class, DbConnectionInterface::class],
            'SchemaTrait'                   => [SchemaTrait::class, SchemaBuilder::class, SchemaBuilder::class],

            // Encryption
            'CryptTrait'                    => [CryptTrait::class, Encrypter::class, Encrypter::class],

            // Events
            'EventTrait'                    => [EventTrait::class, EventDispatcher::class, EventDispatcher::class],

            // Filesystem
            'FileTrait'                     => [FileTrait::class, NativeFilesystem::class, NativeFilesystem::class],
            'StorageFactoryTrait'           => [StorageFactoryTrait::class, StorageFactory::class, StorageFactory::class],
            'StorageTrait'                  => [StorageTrait::class, Filesystem::class, Filesystem::class],

            // Foundation
            'AppTrait'                      => [AppTrait::class, Application::class, Application::class],

            // Hashing
            'HashTrait'                     => [HashTrait::class, Hasher::class, Hasher::class],

            // Http
            'InputTrait'                    => [InputTrait::class, Request::class, Request::class],
            'RequestTrait'                  => [RequestTrait::class, Request::class, Request::class],

            // Logging
            'LogTrait'                      => [LogTrait::class, Log::class, Log::class],
            'LogWriterTrait'                => [LogWriterTrait::class, Writer::class, Writer::class],
            'PsrLogTrait'                   => [PsrLogTrait::class, LoggerInterface::class, LoggerInterface::class],

            // Mail
            'MailMailerTrait'               => [MailMailerTrait::class, Mailer::class, Mailer::class],
            'MailQueueTrait'                => [MailQueueTrait::class, MailQueue::class, MailQueue::class],
            'MailTrait'                     => [MailTrait::class, MailerInterface::class, MailerInterface::class],

            // Notifications
            'NotificationFactoryTrait'      => [NotificationFactoryTrait::class, NotificationFactory::class, NotificationFactory::class],
            'NotificationDispatcherTrait'   => [NotificationDispatcherTrait::class, NotificationDispatcher::class, NotificationDispatcher::class],

            // Queue
            'BaseQueueTrait'                => [BaseQueueTrait::class, Queue::class, Queue::class],
            'QueueFactoryTrait'             => [QueueFactoryTrait::class, QueueFactory::class, QueueFactory::class],
            'QueueManagerTrait'             => [QueueManagerTrait::class, QueueManager::class, QueueManager::class],
            'QueueMonitorTrait'             => [QueueMonitorTrait::class, Monitor::class, Monitor::class],
            'QueueTrait'                    => [QueueTrait::class, QueueInterface::class, QueueInterface::class],

            // Redis
            'RedisTrait'                    => [RedisTrait::class, Connection::class, Connection::class],
            'RedisFactoryTrait'             => [RedisFactoryTrait::class, RedisFactory::class, RedisFactory::class],

            // Routing
            'RedirectTrait'                 => [RedirectTrait::class, Redirector::class, Redirector::class],
            'ResponseTrait'                 => [ResponseTrait::class, ResponseFactory::class, ResponseFactory::class],
            'RouteTrait'                    => [RouteTrait::class, Registrar::class, Registrar::class],
            'URLTrait'                      => [URLTrait::class, UrlGenerator::class, UrlGenerator::class],

            // Session
            'SessionManagerTrait'           => [SessionManagerTrait::class, SessionManager::class, SessionManager::class],
            'SessionTrait'                  => [SessionTrait::class, Session::class, Session::class],

            // Translation
            'LangTrait'                     => [LangTrait::class, Translator::class, Translator::class],
            'LangTranslatorTrait'           => [LangTranslatorTrait::class, TranslatorInterface::class, TranslatorInterface::class],

            // Validation
            'ValidatorTrait'                => [ValidatorTrait::class, ValidationFactory::class, ValidationFactory::class],

            // View
            'BladeTrait'                    => [BladeTrait::class, BladeCompiler::class, BladeCompiler::class],
            'ViewTrait'                     => [ViewTrait::class, ViewFactory::class, ViewFactory::class],
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
     */
    public function cleanup()
    {
        $this->stopApplication();
        m::close();
    }

}