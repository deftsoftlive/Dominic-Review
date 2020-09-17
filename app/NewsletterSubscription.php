<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    protected $fillable = [
        'email', 'status', 'unsubscribed_by', 'created_at', 'updated_at'
    ];
}
