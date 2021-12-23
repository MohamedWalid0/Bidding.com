<?php

namespace App\Factories;

use App\Factories\interfaces\Report;

class ReportFactory {



    public function getType($reportType){
    

        if ( $reportType == null ){
            return false ;
        }

        if( strcasecmp ( trim($reportType), 'user' ) == 0 ) {
            return new ReportUser() ;
        }
        elseif( strcasecmp ( trim($reportType), 'product' ) == 0 ) {
            return new ReportProduct() ;   
        }

        else {
            return false ;
        }


    }




}