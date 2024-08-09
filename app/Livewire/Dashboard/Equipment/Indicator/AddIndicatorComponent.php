<?php

namespace App\Livewire\Dashboard\Equipment\Indicator;

use Livewire\Component;
use App\Models\IndicatorEquipment;

class AddIndicatorComponent extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function submitForm()
    {
        $this->validate();

        IndicatorEquipment::create([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم إضافة المؤشر بنجاح!');
        $this->reset('name');
        return redirect()->route('show-Indicator');

    }
    public function render()
    {
        return view('livewire.dashboard.equipment.indicator.add-indicator-component')->layout('layouts.admin');
    }
}
