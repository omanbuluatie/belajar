<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        // Menampilkan halaman kelola Roles
        return view('roles.index');
    }

    public function listRoles(Request $request)
    {
        try {
            $data = [];
            $limit = $request->input('length');
            $start = $request->input('start', 0);
            $search = $request->input('search.value');

            $query = Role::query();

            // Apply search filter
            if ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            }

            $totalData = $query->count();
            $query->skip($start)->take($limit);
            $results = $query->get();

            $no = $start;
            foreach ($results as $result) {
                $no++;
                $data[] = [
                    '#' => $no,
                    'name' => $result->name,
                    'actions' => $this->getAction($result->id),
                ];
            }

            // Output
            $output = [
                "draw" => intval($request->input('draw')),
                "recordsTotal" => $totalData,
                "recordsFiltered" => $totalData,
                "data" => $data,
            ];

            return response()->json($output);
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    private function getAction($id)
    {
        $actions = '';
        $actions .= '<a href="' . route('roles.edit', $id) . '" class="btn btn-outline-info btn-sm">Edit</a>';
        $actions .= ' <button data-id="' . $id . '" class="btn btn-outline-danger btn-sm delete-role">Delete</button>';
        $actions .= ' <a href="' . route('roles.assign', $id) . '" class="btn btn-outline-primary btn-sm">Assign Role</a>';

        return $actions;
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        // Membuat role baru
        $role = Role::updateOrCreate(['name' => $request->name]);



        return response()->json(['message' => 'Role berhasil ditambahkan!'], 200);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);

        // Update role
        $role->update(['name' => $request->name]);



        return response()->json(['message' => 'Role berhasil diperbarui!'], 200);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role berhasil dihapus.'], 200);
    }

    public function assignedRoles()
    {
        // Mengambil data user beserta roles yang sudah ditugaskan
        $users = User::with('roles')->get();

        return view('roles.assigned', compact('users'));
    }

    public function assign()
    {
        $users = User::pluck('name', 'id'); // Mengambil users dengan key=id dan value=name
        $roles = Role::pluck('name', 'id'); // Mengambil roles dengan key=id dan value=name
        return view('roles.assign', compact('users', 'roles'));
    }

    // public function storeAssign(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'role_id' => 'required|exists:roles,id',
    //     ]);

    //     $user = User::findOrFail($request->user_id);
    //     $role = Role::findOrFail($request->role_id);

    //     // Mencari apakah relasi sudah ada di model_has_roles
    //     $existingRole = $user->roles()->where('role_id', $role->id)->first();

    //     if ($existingRole) {
    //         // Jika sudah ada, kita update relasi jika perlu
    //         // (misalnya, jika ada data tambahan atau informasi yang ingin diubah di relasi)
    //         // Untuk role, biasanya tidak ada kolom lain yang perlu diupdate kecuali role_id-nya
    //         // Pada kasus ini tidak perlu update karena hanya role_id yang berubah
    //         // Jika ingin memperbarui waktu atau kolom lainnya, bisa dilakukan di sini
    //     } else {
    //         // Jika belum ada, kita menambahkannya
    //         $user->roles()->attach($role);
    //     }

    //     return redirect()->route('roles.assigned')->with('success', 'Role successfully assigned or updated for the user.');
    // }


    public function storeAssign(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|array|min:1',
            'role_id.*' => 'exists:roles,id', // Validasi setiap role yang dipilih
        ]);

        // Mendapatkan user berdasarkan user_id
        $user = User::findOrFail($validated['user_id']);

        // Menyambungkan role-role yang dipilih ke user
        $user->roles()->sync($validated['role_id']); // Menyinkronkan roles

        return redirect()->route('roles.assigned')->with('success', 'Roles assigned successfully!');
    }


    public function listAssignedRoles(Request $request)
    {
        try {
            $data = [];
            $limit = $request->input('length');
            $start = $request->input('start', 0);
            $search = $request->input('search.value');

            // Query untuk mengambil data dari model_has_roles
            $query = DB::table('model_has_roles')
                ->join('users', 'model_has_roles.model_id', '=', 'users.id')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->select('users.id as user_id', 'users.name as user_name', DB::raw('STRING_AGG(roles.name, \', \') as role_names'))
                ->groupBy('users.id', 'users.name');

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('users.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('roles.name', 'LIKE', '%' . $search . '%');
                });
            }

            $totalData = $query->count();
            $query->skip($start)->take($limit);
            $results = $query->get();

            $no = $start;
            foreach ($results as $result) {
                $no++;
                // Menampilkan semua role dalam satu kolom
                $roles = '<span class="badge bg-info">' . str_replace(', ', '</span>, <span class="badge bg-info">', $result->role_names) . '</span>';

                $data[] = [
                    '#' => $no,
                    'user_name' => $result->user_name,
                    'role_name' => $roles,
                    'actions' => $this->getAssignedRoleAction($result->user_id),
                ];
            }

            // Output
            $output = [
                "draw" => intval($request->input('draw')),
                "recordsTotal" => $totalData,
                "recordsFiltered" => $totalData,
                "data" => $data,
            ];

            return response()->json($output);
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    private function getAssignedRoleAction($id)
    {
        $actions = '';
        $actions .= '<a href="' . route('roles.manageRoles', $id) . '" class="btn btn-outline-info btn-sm">Atur Roles</a>';

        return $actions;
    }
    public function manageRoles(User $user)
    {
        // Mengambil roles yang dimiliki user
        $roles = $user->roles;

        return view('roles.manage', compact('user', 'roles'));
    }

    // Menghapus role dari user
    public function removeRole(User $user, Role $role)
    {
        try {
            // Menghapus hubungan role dengan user
            $user->roles()->detach($role->id);
            return response()->json(['success' => 'Role successfully removed from the user.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to remove the role.'], 500);
        }
    }


}
