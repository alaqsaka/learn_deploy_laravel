<?php

namespace App\Http\Controllers;

use App\Models\Tenants;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenants::all();
        return response()->json($tenants);
    }

    public function indexDashboard()
    {
        return view('dashboard', [
            'tenants' => Tenants::all()
        ]);
    }

    public function create(){
        return view('tenants.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'owner' => 'required',
            'imageUrl' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('imageUrl')) {
            $formFields['imageUrl'] = $request->file('imageUrl')->store('tenants', 'public');
        }

        Tenants::create($formFields);

        return redirect('/dashboard')->with('message', 'Sukses tambah tenant');
    }

    public function show($tenant_id) {
        $tenant = Tenants::with('menus')->find($tenant_id);
        if (!empty($tenant)) {
            return response()->json($tenant);
        } else
        {
            return response()->json([
                "message" => "Tenant not found"
            ], 404);
        }
    }
}
