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

    public function doSave () : Appointments {
        if( false == empty($this->date_time) )
            $this->date_time = \DateTime::createFromFormat('d/m/Y', $this->date_time)->format("Y-m-d h:i:s");

        $this->birthdate = \DateTime::createFromFormat('d/m/Y', $this->birthdate)->format("Y-m-d");
		$this->save();

		return $this;
	}

    public function doUpdate () : Appointment {
        if( false == empty($this->date_time) )
            $this->date_time = \DateTime::createFromFormat('d/m/Y', $this->date_time)->format("Y-m-d");

		$this->save();

		return $this;
    }

    protected function getDateTimeFormatadoAttribute ()
	{
		return date('d/m/Y H:i:s', strtotime($this->attributes['date_time']));
	}

    protected function getBirthDateFormatadoAttribute ()
	{
		return date('d/m/Y', strtotime($this->attributes['birthdate']));
	}

}