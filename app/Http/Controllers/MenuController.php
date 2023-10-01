<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenants;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Show create menu form
    public function create($tenant_id){
        $tenant = Tenants::find($tenant_id);

        return view('menus.create', ['tenant' => $tenant]);
    }

    // Show update menu form
    public function edit($tenant_id, $menu_id){
        $tenant = Tenants::find($tenant_id);

        $menu = Menu::find($menu_id);

        return view('menus.edit', ['tenant' => $tenant, 'menu' => $menu]);
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

    // Update menu data
    public function update (Request $request, $menu_id) {
        $menu = Menu::find($menu_id);

        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'tenant_id' => 'required'
        ]);

        if ($request->hasFile('imageUrl')) {
            $formFields['imageUrl'] = $request->file('imageUrl')->store('menus', 'public');
        }

        $menu->update($formFields);

        return redirect('/tenant/'.$menu->tenant_id)->with('message', 'Sukses memperbarui menu');
    }

    // Show menu detail
    public function show($menu_id) {
        $menu = Menu::find($menu_id);

        if (!empty($menu)) {
            return response()->json($menu);
        } else
        {
            return response()->json([
                "message" => "Menu not found"
            ], 404);
        }
    }
}
