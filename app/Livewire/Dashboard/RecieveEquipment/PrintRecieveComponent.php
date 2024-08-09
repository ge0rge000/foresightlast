<?php

namespace App\Livewire\Dashboard\RecieveEquipment;

use Livewire\Component;
use App\Models\ReceiveOrder;
use App\Models\Equipment;
use App\Models\User;
use App\Models\Company;
use App\Models\TypeTool;
use App\Models\Brand;
use App\Models\IndicatorEquipment;
use Auth;

class PrintRecieveComponent extends Component
{
    public $receiveOrder;

    public function mount($id)
    {
        $this->receiveOrder = ReceiveOrder::with(['user', 'contactPerson','equipment','company','Brand','type_tool','indicator_equipment'])->find($id);
    }
    public function render()
    {

        return view('livewire.dashboard.recieve-equipment.print-recieve-component')->layout('layouts.admin');
    }
}
