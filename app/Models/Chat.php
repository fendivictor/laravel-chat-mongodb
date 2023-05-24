<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';
    protected $collection = 'chats';
    protected $primaryKey = '_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sender_id',
        'sender_email',
        'receiver_id',
        'receiver_email',
        'message',
    ];
}
