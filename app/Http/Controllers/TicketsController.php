<?php

namespace App\Http\Controllers;

use App\Models\ticket;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    //

    public function index()
    {
        $EventData = ticket::orderBy('id')
            ->get()
            ->toArray();

        return response()->json($EventData);
    }
    public function show($id)
    {
        $EventData = ticket::where('id',$id)
            ->get()
            ->toArray();
        return response()->json($EventData);
    }
    public function onschool($id)
    {
        $EventData = ticket::where('school_id',$id)
            ->get()
            ->toArray();
        return response()->json($EventData);
    }

    public function store(ticket $request)
    {

        $passwordHash = crc32($request->password);

        ticket::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'password'=>$passwordHash,
            'school_id'=>$request->school_id,
        ]);

        return response()->json('Event stored');

    }
    public function delete(Request $request,ticket $id){
        $id->delete();
    }
    public function update(Request $request, ticket $id){

        ticket::where('id',$id)->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'addative'=>$request->addative,
            'school_id'=>$request->school_id,
        ]
        );
    }
}
