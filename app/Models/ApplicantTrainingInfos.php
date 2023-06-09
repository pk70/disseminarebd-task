<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantTrainingInfos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_applicant', 'training_name', 'details',
    ];

    //  /**
    //  * Interact with the user's first name.
    //  */
    // protected function trainingDetails(): Attribute
    // {

    //     return Attribute::make(
    //         //get: fn (string $value) => ucfirst($value),
    //         set: fn ($value) => implode(",",$value),
    //     );
    // }
}
