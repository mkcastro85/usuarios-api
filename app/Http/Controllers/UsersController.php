<?php

namespace App\Http\Controllers;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Obtener listado de usuarios
     *
     * @return Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Guardar un nuevo usuario
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        
        return (new UserResource($user))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Obtener un usuario por id
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Borrar un usuario por id
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $res=User::where('id',$id)->delete();
    }

    /**
     * Actualizar un usuario
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->names=$request->names;
        $usuario->lastname=$request->lastname;
        $usuario->identification=$request->identification;
        $usuario->email=$request->email;
        $usuario->phone=$request->phone;
        $usuario->save();

        return  (new UserResource($usuario))
        ->response()
        ->setStatusCode(201);
    }
}
