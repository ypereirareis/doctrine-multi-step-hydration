<?php

require_once 'common.php';

use Doctrine2StepHydration\User;

/* @var $entityManager \Doctrine\ORM\EntityManager */
$entityManager = require __DIR__ . '/bootstrap.php';

/* @var $users User[] */
$users = $entityManager
    ->createQuery('
        SELECT
            u, a
        FROM
            ' . User::class . ' u
        LEFT JOIN
            u.socialAccounts a
    ')
    ->getResult();

$entityManager
    ->createQuery('
        SELECT partial
            u.{id}, s
        FROM
            ' . User::class . ' u
        LEFT JOIN
            u.sessions s
    ')
    ->getResult();

$fetchedRecords = 0;

foreach ($users as $user) {
    $fetchedRecords += 1;
    $fetchedRecords += count($user->socialAccounts);
    $fetchedRecords += count($user->sessions);
}

echo sprintf('Fetched records: %d', $fetchedRecords)."\n";
echo getMemoryUsage()."\n";
