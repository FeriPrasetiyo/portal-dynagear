<?php

namespace App\Http\Controllers;

use App\Models\AssemblingWilayah;
use App\Models\User;
use App\Models\UserAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAccessController extends Controller
{
    public function index()
    {
        $users = User::with('access')
            ->orderBy('name')
            ->get();

        return view('user_access.index', compact('users'));
    }

    public function edit(User $user)
    {
        $user->load([
            'access',
            'wilayahAccesses',
        ]);

        $access = UserAccess::firstOrCreate(
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

        $wilayahs = AssemblingWilayah::orderBy('nama_wilayah')->get();

        $selectedWilayahIds = $user->wilayahAccesses()
            ->pluck('wilayah_id')
            ->toArray();

        return view('user_access.edit', compact(
            'user',
            'access',
            'wilayahs',
            'selectedWilayahIds'
        ));
    }

    public function update(Request $request, User $user)
    {
        UserAccess::updateOrCreate(
            ['user_id' => $user->id],
            [
                'sales_report' => $request->boolean('sales_report'),
                'sales_stock_search' => $request->boolean('sales_stock_search'),
                'stock_full' => $request->boolean('stock_full'),
                'assembling' => $request->boolean('assembling'),
                'assembling_create' => $request->boolean('assembling_create'),
                'assembling_edit' => $request->boolean('assembling_edit'),
                'assembling_delete' => $request->boolean('assembling_delete'),
            ]
        );

        $this->syncUserAccessToAssembling();

        return redirect()
            ->route('user-access.index')
            ->with('success', 'Akses user berhasil diperbarui.');
    }

    public function updateWilayah(Request $request, User $user)
    {
        $request->validate([
            'wilayah_ids' => 'nullable|array',
            'wilayah_ids.*' => 'integer',
        ]);

        $user->wilayahAccesses()->delete();

        foreach ($request->wilayah_ids ?? [] as $wilayahId) {
            $user->wilayahAccesses()->create([
                'wilayah_id' => $wilayahId,
            ]);
        }

        $this->syncWilayahAccessToAssembling();

        return redirect()
            ->route('user-access.edit', $user->id)
            ->with('success', 'Akses wilayah berhasil diperbarui.');
    }

    private function syncUserAccessToAssembling(): void
    {
        $portalAccesses = DB::table('user_accesses')->get();

        DB::connection('assembling')
            ->table('user_accesses')
            ->truncate();

        foreach ($portalAccesses as $access) {
            $userExists = DB::connection('assembling')
                ->table('users')
                ->where('id', $access->user_id)
                ->exists();

            if (! $userExists) {
                continue;
            }

            DB::connection('assembling')
                ->table('user_accesses')
                ->insert([
                    'user_id' => $access->user_id,
                    'sales_report' => $access->sales_report ?? false,
                    'sales_stock_search' => $access->sales_stock_search ?? false,
                    'stock_full' => $access->stock_full ?? false,
                    'assembling' => $access->assembling ?? false,
                    'assembling_create' => $access->assembling_create ?? false,
                    'assembling_edit' => $access->assembling_edit ?? false,
                    'assembling_delete' => $access->assembling_delete ?? false,
                    'created_at' => $access->created_at ?? now(),
                    'updated_at' => now(),
                ]);
        }
    }

    private function syncWilayahAccessToAssembling(): void
    {
        $portalAccesses = DB::table('user_wilayah_accesses')->get();

        DB::connection('assembling')
            ->table('user_wilayah_accesses')
            ->truncate();

        foreach ($portalAccesses as $access) {
            $userExists = DB::connection('assembling')
                ->table('users')
                ->where('id', $access->user_id)
                ->exists();

            $wilayahExists = DB::connection('assembling')
                ->table('wilayah')
                ->where('id', $access->wilayah_id)
                ->exists();

            if (! $userExists || ! $wilayahExists) {
                continue;
            }

            DB::connection('assembling')
                ->table('user_wilayah_accesses')
                ->insert([
                    'user_id' => $access->user_id,
                    'wilayah_id' => $access->wilayah_id,
                    'created_at' => $access->created_at ?? now(),
                    'updated_at' => now(),
                ]);
        }
    }
}