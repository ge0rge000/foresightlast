<?php

namespace App\Livewire\Dashboard\Equipment\Indicator;

use Livewire\Component;
use App\Models\IndicatorEquipment;
class EditIndicatorComponent extends Component
{
    public $indicatorId;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($indicatorId)
    {
        $this->indicatorId = $indicatorId;
        $indicator = IndicatorEquipment::find($indicatorId);
        $this->name = $indicator->name;
    }

    public function submitForm()
    {
        $this->validate();

        $indicator = IndicatorEquipment::find($this->indicatorId);
        $indicator->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم تعديل البيان بنجاح!');
        return redirect()->route('show-Indicator');

    }

    public function render()
    {
        return view('livewire.dashboard.equipment.indicator.edit-indicator-component')->layout('layouts.admin');
    }
}
