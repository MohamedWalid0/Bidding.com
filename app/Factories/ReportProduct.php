<?php

namespace App\Factories;

use App\Factories\interfaces\Report;
use App\Models\ReportProduct as ModelsReportProduct;
use Illuminate\Support\Facades\Auth;

class ReportProduct implements Report {


    public function sendReport($id){

        return ModelsReportProduct::create([
            'product_id' => $id ,
            'user_id' => Auth::user()->id
        ]) ;

    }

}
