<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a post scheduled for a social media account.
 *
 * This model contains the content of the post, the account it belongs to,
 * its scheduling and publishing status, and timestamps.
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'social_account_id',
        'content',
        'scheduled_at',
        'status',
        'posted_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'posted_at' => 'datetime',
    ];

    /**
     * Get the user that owns the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the social account that the post belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function socialAccount()
    {
        return $this->belongsTo(SocialAccount::class);
    }
}
