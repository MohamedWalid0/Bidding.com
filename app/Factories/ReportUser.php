<?php

namespace App\Factories;
use App\Factories\interfaces\Report ;
use App\Models\ReportUser as ModelsReportUser;
// use App\Models\ReportUser ;
use Illuminate\Support\Facades\Auth;

class ReportUser implements Report {



    public function sendReport($id){

        return ModelsReportUser::create([
            'user_id' => $id ,
            'reporter_id' => Auth::user()->id
        ]) ;
    

    }




}