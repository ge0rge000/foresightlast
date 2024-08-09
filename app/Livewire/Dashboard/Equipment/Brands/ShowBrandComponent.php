<?php

namespace App\Livewire\Dashboard\Equipment\Brands;

use Livewire\Component;
use App\Models\Brand;
class ShowBrandComponent extends Component
{  public $brands;

    public function mount()
    {
        $this->brands = Brand::all();
    }
    public function deleteBrand($brandId)
    {
        $brand = Brand::find($brandId);
        if ($brand) {
            $brand->delete();
            session()->flash('success', 'تم حذف العلامة التجارية بنجاح!');
            $this->brands = Brand::all(); // Refresh the brands list
        } else {
            session()->flash('error', 'فشل في العثور على العلامة التجارية!');
        }
    }
    public function render()
    {
        return view('livewire.dashboard.equipment.brands.show-brand-component')->layout('layouts.admin');
    }
}
