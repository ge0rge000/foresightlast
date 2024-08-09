<?php

namespace App\Livewire\Dashboard\ClientResponse;

use Livewire\Component;
use App\Models\ClientResponse;

class EditClientRespnseComponent extends Component
{ public $responseId;
    public $type_response;

    protected $rules = [
        'type_response' => 'required|string|max:255',
    ];

    public function mount($id)
    {
        $response = ClientResponse::findOrFail($id);
        $this->responseId = $response->id;
        $this->type_response = $response->type_response;
    }

    public function submitForm()
    {
        $this->validate();

        $response = ClientResponse::findOrFail($this->responseId);
        $response->update([
            'type_response' => $this->type_response,
        ]);

        session()->flash('success', 'تم تعديل الرد بنجاح');

        return redirect()->route('show_responses');
    }

    public function render()
    {
        return view('livewire.dashboard.client-response.edit-client-respnse-component')->layout('layouts.admin');
    }
}
