<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Http\Requests\StoreProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Http\Middleware;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = User::all();
        if (Auth::user()->rol == 0) {

            if ($request->filtro) {
                $proyectos = Categoria::findOrFail($request->filtro)->proyectos->where('user_id', Auth::user()->id);
            }else{
                $proyectos = Auth::user()->proyectos;
            }
        }else {
            if ($request->filtro) {
                $proyectos = Categoria::findOrFail($request->filtro)->proyectos;
            }else{
                $proyectos = Proyecto::all();
            }
        }
        
            session()->flash('categoriaAnterior', $request->filtro);
        
        $categorias = Categoria::all();
        
        return view('misproyectos', compact('usuarios', 'proyectos', 'categorias'));
    }

    public function index2(Request $request)
    {
        $usuarios = User::all();
        
        if ($request->filtro) {
            $proyectos = Categoria::findOrFail($request->filtro)->proyectos;
        }else{
            $proyectos = Proyecto::all();
        }
        
        
            session()->flash('categoriaAnterior', $request->filtro);
        
        $categorias = Categoria::all();
        
        return view('proyectos', compact('usuarios', 'proyectos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('subirProyecto', compact('categorias'));
    }

    public function home(){
        $user = Auth::User();

        return view ('home', compact('user'));

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
            'descripcion'=>['required', 'string', 'max:255'],
            'pdf' => ['file', 'mimes:pdf,doc,docx'],
            'vm' => ['file'],
            'categoria' => ['required']    
            
        ]);
        $autor = Auth::User()->name;
        

        if ($request->hasFile('pdf') && $request->hasFile('vm')) {
            $pdf = $request->pdf->store('public');
            $vm = $request->vm->store('public');

            $proyecto = new Proyecto([
                'user_id' => Auth::User()->id, 
                'nombre' => $request->name,
                'descripcion' => $request->descripcion,
                'pdf' => $pdf,
                'vm' => $vm,
                'autor' => $autor
                               
            ]);
            $proyecto->save();
            
            foreach ($request->categoria as $categoria) {

                $proyecto->categorias()->attach($categoria);

            }
            
            
            
            

        }else{
            Flash::danger('No existen archivos');
        }
        Flash::success('Proyecto subido correctamente');
        return redirect()->route('proyecto.index');

        
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
        return view('editarProyecto', compact('proyecto'));
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
        $proyecto->nombre = $request->name;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->save();

        Flash::success('Se ha editado correctamente el proyecto');
        return redirect()->route('proyecto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        Flash::error('Se ha eliminado el proyecto correctamente');
        return redirect()->route('proyecto.index');
        
    }

    public function busqueda(Request $request)
    {
        $categorias = Categoria::all();
        $proyectos = Proyecto::where('nombre','LIKE','%'.$request->busqueda.'%')->get();
        
        return view('proyectos', compact('proyectos', 'categorias'));
    }

}
