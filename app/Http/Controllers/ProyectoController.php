<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Http\Requests\StoreProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\User;

class ProyectoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        $proyectos = Proyecto::all();

        return view('dashboard', compact('usuarios', 'proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subirProyecto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProyectoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyectoRequest $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'pdf' => ['required', 'file', 'mimes:pdf,doc,docx'],
            'vm' => ['required', 'file'],
            
            
        ]);
        $autor = Auth::User()->name;
        

        if ($request->hasFile('pdf') and $request->hasFile('vm')) {
            $path = $request->pdf->store('public');

            $project = Proyecto::create([
                'user_id' => Auth::User()->id, 
                'nombre' => $request->name,
                'pdf' => $request->pdf,
                'vm' => $request->vm,
                'autor' => $autor,
                'path'=>$path
            ]);
            
        }else{
            echo 'jodete';
        }
        
        return 'Proyecto subido satisfactoriamente';

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        return view('proyecto', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProyectoRequest  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProyectoRequest $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }

}
