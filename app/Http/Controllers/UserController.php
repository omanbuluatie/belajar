<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Menampilkan daftar user
        return view('users.index');
    }
    public function ListUserindex(Request $request)
    {
        try {
            $data = array();
            $limit = $request->input('length');
            $start = $request->input('start', 0);
            $search = $request->input('search.value');
            $status = $request->input('status');
            $name = $request->input('name');
            $email = $request->input('email');

            $query = User::query();
            $query->where('is_active', '<>', 2);
            // Apply filters
            
            if ($status) {
                $query->where('status', $status);
            }
            if ($name) {
                $query->where('name', 'LIKE', '%' . $name . '%');
            }
            if ($email) {
                $query->where('email', 'LIKE', '%' . $email . '%');
            }

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');
                });
            }

            $totalData = $query->count();
            $query->skip($start)->take($limit);
            $results = $query->get();

            $data = array();
            $no = $start;
            foreach ($results as $result) {
                $no++;
                $data[] = [
                    '#' => $no,
                    'name' => $result->name,
                    'email' => $result->email,
                    'is_active' => $result->is_active == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>',
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
        $actions .= '<a href="' . route('users.edit', $id) . '" class="btn btn-outline-info btn-sm">Edit</a>';
        $actions .= ' <button data-id="' . $id . '" class="btn btn-outline-danger btn-sm delete-user">Delete</button>';
        return $actions;
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // return $request->all();
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Mengembalikan response sukses dalam format JSON
        return response()->json(['message' => 'Pengguna berhasil ditambahkan!'], 200);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'is_active' => 'required|in:1,0', // Validasi untuk is_active
        ]);

        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Update data pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active, // Update status aktif
        ]);

        // Mengembalikan response sukses
        return response()->json(['message' => 'Pengguna berhasil diperbarui!'], 200);
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update kolom is_active menjadi 2
        $user->update([
            'is_active' => 2,
        ]);

        // Kembalikan respons sukses
        return response()->json([
            'message' => 'Pengguna berhasil dinonaktifkan.',
        ], 200);
    }



}
