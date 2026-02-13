<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    use HasFactory;
    protected $table = 'vision_mission';
    protected $fillable = [
        'visi_title', 'visi', 'misi_title', 'misi', 'intro',
    ];
}
