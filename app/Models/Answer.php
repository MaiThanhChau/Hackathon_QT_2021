<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Answer extends Model
{
    use HasFactory;
    public $primaryKey = 'id_answer';
    protected $table = 'answers';
    public $timestamps = FALSE;
    public function quest()
    {
        return $this->belongsTo(Question::class, 'id_answer', 'id_question');
    }
}
