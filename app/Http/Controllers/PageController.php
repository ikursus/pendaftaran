<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        //echo "Halaman Utama";
    
        $title = 'Sistem Pendaftaran';
    
        // return view('welcome')->with('title', $title);
        // return view('welcome', ['title' => $title]);
        return view('welcome', compact('title'));
    }


    public function contact()
    {

        $title = 'Contact Form';

        return view('pages.template_contact', compact('title'));
    }

    public function contactData(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'message' => 'required|min:5'
        ]);

        $data = $request->all();

        return $data;
    }



}
