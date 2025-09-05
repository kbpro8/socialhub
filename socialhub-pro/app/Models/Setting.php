<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a key-value pair for application settings.
 *
 * This model is used to store and retrieve general settings for the application.
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];
}
