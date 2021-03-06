<?php

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\DBAL\Driver\PDOSqlite\Driver;
use Doctrine\DBAL\Logging\EchoSQLLogger;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Proxy\ProxyFactory;

require_once __DIR__ . '/vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

$configuration = new Configuration();

$configuration->setMetadataDriverImpl(new AnnotationDriver(new AnnotationReader(), [__DIR__ . '/models']));
$configuration->setProxyDir(sys_get_temp_dir() . '/example' . uniqid());
$configuration->setProxyNamespace('ProxyExample');
$configuration->setAutoGenerateProxyClasses(ProxyFactory::AUTOGENERATE_EVAL);

$entityManager = EntityManager::create(
    [
        'driverClass' => Driver::class,
        'path'        => __DIR__ . '/test-db.sqlite',
    ],
    $configuration
);

$configuration->setSQLLogger(null);

return $entityManager;
