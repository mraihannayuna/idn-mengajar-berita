<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentator_id', 'post_id', 'comment','commentator'
    ];

    /**
 * Get the user that owns the Comment
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function commentator(): BelongsTo
{
    return $this->belongsTo(User::class, 'commentator_id', 'id');
}

}



