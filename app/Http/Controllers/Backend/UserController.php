<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.layouts.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.layouts.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,user',
            'balance' => 'nullable|numeric',
            'country' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->balance = $request->balance ?? 0;
        $user->country = $request->country;

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('users', 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('backend.layouts.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('backend.layouts.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
            'balance' => 'nullable|numeric',
            'country' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->balance = $request->balance ?? 0;
        $user->country = $request->country;

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('users', 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
