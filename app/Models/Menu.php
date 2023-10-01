<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'imageUrl', 'description', 'price', 'tenant_id'];

    public function tenant() {
        return $this->belongsTo(Tenants::class);
    }
}
