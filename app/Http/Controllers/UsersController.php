<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DetailUser;
use App\Satker;
use App\Unor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['cont'] = $this;
        $data['title'] = (Auth::user()->role == 1) ? "Users" : "My Profile";
        $data['data'] = User::all();
        $data['auth'] = Auth::user();
        $data['detuser'] = DetailUser::all();
        $data['satker'] = Satker::all();
        $data['unor'] = Unor::all();
        return (Auth::user()->role == 1) ? view('users.list', $data) : view('users.profile', $data);
    }

    public function getRole($id)
    {
        $role = [
            1 => 'admin', 'bp', 'bpp',
        ];
        return $role[$id];
    }

    public function get_satker($kd)
    {
        $data = Satker::where('kd_satker', $kd)->first();
        return $data;
    }

    public function get_unor($id)
    {
        $data = Unor::find($id);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Users";
        $data['auth'] = Auth::user();
        return view('users.addUser', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $vEmail = true;
        $vConfirmPass = true;
        $vMsg = [];

        $validatorMsg = [
            'email' => 'Masukan :attribute yang valid',
            'unique' => ':attribute sudah digunakan!!',
            'min' => ':attribute harus minimal :min karakter',
            'same' => 'konfirmasi :other dan :other harus sama',
            'numeric' => ':attribute harus angka',
        ];
        $validatorRule = [
            'nip' => 'required|unique:detailUsers,nip|numeric',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,name',
            'password' => 'min:6',
            'confirmPass' => 'same:password',
        ];

        $validator = Validator::make($request->all(), $validatorRule, $validatorMsg);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->input())
                ->with(
                    ['stsAksi' => 'Gagal menambahkan user', 'iconAksi' => 'error', 'titleAksi' => 'Oops...']
                );
        }

        $detuser = new DetailUser;
        $detuser->nip = $data['nip'];
        $detuser->kd_satker = $data['satker'];
        $detuser->unor = $data['unor'];
        $detuser->alamat = $data['alamat'] != null ? $data['alamat'] : '';
        $detuser->telp = $data['telp'] != null ? $data['telp'] : '';
        $detuser->save();

        $user = new User;
        $user->id_detuser = $detuser->id;
        $user->fullname = $data['fullname'];
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->role = $data['peran'];
        $user->password = Hash::make($data['password']);
        $user->save();
        return redirect('user')->with(
            ['stsAksi' => "User berhasil ditambahkan", 'iconAksi' => 'success', 'titleAksi' => 'Selamat']
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = "Users";
        $data['auth'] = Auth::user();
        $data['satker'] = Satker::all();
        $data['unor'] = Unor::all();
        $data['data'] = User::leftJoin('detailUsers', 'detailUsers.id', '=', 'users.id_detuser')
            ->select('users.*', 'users.id as iduser', 'detailUsers.*')
            ->where('users.id', $id)->get()->first();
        return view('users.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = $request->all();
        $user = User::find($id);
        $validatorMsg = [
            'email' => 'Masukan :attribute yang valid',
            'unique' => ':attribute sudah digunakan!!',
            'min' => ':attribute harus minimal :min karakter',
            'same' => 'konfirmasi :other dan :other harus sama',
            'numeric' => ':attribute harus angka',
        ];
        $validatorRule = [
            'nip' => 'required|unique:detailUsers,nip,' . $id . '|numeric',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,name,' . $id,
        ];

        if (isset($data['checkEditPass']) && $data['checkEditPass'] == 'on') {
            $validatorRule['password'] = 'min:8';
            $validatorRule['confirmPass'] = 'same:password';
        }

        $validator = Validator::make($request->all(), $validatorRule, $validatorMsg);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input())->with(['stsAksi' => 'Gagal merubah data user', 'iconAksi' => 'error', 'titleAksi' => 'Oops...']);
        }
        if (isset($data['checkEditPass']) && $data['checkEditPass'] == 'on') {
            $user->password = Hash::make($data['password']);
        }
        $user->fullname = $data['fullname'];
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->role = $data['peran'];
        $user->save();

        $detuser = DetailUser::find($user->id_detuser);
        $detuser->nip = $data['nip'];
        $detuser->kd_satker = $data['satker'];
        $detuser->unor = $data['unor'];
        $detuser->alamat = $data['alamat'];
        $detuser->telp = $data['telp'];
        $detuser->save();
        return redirect('user')->with(
            ['stsAksi' => "Berhasil mengedit data user", 'iconAksi' => 'success', 'titleAksi' => 'Selamat']
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->count() == 0) {
            return redirect()->back()->with(
                ['stsAksi' => "Data user tidak ditemukan", 'iconAksi' => 'error', 'titleAksi' => 'Oops...']
            );
        }

        $detuser = DetailUser::find($user->id_detuser);
        if ($detuser->count() != 0) {
            $detuser->delete();
        }
        $user->delete();
        return redirect()->back()->with([
            'stsAksi' => "Berhasil menghapus data user",
            'iconAksi' => 'success',
            'titleAksi' => 'Selamat'
        ]);
    }
}
