<?php
namespace App\Livewire\Dashboard\Company;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Company;
use Auth;

class EditCompanyComponent extends Component
{
    public $name_company;
    public $activity_company;
    public $governorate_id;
    public $city_id;
    public $address;
    public $cities = [];
    public $company_id; // For editing purposes

    protected $rules = [
        'name_company' => 'required|string|max:255',
        'activity_company' => 'required',
        'governorate_id' => 'required',
        'city_id' => 'required|integer',
        'address' => 'required|string|max:255',
    ];

    public function mount($companyId)
    {
        $this->company_id = $companyId;
        $company = Company::findOrFail($companyId);
        $this->name_company = $company->name_company;
        $this->activity_company = $company->activity_company;
        $this->governorate_id = $company->government_id;
        $this->city_id = $company->city_id;
        $this->address = $company->address;
    }

    public function submitForm()
    {
        $this->validate();

        $company = Company::findOrFail($this->company_id);
        $company->update([
            'name_company' => $this->name_company,
            'activity_company' => $this->activity_company,
            'government_id' => $this->governorate_id,
            'city_id' => $this->city_id,
            'address' => $this->address,
            'user_id_register' => Auth::id(), // Optional, only if you want to track who updated it
        ]);

        session()->flash('success', 'تم تحديث بيانات الشركة بنجاح');
        return redirect()->route('show_company');
    }

    public function render()
    {
        $this->cities = City::where('governorate_id', $this->governorate_id)->get();
        return view('livewire.dashboard.company.edit-company-component', [
            'activities' => Activity::all(),
            'governorates' => Governorate::all(),
        ])->layout('layouts.admin');
    }

    public function updatedGovernorateId($value)
    {
        $this->cities = City::where('governorate_id', $value)->get();
        logger("Governorate ID updated to: {$value}");
        logger("Cities updated: " . json_encode($this->cities));
    }
}
