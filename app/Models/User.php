<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function access()
    {
        return $this->hasOne(UserAccess::class, 'user_id');
    }

    public function wilayahAccesses()
    {
        return $this->hasMany(UserWilayahAccess::class, 'user_id');
    }

    public function canAccessSalesReport(): bool
    {
        return $this->role === 'super_admin'
            || (bool) optional($this->access)->sales_report;
    }

    public function canAccessSalesStockSearch(): bool
    {
        return $this->role === 'super_admin'
            || (bool) optional($this->access)->sales_stock_search;
    }

    public function canAccessStockFull(): bool
    {
        return $this->role === 'super_admin'
            || (bool) optional($this->access)->stock_full;
    }

    public function canAccessAssembling(): bool
    {
        return $this->role === 'super_admin'
            || (bool) optional($this->access)->assembling;
    }

    public function canCreateAssembling(): bool
    {
        return $this->role === 'super_admin'
            || (bool) optional($this->access)->assembling_create;
    }

    public function canEditAssembling(): bool
    {
        return $this->role === 'super_admin'
            || (bool) optional($this->access)->assembling_edit;
    }

    public function canDeleteAssembling(): bool
    {
        return $this->role === 'super_admin'
            || (bool) optional($this->access)->assembling_delete;
    }
}