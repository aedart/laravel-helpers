<?php
use Aedart\Laravel\Helpers\Contracts\Auth\Access\GateAware;
use Aedart\Laravel\Helpers\Contracts\Auth\AuthAware;
use Aedart\Laravel\Helpers\Contracts\Auth\AuthManagerAware;
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordAware;
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerManagerAware;
use Aedart\Laravel\Helpers\Contracts\Broadcasting\BroadcastAware;
use Aedart\Laravel\Helpers\Contracts\Bus\BusAware;
use Aedart\Laravel\Helpers\Contracts\Cache\CacheAware;
use Aedart\Laravel\Helpers\Contracts\Cache\CacheFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Config\ConfigAware;
use Aedart\Laravel\Helpers\Contracts\Console\ArtisanAware;
use Aedart\Laravel\Helpers\Contracts\Cookie\CookieAware;
use Aedart\Laravel\Helpers\Contracts\Database\DBAware;
use Aedart\Laravel\Helpers\Contracts\Database\DBManagerAware;
use Aedart\Laravel\Helpers\Contracts\Database\SchemaAware;
use Aedart\Laravel\Helpers\Contracts\Encryption\CryptAware;
use Aedart\Laravel\Helpers\Contracts\Events\EventAware;
use Aedart\Laravel\Helpers\Contracts\Filesystem\FileAware;
use Aedart\Laravel\Helpers\Contracts\Filesystem\StorageAware;
use Aedart\Laravel\Helpers\Contracts\Filesystem\StorageFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Foundation\AppAware;
use Aedart\Laravel\Helpers\Contracts\Hashing\HashAware;
use Aedart\Laravel\Helpers\Contracts\Http\InputAware;
use Aedart\Laravel\Helpers\Contracts\Http\RequestAware;
use Aedart\Laravel\Helpers\Contracts\Logging\LogAware;
use Aedart\Laravel\Helpers\Contracts\Logging\LogWriterAware;
use Aedart\Laravel\Helpers\Contracts\Logging\PsrLogAware;
use Aedart\Laravel\Helpers\Contracts\Mail\MailAware;
use Aedart\Laravel\Helpers\Contracts\Mail\MailMailerAware;
use Aedart\Laravel\Helpers\Contracts\Mail\MailQueueAware;
use Aedart\Laravel\Helpers\Contracts\Queue\BaseQueueAware;
use Aedart\Laravel\Helpers\Contracts\Queue\QueueAware;
use Aedart\Laravel\Helpers\Contracts\Queue\QueueFactoryAware;
use Aedart\Laravel\Helpers\Contracts\Queue\QueueManagerAware;
use Aedart\Laravel\Helpers\Contracts\Queue\QueueMonitorAware;
use Aedart\Laravel\Helpers\Contracts\Redis\RedisAware;
use Aedart\Laravel\Helpers\Contracts\Routing\RedirectAware;
use Aedart\Laravel\Helpers\Contracts\Routing\ResponseAware;
use Aedart\Laravel\Helpers\Contracts\Routing\RouteAware;
use Aedart\Laravel\Helpers\Contracts\Routing\URLAware;
use Aedart\Laravel\Helpers\Contracts\Session\SessionAware;
use Aedart\Laravel\Helpers\Contracts\Session\SessionManagerAware;
use Aedart\Laravel\Helpers\Contracts\Translation\LangAware;
use Aedart\Laravel\Helpers\Contracts\Translation\LangTranslatorAware;
use Aedart\Laravel\Helpers\Contracts\Validation\ValidatorAware;
use Aedart\Laravel\Helpers\Contracts\View\BladeAware;
use Aedart\Laravel\Helpers\Contracts\View\ViewAware;
use Aedart\Laravel\Helpers\Traits\Auth\Access\GateTrait;
use Aedart\Laravel\Helpers\Traits\Auth\AuthManagerTrait;
use Aedart\Laravel\Helpers\Traits\Auth\AuthTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerManagerTrait;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordTrait;
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
use Aedart\Laravel\Helpers\Traits\Queue\BaseQueueTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueFactoryTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueManagerTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueMonitorTrait;
use Aedart\Laravel\Helpers\Traits\Queue\QueueTrait;
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

/**
 * TraitsCompatibilityTest
 *
 * @group compatibility
 * @group all-traits-compatibility
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class TraitsCompatibilityTest extends CompatibilityTestCase
{

    /************************************************************************
     * Data providers
     ***********************************************************************/

    public function compatibilityProvider()
    {
        return [
            // Auth
            'GateTrait / GateAware'                                        => [GateTrait::class, GateAware::class],
            'AuthTrait / AuthAware'                                        => [AuthTrait::class, AuthAware::class],
            'AuthManagerTrait / AuthManagerAware'                          => [AuthManagerTrait::class, AuthManagerAware::class],
            'PasswordBrokerFactoryTrait / PasswordBrokerFactoryAware'      => [PasswordBrokerFactoryTrait::class, PasswordBrokerFactoryAware::class],
            'PasswordBrokerManagerTrait / PasswordBrokerManagerAware'      => [PasswordBrokerManagerTrait::class, PasswordBrokerManagerAware::class],
            'PasswordTrait / PasswordAware'                                => [PasswordTrait::class, PasswordAware::class],

            // Broadcasting
            'BroadcastTrait / BroadcastAware'                               => [BroadcastTrait::class, BroadcastAware::class],

            // Bus
            'BusTrait / BusAware'                                => [BusTrait::class, BusAware::class],

            // Cache
            'CacheTrait / CacheAware'                                => [CacheTrait::class, CacheAware::class],
            'CacheFactoryTrait / CacheFactoryAware'                  => [CacheFactoryTrait::class, CacheFactoryAware::class],

            // Config
            'ConfigTrait / ConfigAware'                         => [ConfigTrait::class, ConfigAware::class],

            // Console
            'ArtisanTrait / ArtisanAware'                  => [ArtisanTrait::class, ArtisanAware::class],

            // Cookie
            'CookieTrait / CookieAware'                  => [CookieTrait::class, CookieAware::class],

            // Database
            'DBTrait / DBAware'                                 => [DBTrait::class, DBAware::class],
            'DBManagerTrait / DBManagerAware'                   => [DBManagerTrait::class, DBManagerAware::class],
            'SchemaTrait / SchemaAware'                         => [SchemaTrait::class, SchemaAware::class],

            // Encryption
            'CryptTrait / CryptAware'                         => [CryptTrait::class, CryptAware::class],

            // Events
            'EventTrait / EventAware'                         => [EventTrait::class, EventAware::class],

            // Filesystem
            'FileTrait / FileAware'                         => [FileTrait::class, FileAware::class],
            'StorageTrait / StorageAware'                   => [StorageTrait::class, StorageAware::class],
            'StorageFactoryTrait / StorageFactoryAware'     => [StorageFactoryTrait::class, StorageFactoryAware::class],

            // Foundation
            'AppTrait / AppAware'     => [AppTrait::class, AppAware::class],

            // Hashing
            'HashTrait / HashAware'     => [HashTrait::class, HashAware::class],

            // Http
            'InputTrait / InputAware'                       => [InputTrait::class, InputAware::class],
            'RequestTrait / RequestAware'                   => [RequestTrait::class, RequestAware::class],

            // Logging
            'LogTrait / LogAware'                           => [LogTrait::class, LogAware::class],
            'LogWriterTrait / LogWriterAware'               => [LogWriterTrait::class, LogWriterAware::class],
            'PsrLogTrait / PsrLogAware'                     => [PsrLogTrait::class, PsrLogAware::class],

            // Mail
            'MailTrait / MailAware'                                 => [MailTrait::class, MailAware::class],
            'MailMailerTrait / MailMailerAware'                     => [MailMailerTrait::class, MailMailerAware::class],
            'MailQueueTrait / MailQueueAware'                       => [MailQueueTrait::class, MailQueueAware::class],

            // Queue
            'BaseQueueTrait / BaseQueueAware'                       => [BaseQueueTrait::class, BaseQueueAware::class],
            'QueueTrait / QueueAware'                               => [QueueTrait::class, QueueAware::class],
            'QueueFactoryTrait / QueueFactoryAware'                 => [QueueFactoryTrait::class, QueueFactoryAware::class],
            'QueueManagerTrait / QueueManagerAware'                 => [QueueManagerTrait::class, QueueManagerAware::class],
            'QueueMonitorTrait / QueueMonitorAware'                 => [QueueMonitorTrait::class, QueueMonitorAware::class],

            // Redis
            'RedisTrait / RedisAware'                 => [RedisTrait::class, RedisAware::class],

            // Routing
            'RedirectTrait / RedirectAware'                 => [RedirectTrait::class, RedirectAware::class],
            'ResponseTrait / ResponseAware'                 => [ResponseTrait::class, ResponseAware::class],
            'RouteTrait / RouteAware'                       => [RouteTrait::class, RouteAware::class],
            'URLTrait / URLAware'                           => [URLTrait::class, URLAware::class],

            // Session
            'SessionTrait / SessionAware'                   => [SessionTrait::class, SessionAware::class],
            'SessionManagerTrait / SessionManagerAware'     => [SessionManagerTrait::class, SessionManagerAware::class],

            // Translation
            'LangTrait / LangAware'                         => [LangTrait::class, LangAware::class],
            'LangTranslatorTrait / LangTranslatorAware'     => [LangTranslatorTrait::class, LangTranslatorAware::class],

            // Validation
            'ValidatorTrait / ValidatorAware'          => [ValidatorTrait::class, ValidatorAware::class],

            // View
            'BladeTrait / BladeAware'          => [BladeTrait::class, BladeAware::class],
            'ViewTrait / ViewAware'            => [ViewTrait::class, ViewAware::class],
        ];
    }

    /************************************************************************
     * Actual tests
     ***********************************************************************/

    /**
     * @test
     *
     * @dataProvider compatibilityProvider
     */
    public function isTraitCompatibleWithInterface($trait, $interface)
    {
        $this->assertTraitCompatibility($trait, $interface);
    }

}