<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventosController extends Controller
{
    // O nome da função não precisa ser esse
    public function index()
    {
        $eventos = Event::all();

        return view(
            'welcome', ['eventos' => $eventos]
        );
    }

    public function create ()
    {
        return view('eventos.create');
    }

    public function store(Request $request) {
        $event = new Event;

        $event->título = $request->title;
        $event->cidade = $request->cidade;
        $event->eventoPrivado = $request->private;
        $event->descrição = $request->description;

        //Upload imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $event->image = $imageName;

            // var_dump($imageName);die;
            
            // $requestImage->move(public_path('img/eventos', $imageName));
            $requestImage->store("events",'public');

        }

        $event->save();

        return redirect('/') -> with('msg', 'Evento criado com sucesso');
    }

    public function show($id) {
        $event = Event::findOrFail($id);

    }
}
