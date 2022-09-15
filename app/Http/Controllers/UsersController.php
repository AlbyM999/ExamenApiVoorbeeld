<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;

class UsersController extends Controller
{
    //

    public function index()
    {
        $EventData = user::orderBy('id')
            ->get()
            ->toArray();

        return response()->json($EventData);
    }
    public function login(user $request)
    {
        $EventData = user::where('email',$request->email)->where('password',);
    }
    public function show($id)
    {
        $EventData = user::where('id',$id)
            ->get()
            ->toArray();
        return response()->json($EventData);
    }
    public function onschool($id)
    {
        $EventData = user::where('school_id',$id)
            ->get()
            ->toArray();
        return response()->json($EventData);
    }

    public function store(user $request)
    {

        $passwordHash = crc32($request->password);

        user::create([
            'email'=>$request->firstname,
            'name'=>$request->lastname,
            'password'=>$passwordHash,
        ]);

        return response()->json('Event stored');

    }
    public function delete(Request $request,user $id){
        $id->delete();
    }
    public function update(Request $request, user $id){

        $passwordHash = crc32($request->password);

        user::where('id',$id)->update([
            'email'=>$request->firstname,
            'name'=>$request->lastname,
            'password'=>$passwordHash,
        ]
        );
    }

}
