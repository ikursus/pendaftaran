<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senarai_users = [
        //     ['id' => 1, 'nama' => 'Ali', 'email' => 'ali@gmail.com'],
        //     ['id' => 2, 'nama' => 'Abu', 'email' => 'abu@gmail.com'],
        //     ['id' => 3, 'nama' => 'Siti', 'email' => 'siti@gmail.com']
        // ];

        // $senarai_users = DB::table('users')->get();
        // $senarai_users = DB::table('users')->paginate(5);
        $senarai_users = User::orderBy('id', 'desc')->paginate(5);

        return view('theme_user/senarai', compact('senarai_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme_user/create');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed'
        ]);

        $data = $request->all();
        // $data = $request->only([
        //     'name',
        //     'email',
        //     'role'
        // ]);
        // Encrypt Password dan kemudian attach kepada $data
        // $data['password'] = bcrypt($request->input('password'));
        // Simpan $data ke dalam DB
        // DB::table('users')->insert($data);
        User::create($data);
        // Redirect response ke senarai user
        return redirect('/users');
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
        // Dapatkan rekod user berdasarkan ID yang dibekalkan
        // $user = DB::table('users')->where('id', '=', $id)->first();
        $user = User::find($id);

        return view('theme_user/edit', compact('user'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:admin,staff'
        ]);

        $data = $request->except('password');
       
        // Encrypt Password dan kemudian attach kepada $data jika ruangan tidak kosong
        if (!empty($request->input('password')))
        {
            $data['password'] = $request->input('password');
        }
        
        // Simpan $data ke dalam DB
        // DB::table('users')->where('id', '=', $id)->update($data);
        $user = User::find($id);
        $user->update($data);

        // Redirect response ke senarai user
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('users')->where('id', '=', $id)->delete();
        $user = User::find($id);
        $user->delete();

        // Redirect response ke senarai user
        return redirect('/users');
    }
}
