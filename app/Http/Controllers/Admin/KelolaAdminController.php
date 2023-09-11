<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KelolaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Data Admin';
        $subtitle = 'Data Admin';

        $all_data = User::where('role', 'Super Admin')
            ->orwhere('role', 'Admin')
            ->get();

        return view('admin.kelola_admin.index', compact(
            'toptitle',
            'title',
            'subtitle',
            'all_data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toptitle = 'Fitur';
        $title = 'Data Admin';
        $subtitle = 'Tambah Admin';

        return view('admin.kelola_admin.create', compact(
            'toptitle',
            'title',
            'subtitle',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'role' => $request->role,
            'api_token' => Hash::make($request->nomor_hp . $request->email),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('kelola_admin.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toptitle = 'Fitur';
        $title = 'Data Admin';
        $subtitle = 'Edit Admin';

        $data_edit = User::where('id', $id)->first();

        return view('admin.kelola_admin.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
        ));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $data_up = User::findOrFail($id);

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $dataUp['password'] = $request->password;
        }

        $dataUp['name'] = $request->name;
        $dataUp['nomor_hp'] = $request->nomor_hp;
        $dataUp['alamat'] = $request->alamat;
        $dataUp['email'] = $request->email;
        $dataUp['role'] = $request->role;

        $data_up->update($dataUp);
        return redirect()->route('kelola_admin.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = User::find($id);
        $data_del->delete();
        return redirect()->route('kelola_admin.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
