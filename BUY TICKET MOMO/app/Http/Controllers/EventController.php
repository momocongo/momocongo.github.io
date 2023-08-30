<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('id', 'desc')->paginate(10);

        return view('backend.superadmin.events.index', compact('events'));
    }

    public function create() {
        $event = new Event();
        $typeEvents = TypeEvent::all()->pluck('name', 'id')->prepend("Type d'évènements", "");
        return view('backend.superadmin.events.create_events', compact('event', 'typeEvents'));
    }

    public function edit($id) {
        $event =  Event::find($id);
        $typeEvents = TypeEvent::all()->pluck('name', 'id')->prepend("Type d'évènements", "");
        return view('backend.superadmin.events.edit_events', compact('event', 'typeEvents'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'lieu' => 'required',
            'date_heure_debut' => 'required',
            'date_heure_fin' => 'required',
            'prix_ticket' => 'required',
            'type_event_id' => 'required'// Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $event = new Event();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/images'), $filename);
            $data['image'] = $filename;
        }

        $event->create($data);


        $notification = [
            'message' => 'Evènement enregistré avec succès!',
            'alert-type' => 'success'
        ];

        return redirect()->route('superadmin.index_event')->with($notification);
    }


    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'lieu' => 'required',
            'date_heure_debut' => 'required',
            'date_heure_fin' => 'required',
            'prix_ticket' => 'required'// Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $event = Event::findOrFail($id);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/images'), $filename);
            $data['image'] = $filename;
        }

        $event->update($data);


        $notification = [
            'message' => 'Evènement enregistré avec succès!',
            'alert-type' => 'success'
        ];

        return redirect()->route('superadmin.index_event')->with($notification);
    }
    public function show($id) {
        $event = Event::findOrFail($id);
        return view('backend.superadmin.events.show', compact('event'));
    }

    public function destroy($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        return view('supradmin.events.show', compact('event'));
    }
}
