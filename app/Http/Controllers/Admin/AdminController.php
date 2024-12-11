<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['admins'] = \App\Models\Admin::all();
        return view('admins.admins.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      

        $admin = new \App\Models\Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect('admin/account')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $id)
    {
        $data['admin'] = \App\Models\Admin::find($id);
        return view('admins.admins.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = \App\Models\Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->save();

        return redirect('admin/account')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = \App\Models\Admin::find($id);
        $admin->delete();

        return redirect('admin/account')->with('success', 'Data berhasil dihapus');
    }

    public function editPassword(string $id)
    {
        $data['admin'] = \App\Models\Admin::find($id);
        return view('admins.admins.edit-password', $data);
    }

    public function updatePassword(Request $request, string $id)
    {
        $admin = \App\Models\Admin::find($id);
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect('admin/account')->with('success', 'Password berhasil diubah');
    }
}
