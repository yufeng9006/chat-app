<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'size', 'uploaded_at'];
}
