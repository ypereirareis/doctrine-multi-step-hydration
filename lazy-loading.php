<?php

require_once 'common.php';

use Doctrine2StepHydration\User;

/* @var $entityManager \Doctrine\ORM\EntityManager */
$entityManager = require __DIR__ . '/bootstrap.php';

/* @var $users User[] */
$users = $entityManager
    ->getRepository(User::class)
    ->findAll();

$fetchedRecords = 0;

foreach ($users as $user) {
    $fetchedRecords += 1;
    $accounts = $user->socialAccounts;
    $sessions = $user->sessions;

    $fetchedRecords += count($accounts);
    $fetchedRecords += count($sessions);
}


echo sprintf('Fetched records: %d', $fetchedRecords)."\n";
echo getMemoryUsage()."\n";