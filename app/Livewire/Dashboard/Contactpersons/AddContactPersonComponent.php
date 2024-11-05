<?php

namespace App\Livewire\Dashboard\Contactpersons;

use Livewire\Component;
use App\Models\Company;
use App\Models\ContactPerson;


class AddContactPersonComponent extends Component
{
    public $name;
    public $mobile_number;
    public $second_mobile_number;
    public $address;
    public $selectedCompany; // Array to hold selected companies
    public $job; // Array to hold selected companies

    protected $rules = [
        'name' => 'required|string|max:255|unique:users,name',
        'mobile_number' => 'required|string|max:255',
        'second_mobile_number' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'selectedCompany' => 'required', // Validation rule for selected companies
    ];
    public $selected = '';

    public $series = [
        'Wanda Vision',
        'Money Heist',
        'Lucifer',
        'Stranger Things',
    ];
    public function submitForm()
    {
        $this->validate();
        $contactPerson = ContactPerson::create([
            'name' => $this->name,
            'mobile_number' => $this->mobile_number,
            'second_mobile_number' => $this->second_mobile_number,
            'address' => $this->address,
            'job' => $this->job,
            'company_id' => $this->selectedCompany,
        ]);

        session()->flash('success', 'تم إضافة الشخص بنجاح.');

        return redirect()->route('show_contacts');
    }

    public function render()
    {
        $companies = Company::all();
        return view('livewire.dashboard.contactpersons.add-contact-person-component', [
            'companies' => $companies,
        ])->layout('layouts.admin');
    }
}
