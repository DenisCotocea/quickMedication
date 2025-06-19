<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dob',
        'sex',
        'height',
        'weight',
        'blood_pressure',
        'alcohol',
        'smoke',
        'allergy_details',
        'has_erectile_premature_ack',
        'has_general_medicines_ack',
        'has_steroids_medicines_ack',
        'has_weight_loss_ack',
        'has_birth_control_ack',
        'medications',
        'conditions',
    ];

    protected $casts = [
        'medications' => 'array',
        'conditions' => 'array',
        'has_erectile_premature_ack' => 'boolean',
        'has_general_medicines_ack' => 'boolean',
        'has_steroids_medicines_ack' => 'boolean',
        'has_weight_loss_ack' => 'boolean',
        'has_birth_control_ack' => 'boolean',
    ];
}

