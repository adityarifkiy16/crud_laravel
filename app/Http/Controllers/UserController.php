<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(3);
        return view('user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
            'role' => ['required', 'string', 'max:255', 'in:peserta,admin'],
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'password' => 'required',
                'role' => ['string', 'max:255', 'in:user,admin'],
            ]);
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user->update($data);
            return redirect('/user');
        } catch (Exception $e) {
            $errorMessage = "An error occurred: {$e->getMessage()}";
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peserta = Peserta::has('user')->where('id_user', '=', $id)->first();

        if ($peserta) {
            return response()->json(['error' => 'foreign key'], 422);
        }
        $user = User::where('id_user', $id);
        $user->delete();
    }
}
