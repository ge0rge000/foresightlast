<?php

namespace App\Livewire\Dashboard\Equipment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipment;

class ShowEquipmentComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }
    public function deleteequipment($id)
    {
        $equipment = Equipment::find($id);
        if ($equipment) {
            $equipment->delete();
            session()->flash('success', 'تم مسح المعده بنجاح');
        } else {
            session()->flash('error', 'المعده غير موجوده');
        }
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $equipments = Equipment::where('name', 'like', $searchTerm)->paginate(10);


        return view('livewire.dashboard.equipment.show-equipment-component', ['equipments' => $equipments])->layout('layouts.admin');
    }
}
