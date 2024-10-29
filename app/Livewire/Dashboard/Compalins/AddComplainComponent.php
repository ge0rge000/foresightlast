<?php

namespace App\Livewire\Dashboard\Compalins;

use Livewire\Component;
use App\Models\Complain;
use App\Models\User;
use App\Models\ReceiveOrder;
use App\Models\ContactPerson;
use App\Models\Company;
use Auth;

class AddComplainComponent extends Component
{
    public $name_complain, $number_of_person, $compain, $user_id, $recieve_order_id, $selected_comapny, $reaction_complain;
    public $date_reaction;

    public function submitForm()
    {
        $this->validate([
            'name_complain' => 'required|string|max:255',
            'number_of_person' => 'required|string|max:255',
            'compain' => 'required|string',
            'recieve_order_id' => 'required|exists:receive_orders,id',
            'date_reaction' => 'nullable|date', // Add validation for date_reaction
        ]);


        Complain::create([
            'name_complain' => $this->name_complain,
            'number_of_person' => $this->number_of_person,
            'compain' => $this->compain,
            'reaction_complain' => $this->reaction_complain,
            'user_id' => Auth::user()->id,
            'recieve_order_id' => $this->recieve_order_id,
            'date_reaction' => $this->date_reaction, // Include date_reaction
        ]);


        return redirect()->route('show_complains');
    }

    public function render()
    {
        $users = User::all();
        $receiveOrders = ReceiveOrder::where('company_id', $this->selected_comapny)->get();
        $persons = ContactPerson::where('company_id', $this->selected_comapny)->get();
        $compaines = Company::all();
        return view('livewire.dashboard.compalins.add-complain-component', compact('users', 'receiveOrders', 'compaines', 'persons'))->layout('layouts.admin');
    }
}
