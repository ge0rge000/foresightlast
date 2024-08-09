<?php

namespace App\Livewire\Dashboard\Equipment\Brands;

use Livewire\Component;
use App\Models\Brand;

class EditBrandComponent extends Component
{
    public $brandId;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($brandId)
    {
        $this->brandId = $brandId;
        $brand = Brand::find($brandId);
        $this->name = $brand->name;
    }

    public function submitForm()
    {
        $this->validate();

        $brand = Brand::find($this->brandId);
        $brand->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'تم تعديل العلامة التجارية بنجاح!');
        return redirect()->route('show-brands');

    }

    public function render()
    {
        return view('livewire.dashboard.equipment.brands.edit-brand-component')->layout('layouts.admin');
    }
}
