<?php

namespace App\Http\Controllers;

use App\Models\Nombre;
use App\Http\Requests\NombreRequest;

/**
 * Class NombreController
 * @package App\Http\Controllers
 */
class NombreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nombres = Nombre::paginate();

        return view('nombre.index', compact('nombres'))
            ->with('i', (request()->input('page', 1) - 1) * $nombres->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nombre = new Nombre();
        return view('nombre.create', compact('nombre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NombreRequest $request)
    {
        $nombre = Nombre::create($request->validated());
    
        if ($request->hasFile('fotografia')) {
            $fotografia = $request->file('fotografia');
            $nombreimagen = Str::slug($nombre->nombre).'.'.$fotografia->getClientOriginalExtension();
            $ruta = public_path("/imagenes/nombres/");
            $fotografia->move($ruta, $nombreimagen);
    
            $nombre->fotografia = $nombreimagen;
            $nombre->save();
        }
    
        return redirect()->route('nombres.index')
            ->with('success', 'Nombre created successfully.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nombre = Nombre::find($id);

        return view('nombre.show', compact('nombre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nombre = Nombre::find($id);
      
        return view('nombre.edit', compact('nombre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NombreRequest $request, Nombre $nombre)
    {
        $nombre->update($request->validated());

        return redirect()->route('nombres.index')
            ->with('success', 'Nombre updated successfully');
    }

    public function destroy($id)
    {
        Nombre::find($id)->delete();

        return redirect()->route('nombres.index')
            ->with('success', 'Nombre deleted successfully');
    }
}
