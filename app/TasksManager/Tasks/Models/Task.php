<?php

namespace App\TasksManager\Tasks\Models;

use App\TasksManager\Tasks\Enums\StatusValue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $task_id
 * @property string $title
 * @property string $description
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property string $status_value
 */
class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    protected $appends = ['status_value'];

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    public function getStatusValueAttribute(): string
    {
        return StatusValue::VALUES[$this->status];
    }
}
