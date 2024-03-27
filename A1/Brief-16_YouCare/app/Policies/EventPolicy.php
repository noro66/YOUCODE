<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->type === 'organizer';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Event $event): bool
    {
        return $user->organizer->id = $event->organizer_id;
    }


    public function apply(User $user, Event $event): bool
    {
        if ($user->volunteer) {
            return $event->appliedBy($user) ;
        }
        return false;
    }
}
