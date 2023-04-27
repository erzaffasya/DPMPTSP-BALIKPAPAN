<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSurvey extends Model
{
    use HasFactory;
    protected $table = 'data_survey';
    protected $fillable = [
        'survey_kepuasan_id', 'jumlah'
    ];

    protected $primaryKey = 'id';
    public function SurveyKepuasan()
    {
        return $this->belongsTo(SurveyKepuasan::class, 'survey_kepuasan_id', 'id');
    }
}
