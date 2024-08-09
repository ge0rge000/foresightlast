<?php

namespace App\Livewire\Dashboard\Contactpersons;

use Livewire\Component;
use App\Models\ContactPerson;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowContactPersonComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $contactPerson = ContactPerson::findOrFail($id);

        $contactPerson->delete();

        session()->flash('success', 'تم مسح الشخص بنجاح');
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $contactPersons = ContactPerson::where(function (Builder $query) use ($searchTerm) {
            $query->where('name', 'like', $searchTerm)
                  ->orWhere('mobile_number', 'like', $searchTerm)
                  ->orWhere('second_mobile_number', 'like', $searchTerm)
                  ->orWhere('address', 'like', $searchTerm)
                  ->orWhereHas('company', function (Builder $query) use ($searchTerm) {
                      $query->where('name_company', 'like', $searchTerm);
                  });
        })->paginate(10);


        return view('livewire.dashboard.contactpersons.show-contact-person-component', compact('contactPersons'))->layout('layouts.admin');
    }
}
