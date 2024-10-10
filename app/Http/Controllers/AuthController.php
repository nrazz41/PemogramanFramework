<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('login-form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:11',
            'password' => [
                'required', // Wajib diisi
                'min:3', // Minimal 8 karakter
                'regex:/[A-Z]/',      // Harus mengandung setidaknya 1 huruf besar

            ],

        ]);

        if($request->username=='2357301096A' &&
        $request->password=='2357301096A'){
            $result= 'success';
        }else{
            $result = 'error';
        }

        $pageData['result'] = $result;

        return view('login-form', $pageData);
    }


    }


