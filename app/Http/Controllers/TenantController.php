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

    public function store(Request $request)
    {
        $tenant = new Tenants;
        $tenant->name = $request->name;
        $tenant->owner = $request->owner;
        $tenant->imageUrl = $request->imageUrl;
        $tenant->save();

        return response()->json([
            "message" => "Tenant Addded."
        ], 201);
    }

    public function show($id) {
        $tenant = Tenants::find($id);
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
