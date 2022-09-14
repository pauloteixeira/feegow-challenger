<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;

class AppointmentController extends Controller {
    public function save( Request $request ) {
        if( $request->isMethod('POST') ) {
            $model = new Appointments();
            $model->fill($request->post());

            $model->doSave();
        }
    }
}