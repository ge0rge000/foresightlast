<?php

namespace App\Livewire\Dashboard\Compalins;

use Livewire\Component;
use App\Models\Complain;

class AllDetailsComplainComponent extends Component
{
    public $complain;

    public function mount($id)
    {
        $this->complain = Complain::with(['user', 'receiveOrder'])->find($id);
    }
    public function render()
    {

        return view('livewire.dashboard.compalins.all-details-complain-component')->layout('layouts.admin');
    }
}
