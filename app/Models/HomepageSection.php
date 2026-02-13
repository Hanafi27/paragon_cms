<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class HomepageSection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['section', 'key', 'value', 'type'];

    public function getActivitylogOptions(): \Spatie\Activitylog\LogOptions
    {
        return \Spatie\Activitylog\LogOptions::defaults()
            ->logOnly(['section', 'key', 'value', 'type'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('homepage_section');
    }
}
