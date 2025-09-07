<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;
class Project extends Model
{
    //
    use HasFactory;
    public function belongsToUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class,'project_id');
    }
}
