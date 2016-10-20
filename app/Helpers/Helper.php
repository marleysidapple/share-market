<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Broker;
use App\Rta;
use App\Dptable;
use App\Customerdmat;

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
}