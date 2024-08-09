<?php
namespace App\Livewire\Dashboard\Compalins;

use Livewire\Component;
use App\Models\Complain;
use App\Models\User;
use App\Models\ReceiveOrder;
use Auth;
class EditComplainComponent extends Component
{
    public $complainId;
    public $name_complain, $number_of_person, $compain, $user_id, $recieve_order_id;

    public function mount($id)
    {
        $complain = Complain::find($id);
        $this->complainId = $complain->id;
        $this->name_complain = $complain->name_complain;
        $this->number_of_person = $complain->number_of_person;
        $this->compain = $complain->compain;
        $this->user_id = $complain->user_id;
        $this->recieve_order_id = $complain->recieve_order_id;
    }

    public function submitForm()
    {
        $this->validate([
            'name_complain' => 'required|string|max:255',
            'number_of_person' => 'required|string|max:255',
            'compain' => 'required|string',
            'recieve_order_id' => 'required|exists:receive_orders,id',
        ]);

        $complain = Complain::find($this->complainId);
        $complain->update([
            'name_complain' => $this->name_complain,
            'number_of_person' => $this->number_of_person,
            'compain' => $this->compain,
            'user_id' => Auth::user()->id,
            'recieve_order_id' => $this->recieve_order_id,
        ]);

        return redirect()->route('show_complains');
    }

    public function render()
    {
        $users = User::all();
        $receiveOrders = ReceiveOrder::all();
        return view('livewire.dashboard.compalins.edit-complain-component', compact('users', 'receiveOrders'))->layout('layouts.admin');
    }
}
