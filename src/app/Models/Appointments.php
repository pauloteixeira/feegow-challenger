<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    public $timestamps			= false;
	protected $primaryKey		= 'id';
	protected $table			= 'appointments';
	protected $connection		= 'mysql';

	protected $fillable			= ['specialty_id','professional_id','name','cpf','source_id','birthdate'];

	protected $hidden			= [];
	protected $attributes		= [];
	protected $casts			= [
        'id'					=> 'integer',
		'specialty_id'			=> 'integer',
		'professional_id'		=> 'integer',
		'source_id'			    => 'integer',
    ];
    protected $appends			= [];

    protected function getDateTimeFormatadoAttribute ()
	{
		return date('d/m/Y H:i:s', strtotime($this->attributes['date_time']));
	}

    protected function getBirthDateFormatadoAttribute ()
	{
		return date('d/m/Y', strtotime($this->attributes['birthdate']));
	}

	public static function boot()
    {
		parent::boot();

		static::creating(function ($model) {
			if( false == empty($model->date_time) )
				$model->date_time = \DateTime::createFromFormat('d/m/Y', $model->date_time)->format("Y-m-d h:i:s");
	
			$model->birthdate = \DateTime::createFromFormat('d/m/Y', $model->birthdate)->format("Y-m-d");
		});

		static::updating(function ($model) {
			if( false == empty($model->date_time) )
				$model->date_time = \DateTime::createFromFormat('d/m/Y', $model->date_time)->format("Y-m-d h:i:s");
		});
	}

}