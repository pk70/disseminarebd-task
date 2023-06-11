<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicants extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_name','id_division','email','programming_language',
        'address_details','has_training','id_district','id_thana'];

        /**
     * Interact with the log_data playload_data.
     */
    protected function programmingLanguage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value,true),
            set: fn ($value) => json_encode($value),
        );
    }

      public function trainingInfo(){
        return $this->hasMany(\App\Models\ApplicantTrainingInfos::class,'id_applicant');
      }

      public function educationalInfo(){
        return $this->hasMany(\App\Models\ApplicantEducationalInfos::class,'id_applicant');
      }
      public function files(){
        return $this->hasMany(\App\Models\ApplicantFiles::class,'id_applicant');
      }
}
