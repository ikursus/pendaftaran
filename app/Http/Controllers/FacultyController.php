<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Faculty;
use DataTables;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senarai_faculty = DB::table('faculty')->paginate(5);
        // $senarai_faculty = Faculty::paginate(5);

        return view('theme_faculty/senarai', compact('senarai_faculty'));
    }

    public function datatables()
    {
        $query = Faculty::select([
            'id',
            'name'
        ]);


        return DataTables::of($query)
        ->addColumn('action', function ($faculty) {
            return view('theme_faculty.action', compact('faculty'));
        })
        ->addIndexColumn()
        ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme_faculty/create');
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
            'name' => 'required'
        ]);

        // $data = $request->all();
        $data = $request->only([
            'name',
        ]);
        
        // Simpan $data ke dalam DB
        DB::table('faculty')->insert($data);
        // Redirect response ke senarai faculty
        return redirect('/faculty');
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
        // Dapatkan rekod faculty berdasarkan ID yang dibekalkan
        $faculty = DB::table('faculty')->where('id', '=', $id)->first();

        return view('theme_faculty/edit', compact('faculty'));
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
        ]);

        // $data = $request->all();
        $data = $request->only([
            'name',
        ]);
        
        // Simpan $data ke dalam DB
        DB::table('faculty')->where('id', '=', $id)->update($data);
        // Redirect response ke senarai faculty
        return redirect('/faculty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('faculty')->where('id', '=', $id)->delete();

        // Redirect response ke senarai faculty
        return redirect('/faculty');
    }
}
