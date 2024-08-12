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
class AddRecieveEquipmentComponent extends Component
{      public $equipment_name;
    public $user_id;
    public $name_person;
    public $number_person;
    public $another_number_person;
    public $date;
    public $comment;
    public $company_id;
    public $brand_id;
    public $type_tool_id;
    public $indicator_equipment_id;
    public $equipment_id;
    public $serial;
    public $person_receive;


    protected $rules = [

        'name_person' => 'required',
        'number_person' => 'required|numeric',
        'company_id' => 'required|exists:companies,id',
        'brand_id' => 'required|exists:brands,id',
        'type_tool_id' => 'required|exists:type_tools,id',
        'indicator_equipment_id' => 'required|exists:indicator_equipment,id',
        'equipment_id' => 'required|exists:equipments,id',
    ];

    public function submitForm()
    {
        $this->validate([
          'name_person' => 'required',
            'number_person' => 'required',
            'company_id' => 'required',
            'brand_id' => 'required',
            'type_tool_id' => 'required',
            'indicator_equipment_id' => 'required',
            'equipment_id' => 'required',
        ]);


        ReceiveOrder::create([
            'user_id' => Auth::user()->id,
            'equipment_id' => $this->equipment_id,
            'name_person' => $this->name_person,
            'number_person' => $this->number_person,
            'serial' => $this->serial,
            'another_number_person' => $this->another_number_person,
            'company_id' => $this->company_id,
            'brand_id' => $this->brand_id,
            'comment' => $this->comment,
            'type_tool_id' => $this->type_tool_id,
            'indicator_equipment_id' => $this->indicator_equipment_id,
            'guarantee_status' => "0",
            'case_status' => "Receive",
            'person_receive'=>$this->person_receive
        ]);

        session()->flash('success', 'تم إضافة المعدة وأمر الاستلام بنجاح!');

        return redirect()->route('show-receive-equipment');
    }

    public function render()
    {
        $companies = Company::all();
        $brands = Brand::all();
        $typeTools = TypeTool::all();
        $indicatorEquipments = IndicatorEquipment::all();
        $Equipments = Equipment::all();

        return view('livewire.dashboard.recieve-equipment.add-recieve-equipment-component', compact('companies',
         'brands',
          'typeTools',
          'indicatorEquipments','Equipments'))->layout('layouts.admin');
    }
}
