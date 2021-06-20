<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    public $primaryKey = 'id';
    public $timestamps = FALSE;
    public function answer()
    {
        return $this->hasMany(Answer::class,'id_question','id');
    }
}
