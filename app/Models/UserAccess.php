<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    protected $table = 'user_accesses';

    protected $fillable = [
        'user_id',
        'sales_report',
        'sales_stock_search',
        'stock_full',
        'assembling',
        'assembling_create',
        'assembling_edit',
        'assembling_delete',
    ];

    protected $casts = [
        'sales_report' => 'boolean',
        'sales_stock_search' => 'boolean',
        'stock_full' => 'boolean',
        'assembling' => 'boolean',
        'assembling_create' => 'boolean',
        'assembling_edit' => 'boolean',
        'assembling_delete' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}