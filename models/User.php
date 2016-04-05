<?php

namespace Doctrine2StepHydration;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class User
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue(strategy="AUTO") */
    public $id;

    /** @ORM\ManyToMany(targetEntity=SocialAccount::class, cascade={"persist"}) */
    public $socialAccounts = [];

    /** @ORM\ManyToMany(targetEntity=Session::class, cascade={"persist"}) */
    public $sessions = [];

    /** @ORM\Column(name="name", type="string") **/
    public $name;

    /** @ORM\Column(name="description1", type="text") **/
    public $description1;

    /** @ORM\Column(name="description2", type="text") **/
    public $description2;

    /** @ORM\Column(name="description3", type="text") **/
    public $description3;
}
