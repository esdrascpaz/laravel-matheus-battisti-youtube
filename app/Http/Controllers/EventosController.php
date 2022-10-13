<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventosController extends Controller
{
    // O nome da função não precisa ser esse
    public function index()
    {
        // Capturando o input de id search
        // que está vindo da requisição
        $search = request('search');

        if ($search) {
            $events = Event::where([
                [
                    // Faz uma busca com o termo
                    // que veio da requisição
                    'title',
                    'like',
                    '%'.$search.'%'
                ]
            ])->get();
        } else {
            $events = Event::all();
        }

        return view(
            'welcome', ['events' => $events, 'search' => $search]
        );
    }

    public function create ()
    {
        return view('events.create');
    }

    public function store(Request $request) {
        // $input = $request->validate([
        //     'image' => 'file'
        // ]);

        // $file = $input['image'];
        
        // $path = $file->store('image'); // Salvando na pasta storage/app/image
        // // use "store('image', 'public')" para criar uma pasta public/logos

        // no terminal: php artisan storage:link

        $input = [
            // 'image' => $path,
            'title' => $request->title,
            'city' => $request->city,
            'eventoPrivado' => $request->private,
            'description' => $request->description
        ];

        $event = new Event;

        $event->title = $request->title;
        // Foi criada uma migration para adicionar o campo data na tabela e
        // feita uma alteração na model Event para indicar que o campo é do
        // tipo data
        $event->date = $request->date;
        $event->city = $request->city;
        $event->eventoPrivado = $request->private;
        $event->description = $request->description;
        // No model Event, "items" será transformado em JSON, pois vem do front como string
        $event->items = $request->items;

        //Upload imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            
            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $event->image = $imageName;
            
            $request->file('image')->storeAs('img/eventos',$event->image);

            // // var_dump($imageName);die;
            
            // $requestImage->move(public_path('img/eventos', $imageName));
            // $requestImage->store("events",'public');

        }

        $event->save();

        // Event::create($input);
        // adicionado "image" no "fillable" na model Event

        return redirect('/') -> with('msg', 'Evento criado com sucesso');
    }

    public function show($id) {
        // retorna o resultado ou falha ao buscar o id na tabela
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }
}
