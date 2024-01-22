<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, HasUuids;

    protected $table = "categories";
    protected $primaryKey = 'id';
    protected $fillable = ['kategori'];

    public function product()
    {
        return $this->hasMany(Produk::class);
    }
}
