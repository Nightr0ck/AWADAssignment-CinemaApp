<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Carbon;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function overdue(User $user, Ticket $ticket)
    {
        return Carbon::now() > Carbon::parse($ticket["date"] . " " . $ticket["time"]);
    }

    public function actionOnTicket(User $user, Ticket $ticket)
    {
        return $user->username === $ticket->username;
    }
}
