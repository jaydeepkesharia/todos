<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = \Auth::user()->id;
        $user = \App\User::find($user_id);
        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(!empty($request->password));
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|max:10',
        ]);

        $data = [
            'name' => $request->name,
            'contact' => $request->contact
        ];
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);

            $data['password'] = Hash::make($request->password);
        }
        // dd(route(''));

        \App\User::where('id', $id)->update($data);

        return redirect()->route('home')
            ->with('success', 'updated successfully');
    }
}
