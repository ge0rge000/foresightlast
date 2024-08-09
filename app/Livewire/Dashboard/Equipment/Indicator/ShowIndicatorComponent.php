<?php

namespace App\Livewire\Dashboard\Equipment\Indicator;

use Livewire\Component;
use App\Models\IndicatorEquipment;

class ShowIndicatorComponent extends Component
{
    public $indicators;

    public function mount()
    {
        $this->indicators = IndicatorEquipment::all();
    }

    public function deleteIndicator($indicatorId)
    {
        $indicator = IndicatorEquipment::find($indicatorId);
        if ($indicator) {
            $indicator->delete();
            session()->flash('success', 'تم حذف البيان بنجاح!');
            $this->indicators = IndicatorEquipment::all(); // Refresh the indicators list
        } else {
            session()->flash('error', 'فشل في العثور على البيان!');
        }
    }
    public function render()
    {
        return view('livewire.dashboard.equipment.indicator.show-indicator-component')->layout('layouts.admin');
    }
}
