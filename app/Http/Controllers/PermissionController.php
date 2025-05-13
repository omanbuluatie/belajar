<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        // Menampilkan halaman kelola Permissions
        return view('permissions.index');
    }

    public function listPermissions(Request $request)
    {
        try {
            $data = [];
            $limit = $request->input('length');
            $start = $request->input('start', 0);
            $search = $request->input('search.value');

            $query = Permission::query();

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
        $actions .= '<a href="' . route('permissions.edit', $id) . '" class="btn btn-outline-info btn-sm">Edit</a>';
        $actions .= ' <button data-id="' . $id . '" class="btn btn-outline-danger btn-sm delete-permission">Delete</button>';
        return $actions;
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        // Membuat permission baru
        Permission::create(['name' => $request->name]);

        return response()->json(['message' => 'Permission berhasil ditambahkan!'], 200);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);

        // Update permission
        $permission->update(['name' => $request->name]);

        return response()->json(['message' => 'Permission berhasil diperbarui!'], 200);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['message' => 'Permission berhasil dihapus.'], 200);
    }
}
