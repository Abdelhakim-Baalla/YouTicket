<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class RolePermission extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'role_id',
        'permission_id',
    ];

    // Définition des relations entre le modèle RolePermission et le modèle Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Définition des relations entre le modèle RolePermission et le modèle Permission
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
