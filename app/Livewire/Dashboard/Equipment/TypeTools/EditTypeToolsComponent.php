<?php

namespace App\Livewire\Dashboard\Equipment\TypeTools;

use Livewire\Component;
use App\Models\TypeTool;

class EditTypeToolsComponent extends Component
{
    public $typeToolId;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($typeToolId)
    {
        $this->typeToolId = $typeToolId;
        $typeTool = TypeTool::find($typeToolId);
        $this->name = $typeTool->name;
    }

    public function submitForm()
    {
        $this->validate();

        $typeTool = TypeTool::find($this->typeToolId);
        $typeTool->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم تعديل نوع الأداة بنجاح!');
        return redirect()->route('show-Type-equipment');

    }

    public function render()
    {
        return view('livewire.dashboard.equipment.type-tools.edit-type-tools-component')->layout('layouts.admin');
    }
}
