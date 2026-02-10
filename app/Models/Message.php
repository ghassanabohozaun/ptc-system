<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sender_type',
        'sender_id',
        'receiver_type',
        'receiver_id',
        'subject',
        'body',
        'is_read',
        'is_starred',
        'sender_deleted',
        'receiver_deleted',
        'read_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_starred' => 'boolean',
        'sender_deleted' => 'boolean',
        'receiver_deleted' => 'boolean',
        'read_at' => 'datetime',
    ];

    // Relationships
    public function sender(): MorphTo
    {
        return $this->morphTo();
    }

    public function receiver(): MorphTo
    {
        return $this->morphTo();
    }

    // Scopes
    public function scopeInbox($query, $user)
    {
        return $query->where('receiver_type', get_class($user))
                     ->where('receiver_id', $user->id)
                     ->where('receiver_deleted', false);
    }

    public function scopeSent($query, $user)
    {
        return $query->where('sender_type', get_class($user))
                     ->where('sender_id', $user->id)
                     ->where('sender_deleted', false);
    }

    public function scopeTrash($query, $user)
    {
        return $query->where(function ($q) use ($user) {
            $q->where(function ($sq) use ($user) {
                $sq->where('receiver_type', get_class($user))
                   ->where('receiver_id', $user->id)
                   ->where('receiver_deleted', true);
            })->orWhere(function ($sq) use ($user) {
                $sq->where('sender_type', get_class($user))
                   ->where('sender_id', $user->id)
                   ->where('sender_deleted', true);
            });
        });
    }

    public function scopeStarred($query, $user)
    {
        return $query->where(function ($q) use ($user) {
            $q->where(function ($sq) use ($user) {
                $sq->where('receiver_type', get_class($user))
                   ->where('receiver_id', $user->id)
                   ->where('receiver_deleted', false);
            })->orWhere(function ($sq) use ($user) {
                $sq->where('sender_type', get_class($user))
                   ->where('sender_id', $user->id)
                   ->where('sender_deleted', false);
            });
        })->where('is_starred', true);
    }

    public function scopeUnread($query, $user)
    {
        return $query->where('receiver_type', get_class($user))
                     ->where('receiver_id', $user->id)
                     ->where('is_read', false)
                     ->where('receiver_deleted', false);
    }

    // Helper Methods
    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    public function toggleStar()
    {
        $this->update(['is_starred' => !$this->is_starred]);
    }

    public function moveToTrash($userType)
    {
        if ($userType === 'sender') {
            $this->update(['sender_deleted' => true]);
        } else {
            $this->update(['receiver_deleted' => true]);
        }
    }

    public function restoreFromTrash($userType)
    {
        if ($userType === 'sender') {
            $this->update(['sender_deleted' => false]);
        } else {
            $this->update(['receiver_deleted' => false]);
        }
    }
}
