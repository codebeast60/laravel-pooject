<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserControllers extends Controller
{

    static function users()
    {
        return [
            ['id' => 1, 'name' => 'Abbas', 'country' => 'USA'],
            ['id' => 2, 'name' => 'Khaled', 'country' => 'Canada'],
            ['id' => 3, 'name' => 'Youssef', 'country' => 'AUA'],
            ['id' => 4, 'name' => 'Usama', 'country' => 'USA'],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $rules = [
            'username' => 'required | string | min:4',
            'country'  => 'required | string'
        ];
        $message = [
            'username.required' => 'name required',
            'username.min' => 'your user name cant be less than four chars',
            'country.required' => 'country cant be empty'
        ];
        $request->validate($rules, $message);

        // $request->validate([
        //     'username' => 'required | string | min:4',
        //     'country'  => 'required | string'
        // ]);
        $user = User::create([
            'name' => $request->input('username'),
            'country' => $request->input('country')
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);


        // if (!$user) {
        //     abort(404);
        // }
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('users.edit', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'username' => 'required | string | min:4',
            'country'  => 'required | string'
        ];
        $message = [
            'username.required' => 'name required',
            'username.min' => 'your user name cant be less than four chars',
            'country.required' => 'country cant be empty'
        ];
        $request->validate($rules, $message);
        $input = $request->all();
        $input['username'] = strip_tags($input['username']);
        $input['country'] = strip_tags($input['country']);

        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->withErrors(['User not foud']);
        }

        $user->name = $input['username'];
        $user->country = $input['country'];
        $user->save();
        return redirect()->route('users.index')->with('success', 'user updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user deleted');
    }
}
