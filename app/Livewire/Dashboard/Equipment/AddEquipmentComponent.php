<?php

namespace App\Livewire\Dashboard\Equipment;

use Livewire\Component;
use App\Models\Equipment;

class AddEquipmentComponent extends Component
{
    public $name;
    public $serial;

    protected $rules = [
        'name' => 'required',

    ];

    public function submitForm()
    {
        $this->validate();

        Equipment::create([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم اضافه المعده بنجاح');

        return redirect()->route('show-equipment');
    }

    public function render()
    {
        return view('livewire.dashboard.equipment.add-equipment-component')->layout('layouts.admin');
    }
}
