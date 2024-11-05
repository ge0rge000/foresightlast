<?php

namespace App\Livewire\Dashboard\Contactpersons;

use Livewire\Component;
use App\Models\ContactPerson;
use App\Models\Company;

class EditContactPersonComponent extends Component
{
    public $contactPersonId;
    public $name;
    public $mobile_number;
    public $second_mobile_number;
    public $address;
    public $selectedCompany ; // Array to hold selected companies
    public $job; // Array to hold selected companies

    protected $rules = [
        'name' => 'required|string|max:255|unique:users,name',
        'mobile_number' => 'required|string|max:255',
        'second_mobile_number' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'selectedCompany' => 'required', //
        'job' => 'required', //

    ];

    public function mount($id)
    {

        $contactPerson = ContactPerson::findOrFail($id);
        $this->contactPersonId = $contactPerson->id;
        $this->name = $contactPerson->name;
        $this->mobile_number = $contactPerson->mobile_number;
        $this->second_mobile_number = $contactPerson->second_mobile_number;
        $this->address = $contactPerson->address;
        $this->selectedCompany = $contactPerson->company_id; // Get the related companies
    }

    public function submitForm()
    {
        $this->validate();

        $contactPerson = ContactPerson::findOrFail($this->contactPersonId);
        $contactPerson->update([
            'name' => $this->name,
            'mobile_number' => $this->mobile_number,
            'second_mobile_number' => $this->second_mobile_number,
            'address' => $this->address,
            'job' => $this->job,
            'company_id ' => $this->selectedCompany,

        ]);
        session()->flash('success', 'تم تحديث بيانات الشخص بنجاح.');
        return redirect()->route('show_contacts');
    }

    public function render()
    {
        return view('livewire.dashboard.contactpersons.edit-contact-person-component', [
            'companies' => Company::all(),
        ])->layout('layouts.admin');
    }
}

