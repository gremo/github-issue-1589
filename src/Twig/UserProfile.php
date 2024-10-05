<?php

namespace App\Twig;

use App\Model\UserWithVirtualProperty;
use App\Model\UserWithVirtualPropertyAsGetter;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent]
class UserProfile
{
    use DefaultActionTrait;

    #[LiveProp]
    public ?UserWithVirtualPropertyAsGetter $user1 = null;

    #[LiveProp]
    public ?UserWithVirtualProperty $user2 = null;

    #[LiveAction]
    public function fetchUser1(): void
    {
        // Assigning the user to the live property will throw an exception
        // because the method to retrieve the fullName starts with "get".
        $user = new UserWithVirtualPropertyAsGetter();
        $user->firstName = 'John';
        $user->lastName = 'Doe';

        $this->user1 = $user;
    }

    #[LiveAction]
    public function fetchUser2(): void
    {
        // Assigning the user to the live property is safe here because
        // the method to retrieve the fullName does not start with "get".
        $user = new UserWithVirtualProperty();
        $user->firstName = 'John';
        $user->lastName = 'Doe';

        $this->user2 = $user;
    }
}
