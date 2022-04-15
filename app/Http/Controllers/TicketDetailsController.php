<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Validation\Rule;

class TicketDetailsController extends Controller
{
    function viewTicketDetailsPage(Request $req, $ticketID)
    {
        if ($req->user()->cannot("actionOnTicket", Ticket::find($ticketID)))
        {
            return redirect("/noaccess");
        }
        
        return view("ticketDetails", ["ticket" => Ticket::find($ticketID)]);
    }

    function viewEditTicketPage(Request $req, $ticketID)
    {
        // if ($req->user()->cannot("actionOnTicket", Ticket::find($ticketID)) || $req->user()->can("overdue", Ticket::find($ticketID)))
        if ($req->user()->cannot("actionOnTicket", Ticket::find($ticketID)) || Ticket::find($ticketID)->overdue())
        {
            return redirect("/noaccess");
        }

        return view("editTicket", ["ticket" => Ticket::find($ticketID)]);
    }

    function editTicket(Request $req, $ticketID)
    {
        // if ($req->user()->cannot("actionOnTicket", Ticket::find($ticketID)) || $req->user()->can("overdue", Ticket::find($ticketID)))
        if ($req->user()->cannot("actionOnTicket", Ticket::find($ticketID)) || Ticket::find($ticketID)->overdue())
        {
            return redirect("/noaccess");
        }

        $req["time"] = $req['time'] . ":00";
        $req["seat"] = $req['seatRow'] . "-" . $req['seatNum'];
        $ticket = Ticket::find($ticketID);

        $req->validate([
            "date" => ["required", "date", "after:today"],
            "time" => ["required", "regex:/^(1\d|2[0-3]):[0-5](0|5):00$/"],
            "seatRow" => ["required", "regex:/^[A-H]$/"],
            "seatNum" => ["required", "regex:/^(0[1-9]|1[0-4])$/"],
            "seat" => [Rule::unique("tickets")->where(function ($query) use ($ticket, $req) {
                return $query->where("movie_id", $ticket["movie_id"])->where("date", $req["date"])->where("time", $req["time"])->where("hall_id", $req["hall"]);
            })]
        ]);

        $ticket["date"] = $req["date"];
        $ticket["time"] = $req["time"];
        $ticket["seat"] = $req["seat"];
        $ticket->save();

        return redirect("/profile");
    }

    function cancelTicket(Request $req, $ticketID)
    {
        // if ($req->user()->cannot("actionOnTicket", Ticket::find($ticketID)) || $req->user()->can("overdue", Ticket::find($ticketID)))
        if ($req->user()->cannot("actionOnTicket", Ticket::find($ticketID)) || Ticket::find($ticketID)->overdue())
        {
            return redirect("/noaccess");
        }

        Ticket::find($ticketID)->delete();
        return redirect("/profile");
    }
}
 