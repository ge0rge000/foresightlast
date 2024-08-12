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

class EditRecieveEquipmentComponent extends Component
{     public $receiveOrderId;
    public $equipment_id;
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
    public $serial;
    public $person_receive;

    public function mount($id)
    {
        $receiveOrder = ReceiveOrder::findOrFail($id);
        $this->receiveOrderId = $receiveOrder->id;
        $this->user_id = $receiveOrder->user_id;
        $this->equipment_id = $receiveOrder->equipment_id;
        $this->name_person = $receiveOrder->name_person;
        $this->number_person = $receiveOrder->number_person;
        $this->another_number_person = $receiveOrder->another_number_person;
        $this->company_id = $receiveOrder->company_id;
        $this->comment = $receiveOrder->comment;
        $this->brand_id = $receiveOrder->brand_id;
        $this->type_tool_id = $receiveOrder->type_tool_id;
        $this->indicator_equipment_id = $receiveOrder->indicator_equipment_id;
        $this->serial = $receiveOrder->serial;
        $this->person_receive = $receiveOrder->person_receive;

    }

    protected $rules = [
        'user_id' => 'required|exists:users,id',
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
        $this->validate();

        $receiveOrder = ReceiveOrder::findOrFail($this->receiveOrderId);
        $receiveOrder->update([
            'user_id' => Auth::user()->id,
            'serial' => $this->equipment_id,
            'name_person' => $this->name_person,
            'number_person' => $this->number_person,
            'another_number_person' => $this->another_number_person,
            'serial' => $this->serial,
            'company_id' => $this->company_id,
            'comment' => $this->comment,
            'brand_id' => $this->brand_id,
            'type_tool_id' => $this->type_tool_id,
            'indicator_equipment_id' => $this->indicator_equipment_id,
            'equipment_id' => $this->equipment_id,
            'person_receive'=>$this->person_receive

        ]);

        session()->flash('success', 'تم تحديث أمر الاستلام بنجاح.');

        return redirect()->route('show-receive-equipment');
    }

    public function render()
    {
        $companies = Company::all();
        $brands = Brand::all();
        $typeTools = TypeTool::all();
        $indicatorEquipments = IndicatorEquipment::all();
        $Equipments = Equipment::all();

        return view('livewire.dashboard.recieve-equipment.edit-recieve-equipment-component',
        compact('companies', 'brands', 'typeTools', 'indicatorEquipments', 'Equipments'))->layout('layouts.admin');
    }
}
