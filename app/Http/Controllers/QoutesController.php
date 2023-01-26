<?php

namespace App\Http\Controllers;

use App\Models\Qoute;
use Illuminate\Http\Request;

class QoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'qoutes' => Qoute::inRandomOrder()->limit(1)->get(),
        ];

        return view('index', $data);
    }

    
    public function create()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => ['required'],
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        Qoute::create($validatedData);

        return redirect('/qoutes/create')->with('success', 'qoutes success created');
    }

    public function show($id)
    {
        //
    }

    
    public function edit(Qoute $qoute)
    {
        return view('edit', [
            'qoute' => $qoute
        ]);
    }

    
    public function update(Request $request, Qoute $qoute)
    {
        $validatedData = $request->validate([
            'content' => ['required']
        ]);


        Qoute::where('id', $qoute->id)->update($validatedData);
        return redirect('/qoutes/'.$qoute->id.'/edit')->with('success', 'qoutes success updated');

    }

    public function destroy(Qoute $qoute)
    {
        Qoute::destroy($qoute->id);
        return redirect('/qoutes')->with('success', 'qoutes success deleted');

    }
}
