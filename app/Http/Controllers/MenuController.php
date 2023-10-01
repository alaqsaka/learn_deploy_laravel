<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenants;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create($tenant_id){
        $tenant = Tenants::find($tenant_id);

        return view('menus.create', ['tenant' => $tenant]);
    }

    // Store menu data
    public function store (Request $request){
        // dd($request);

        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'imageUrl' => 'required',
            'tenant_id' => 'required'
        ]);

        $formFields['tenant_id'] = (int)$formFields['tenant_id'];

        // dd($formFields);

        if ($request->hasFile('imageUrl')) {
            $formFields['imageUrl'] = $request->file('imageUrl')->store('menus', 'public');
        }

        // dd($formFields);

        Menu::create($formFields);

        return redirect('/tenant/'.$request->tenant_id)->with('message', 'Sukses menambahkan menu');
    }
}
