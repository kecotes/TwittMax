<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(){
        return view('entries.create');
    }

    public function store(Request $request){
        //dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries',
            'content' => 'required|min:25|max:3000'
        ]);

        $entry = new Entry();
            $entry->user_id = auth()->id();
            $entry->title = $validatedData['title'];
            $entry->content = $validatedData['content'];          
            $entry->save();

            $status = 'Su entrada ha sido publicada correctamente';
            return back()->with(compact('status'));
    }

    public function edit(Entry $entry){
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, Entry $entry){
        //dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content' => 'required|min:25|max:3000'
        ]);
        
            // TODO: permitir editar solo el autor
            //auth()->id() === $entry->user_id
            $entry->title = $validatedData['title'];
            $entry->content = $validatedData['content'];          
            $entry->save();

            $status = 'Su entrada ha sido modificada correctamente';
            return back()->with(compact('status'));
    }
}
