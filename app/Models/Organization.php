<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'organization';
    protected $fillable = [
        'title', 'org_intro', 'org_chart', 'founder_img', 'founder_name', 'founder_role',
        'co_founder_img', 'co_founder_name', 'co_founder_role', 'team_img'
    ];
}
