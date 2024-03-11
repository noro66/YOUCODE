<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Event $event): bool
    {
        if($user->organizer){
        return  $user->organizer->id === $event->added_by;
        }
        return  false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Event $event): bool
    {
        if ($user->organizer) {
        return  ($user->organizer->id === $event->added_by && $event->seats === $event->available_sats);
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */

    public function delete(User $user, Event $event): bool
    {
        if ($user->organizer) {
        return  ($user->organizer->id === $event->added_by && $event->status === 'Pending' );
        }
        return  false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function reserve(User $user, Event $event): bool
    {
        if ($user->participant) {
            return (!($event->reservedBy($user)) && $event->status === 'Approved');
        }
        return false;
    }

    public function canselReservation(User $user, Event $event): bool
    {
        if ($user->participant) {
            return ($event->reservedBy($user));
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Event $event): bool
    {
        //
    }
}
