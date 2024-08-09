<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\ActivityCompany;
use App\Models\Activity;
use App\Models\ClientResponse;
use App\Models\Company;
use App\Models\ContactPerson;
use App\Models\Equipment;
use App\Models\Governorate;
use App\Models\ReceiveOrder;
use App\Models\User;
use App\Models\Complain;

use App\Models\Following;
use Carbon\Carbon;
use DB;

class HomeComponent extends Component
{
    public function render()
    {

        ///sales
        $usersWithUserRole = User::count();

        //company
        $compaines=Company::count();

        ///contact Person
        $contactpersons=ContactPerson::count();

        ///following
        $totalfollowing=Following::count();
        $currentMonth = Carbon::now()->month;
        //// sales man
        $highRecordsCount = Following::with('user')
            ->select('user_id', DB::raw('count(*) as total'))
            // ->whereMonth('created_at', $currentMonth)
            ->groupBy('user_id')
            ->orderBy('total', 'desc')
            ->first();

        $lowRecordsCount = Following::with('user')
                ->select('user_id', DB::raw('count(*) as total'))
                // ->whereMonth('created_at', $currentMonth)
                ->groupBy('user_id')
                ->orderBy('total', 'asc')
                ->first();

         ////recieve order
         $highestRecordCompany  = ReceiveOrder::select('company_id', DB::raw('COUNT(*) as total'))
        //  ->whereMonth('created_at', $currentMonth)
         ->groupBy('company_id')
         ->orderBy('total', 'desc')
         ->first();

         $lowestRecordCompany  = ReceiveOrder::select('company_id', DB::raw('COUNT(*) as total'))
        //  ->whereMonth('created_at', $currentMonth)
         ->groupBy('company_id')
         ->orderBy('total', 'asc')
         ->first();

        ////following
        $todayFollowingCount = Following::whereDate('date_calling', Carbon::today())->count();
        $visitFollowingCount = Following::where('typefollow', 'visit')->whereMonth('created_at', $currentMonth)->count();
        $callFollowingCount = Following::where('typefollow', 'call')->whereMonth('created_at', $currentMonth)->count();



        $recieveOrder = ReceiveOrder::count();
        $recieveOrderwithdeliver = ReceiveOrder::where('case_status','Deliver')->count();
        $recieveOrderwithrecieve = ReceiveOrder::where('case_status','Receive')->count();
        $recieveOrderwithguarantee = ReceiveOrder::where('guarantee_status','1')->count();
        $recieveOrderwithnonguarantee = ReceiveOrder::where('guarantee_status','0')->count();

        ////charts////
          // Get following data per month
        $followingData = Following::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('count', 'month')
        ->toArray();

    // Get receive_orders data per month
    $receiveOrdersData = ReceiveOrder::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('count', 'month')
        ->toArray();

    // Generate labels for the past year
    $labels = [];
    $currentMonth = Carbon::now()->startOfMonth();
    for ($i = 0; $i < 12; $i++) {
        $labels[] = $currentMonth->format('Y-m');
        $currentMonth->subMonth();
    }
    $complaintsData = Complain::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
  
    $labels = array_reverse($labels);
        return view('livewire.dashboard.home-component',compact('recieveOrder','recieveOrderwithdeliver',
        'recieveOrderwithrecieve','recieveOrderwithguarantee'
        ,'recieveOrderwithnonguarantee','compaines','contactpersons',
        'totalfollowing','highRecordsCount','lowRecordsCount',
        'highestRecordCompany','lowestRecordCompany','todayFollowingCount','visitFollowingCount','callFollowingCount',
        'followingData', 'receiveOrdersData', 'labels','complaintsData'))->layout('layouts.admin');
    }
}
