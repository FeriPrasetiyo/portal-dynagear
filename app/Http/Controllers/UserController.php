<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private function roles(): array
    {
        return [
            'super_admin',
            'manager_pl',
            'admin_pl',
            'manager_sales',
            'admin_sales',
            'assembling',
            'gudang',
            'purchasing',
            'sales',
        ];
    }

    public function index()
    {
        $users = User::with('access')
            ->orderBy('name')
            ->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roles();

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3',
            'role' => 'required|string|in:' . implode(',', $this->roles()),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        UserAccess::firstOrCreate(
            ['user_id' => $user->id],
            [
                'sales_report' => false,
                'sales_stock_search' => false,
                'stock_full' => false,
                'assembling' => false,
                'assembling_create' => false,
                'assembling_edit' => false,
                'assembling_delete' => false,
            ]
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = $this->roles();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:3',
            'role' => 'required|string|in:' . implode(',', $this->roles()),
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        UserAccess::firstOrCreate(
            ['user_id' => $user->id],
            [
                'sales_report' => false,
                'sales_stock_search' => false,
                'stock_full' => false,
                'assembling' => false,
                'assembling_create' => false,
                'assembling_edit' => false,
                'assembling_delete' => false,
            ]
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ((int) $user->id === (int) auth()->id()) {
            return back()->with('error', 'User yang sedang login tidak boleh dihapus.');
        }

        if ($user->role === 'super_admin') {
            return back()->with('error', 'User super admin tidak boleh dihapus.');
        }

        $user->access()->delete();
        $user->wilayahAccesses()->delete();
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}