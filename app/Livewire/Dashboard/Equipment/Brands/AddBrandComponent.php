<?php

namespace App\Livewire\Dashboard\Equipment\Brands;

use Livewire\Component;
use App\Models\Brand;

class AddBrandComponent extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function submitForm()
    {
        $this->validate();

        Brand::create([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم إضافة العلامة التجارية بنجاح!');
        $this->reset('name');
        return redirect()->route('show-brands');
    }
    public function render()
    {
        return view('livewire.dashboard.equipment.brands.add-brand-component')->layout('layouts.admin');
    }
}
