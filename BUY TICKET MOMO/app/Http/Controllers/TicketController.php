<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
//use BaconQrCode\Encoder\QrCode;
//use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
//use BaconQrCode\Renderer\ImageRenderer;
//use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use Illuminate\Http\Request;
use Bmatovu\MtnMomo\Products\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class TicketController extends Controller
{
//    private function generateQrCode($event, $user) {
//        $renderer = new ImageRenderer(
//            new RendererStyle(400),
//            new ImagickImageBackEnd()
//        );
//
//        $ticketData = "Event: {$event->name}\nUser: {$user->name}\nTicket ID: {$user->id}-{$event->id}";
//        $qrCode = new QrCode($ticketData);
//
//        return Storage::put('qrcodes/' .$user->id. '-' .$event->id.'.png', $qrCode->render($renderer));
//
//    }
    public function index() {
        $tickets = [];

        if (auth()->check()) {
            if (auth()->user()->role === 'organizer') {
                $tickets = Ticket::orderBy('id', 'desc')->paginate(10);
            }
            else {
                $tickets = Ticket::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->paginate(10);
            }
        }


        return view('backend.superadmin.tickets.index', compact('tickets'));
    }
    public function buyTicket(Request $request) {
        $notification = [];
        $event = Event::find($request->event_id);
        $user = Auth::user();
        $collection = new Collection();
        $numero_momo = $request->telephone;
        $montant = str($event->prix_ticket);
        $id_trans = 'REF-' . random_int(10000, 1000000);
        $transaction_id = $collection->requestToPay($id_trans, $numero_momo, $montant);
        $stat = $collection->getTransactionStatus($transaction_id);
        if ($stat["status"] == "SUCCESSFUL") {
            $uuid = Str::uuid()->toString();
            Ticket::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'ticket_number' => $uuid,
                'code_qr' => QrCode::size(320)->style('round')->merge('backend/assets/images/logomomo.jpg', .3, true)->generate($uuid),
                'status' => 'non-utilise',
                'prix_paye' => $event->prix_ticket
                ]);
            $notification = [
                'message' => 'Paiement effectué avec succès!',
                'alert-type' => 'success'
            ];
            } else {
            $notification = [
                'message' => 'Paiement échoué!!!',
                'alert-type' => 'error'
            ];
            }


        return redirect()->route('superadmin.ticket')->with($notification);
    }

    public function showTicket($id) {
        $ticket = Ticket::find($id);
        return view('backend.superadmin.tickets.show', compact('ticket'));
    }
}
