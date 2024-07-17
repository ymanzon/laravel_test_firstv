<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $log = ['usuario' => '0', 'accion' => 'USUARIO.FILTRAR', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);

        $query = User::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('created_by')) {
            $query->where('created_by', 'like', '%' . $request->created_by . '%');
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        if ($request->filled('updated_at')) {
            $query->whereDate('updated_at', $request->updated_at);
        }

        if ($request->filled('activo')) {
            $query->where('activo', $request->activo);
        }

        $users = $query->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $log = ['usuario' => '0', 'accion' => 'USUARIO.CREACION', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);
        //
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();

        $data['fecha_alta'] = now();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('avatars', 'public');
            $data['imagen'] = Storage::url($path);
        }else
        {
            $data['imagen'] = '/storage/images/default.jpg';
        }

        if( isset( $data['activo'] ))
            $data['activo'] = 0;
        else
            $data['activo'] = 1;

        User::create($data);
        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        //echo print_r( json_encode($user));
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $log = ['usuario' => '0', 'accion' => 'USUARIO.EDITAR', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);
        //
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['imagen'] = Storage::url($path);
        }

        $user->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $log = ['usuario' => '0', 'accion' => 'USUARIO.ELIMINAR', 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);
        //
        $user->delete();
        return redirect()->route('users.index');
    }

    public function toggleActive(User $user)
    {
        $accion = $user->activo?"ACTIVAR":"DESACTIVAR";
        $log = ['usuario' => '0', 'accion' => 'USUARIO.' . $accion, 'fecha' => date('Y-m-d H:i:s')];
        Log::create($log);
        
        $user->activo = !$user->activo;
        $user->save();
        return redirect()->route('users.index');
    }
}
