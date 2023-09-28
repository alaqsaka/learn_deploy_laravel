<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**

     * Store a newly created resource in storage.

     */
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required',
            'note' => 'required'
        ]);

        DB::table('guests')->insert([
            'name' => $request->name,
            'note' => $request->note
        ]);

        // return redirect()->route('/')->with('success','Product created successfully.');
        return redirect('/')->with('success','Berhasil isi daftar tamu.');
    }
}
