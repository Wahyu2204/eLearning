<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    // mendefinisikan dield yang bileh diisi
    protected $fillable = ['name','category','desc'];

    /**
     * 1 to 1
     * - hasOne (Nama MOdelnya) > table saat ini meminjamkan id
     * - BelongsTo (Nama Modelnya) > table saat ini mminjamkan id dari table lain
     * 
     * 1 to M
     * - hasMany (nama Modelnya) > table saat ini meminjamkan id
     * - belongsTomany (nama Modelnya) > table saat ini mminjamkan id dari table lain
     */

    // mendefinisikan relasi ke model course
    public function students(){
        return $this->hasMany(Student::class);
    }
}