<?php

namespace App\Livewire\Dashboard\Compalins;

use Livewire\Component;
use App\Models\Complain;

class ShowComplainComponent extends Component
{
    public $searchTerm;

    public function deleteComplain($id)
    {
        Complain::find($id)->delete();
        session()->flash('success', 'Complain deleted successfully.');
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        // Modify the query to search by company name
        $complains = Complain::where('name_complain', 'like', $searchTerm)
                            ->orWhere('number_of_person', 'like', $searchTerm)
                            ->orWhere('compain', 'like', $searchTerm)
                            ->orWhereHas('receiveOrder.company', function($query) use ($searchTerm) {
                                $query->where('name_company', 'like', $searchTerm);
                            })
                            ->get();

        return view('livewire.dashboard.compalins.show-complain-component', compact('complains'))->layout('layouts.admin');
    }
}
