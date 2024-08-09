<?php

namespace App\Livewire\Dashboard\Equipment\TypeTools;

use Livewire\Component;
use App\Models\TypeTool;

class ShowTypeToolsComponent extends Component
{
    public $typeTools;

    public function mount()
    {
        $this->typeTools = TypeTool::all();
    }

    public function deleteTypeTool($typeToolId)
    {
        $typeTool = TypeTool::find($typeToolId);
        if ($typeTool) {
            $typeTool->delete();
            session()->flash('success', 'تم حذف نوع الأداة بنجاح!');
            $this->typeTools = TypeTool::all(); // Refresh the typeTools list
        } else {
            session()->flash('error', 'فشل في العثور على نوع الأداة!');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.equipment.type-tools.show-type-tools-component')->layout('layouts.admin');
    }
}
