<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingAddress extends Model
{
    use HasFactory;
    protected $table = 'billing_address';
    protected $fillable = [
        "first_name",
        "last_name",
        "address",
        "street",
        "country",
        "city",
        "phone",
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
