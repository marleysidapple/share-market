<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Broker;
use App\Rta;
use App\Dptable;
use App\Customerdmat;
use DB;
use App\Customermember;
use App\Customer;

class Helper
{
    public static function getAgent($reg, $st)
    {
    	switch ($reg) {
    		case 'dp':
    			$agentName = Dptable::find($st);
    			break;

    		case 'rta':
    			$agentName = Rta::find($st);
    			break;

    		case 'broker':
    			$agentName = Broker::find($st);
    			break;
    		
    		default:
    			return;
    			break;
    	}
        return $agentName->name;
    }



    public static function ret($id)
    {

        $cust_id = Customer::find($id);

        $checkTheChild = DB::table('customer_member')->where('child_id', $cust_id->user_id)->get();

        if (count($checkTheChild) == 0){
            return true;
        } else {
            return false;
        }
    }



    public static function expiresIn($dt)
    {
        $newTimestamp = strtotime('+1 year', strtotime($dt));
        return date('Y-m-d', $newTimestamp);
    }



    public static function renderPic($photo)
    {
        $parts = explode('/', $photo);
        if ($parts['2'] == ""){
            return 0;
        } else{
            return 1;
        }
    }
}