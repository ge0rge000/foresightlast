<?php
namespace App\Livewire\Dashboard\Company;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Company;
use Auth;
class AddCompanyComponent extends Component
{
    public $name_company;
    public $activity_company;
    public $governorate_id;
    public $city_id;
    public $address;
    public $user_id_register;
    public $cities = [];

    protected $rules = [
        'name_company' => 'required|string|max:255',
        'activity_company' => 'required',
        'governorate_id' => 'required',
        'city_id' => 'required|integer',
        'address' => 'required|string|max:255',

    ];

    public function submitForm()
    {
        $this->validate();

        Company::create([
            'name_company' => $this->name_company,
            'activity_company' => $this->activity_company,
            'government_id' => $this->governorate_id,
            'city_id' => $this->city_id,
            'address' => $this->address,
            'user_id_register' => Auth::id(), // Corrected line
        ]);


        session()->flash('success', 'تم اضافه شركه بنجاح');
        return redirect()->route('show_company');

    }

    public function render()
    {
        $this->cities = City::where('governorate_id', $this->governorate_id)->get();
        return view('livewire.dashboard.company.add-company-component', [
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
