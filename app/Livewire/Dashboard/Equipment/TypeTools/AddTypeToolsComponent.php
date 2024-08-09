<?php

namespace App\Livewire\Dashboard\Equipment\TypeTools;

use Livewire\Component;
use App\Models\TypeTool;

class AddTypeToolsComponent extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function submitForm()
    {
        $this->validate();

        TypeTool::create([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم إضافة نوع الأداة بنجاح!');
        $this->reset('name');
        return redirect()->route('show-Type-equipment');

    }
    public function render()
    {
        return view('livewire.dashboard.equipment.type-tools.add-type-tools-component')->layout('layouts.admin');
    }
}
