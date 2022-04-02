<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;

class TicketDetailsController extends Controller
{
    function viewTicketDetails(Request $req)
    {
        if ($req->user()->cannot("actionOnTicket", Ticket::find($req->ticketID)))
        {
            abort(403);
        }
        
        return view("ticketDetails");
    }
}
