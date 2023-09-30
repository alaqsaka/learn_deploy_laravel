<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenants extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'owner', 'imageUrl', 'description'];

     /**
     * Get the menus for the tenant.
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'tenant_id');
    }
}
