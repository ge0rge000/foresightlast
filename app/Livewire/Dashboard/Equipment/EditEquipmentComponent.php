<?php

namespace App\Livewire\Dashboard\Equipment;

use Livewire\Component;
use App\Models\Equipment;

class EditEquipmentComponent extends Component
{
    public $equipmentId;
    public $name;

    public function mount($id)
    {
        $equipment = Equipment::findOrFail($id);
        $this->equipmentId = $equipment->id;
        $this->name = $equipment->name;
    }

    public function submitForm()
    {
        $this->validate();

        $equipment = Equipment::find($this->equipmentId);
        $equipment->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم تعديل بيانات المعده');

        return redirect()->route('show-equipment');
    }
    protected $rules = [
        'name' => 'required',

    ];

    public function render()
    {
        return view('livewire.dashboard.equipment.edit-equipment-component')->layout('layouts.admin');
    }
}
