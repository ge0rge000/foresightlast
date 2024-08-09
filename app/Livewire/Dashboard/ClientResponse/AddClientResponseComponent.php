<?php
namespace App\Livewire\Dashboard\ClientResponse;

use Livewire\Component;
use App\Models\ClientResponse;

class AddClientResponseComponent extends Component
{
    public $type_response;

    protected $rules = [
        'type_response' => 'required|string|max:255',
    ];

    public function submitForm()
    {
        $this->validate();

        ClientResponse::create([
            'type_response' => $this->type_response,
        ]);

        session()->flash('success', 'تم إضافة الرد بنجاح');

        return redirect()->route('show_responses');
    }

    public function render()
    {
        return view('livewire.dashboard.client-response.add-client-response-component')->layout('layouts.admin');
    }
}
