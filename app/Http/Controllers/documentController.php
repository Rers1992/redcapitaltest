<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documento;
use App\Http\Requests\documentFormRequest;
use App\User;

class documentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = documento::all();
        return view('documentos.index', ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('documentos.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = new documento();

        $document->descripcion = request('descripcion');
        $document->user = request('user');

        if($request->hasFile('nombre')){
            $file = $request->nombre;
            $file->move(public_path().'/documentos', $file->getClientOriginalName());
            $document->nombre = $file->getClientOriginalName(); 
        }

        $document->save();

        return redirect('/cambio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $document = documento::findOrFail($id);
        $user = User::findOrFail($document->user);
        return view('documentos.edit', ['document' => $document, 'users' => $users, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(documentFormRequest $request, $id)
    {
        $document = documento::findOrFail($id);

        $document->user = $request->get('user');
        $document->descripcion = $request->get('descripcion');

        $document->update();

        return redirect('/cambio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = documento::findOrFail($id);
        $archivo = $document->nombre;
        $document->delete();

        $document_path = public_path().'/documentos/'.$archivo;
        unlink($document_path);

        return redirect('/cambio');
    }
}
