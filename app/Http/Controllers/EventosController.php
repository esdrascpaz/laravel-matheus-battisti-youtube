<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eventos;

class EventosController extends Controller
{
    // O nome da função não precisa ser esse
    public function index()
    {
        $eventos = Eventos::all();

        return view(
            'welcome', ['eventos' => $eventos]
        );
    }

    public function criarEvento ()
    {
        return view('eventos.criarEvento');
    }

    public function store(Request $request) {
        $event = new Eventos;

        $event->título = $request->title;
        $event->cidade = $request->cidade;
        $event->eventoPrivado = $request->private;
        $event->descrição = $request->description;

        //Upload imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('img/eventos', $imageName));

            $event->image = $imageName;
        }

        $event->save();

        return redirect('/') -> with('msg', 'Evento criado com sucesso');
    }
}
