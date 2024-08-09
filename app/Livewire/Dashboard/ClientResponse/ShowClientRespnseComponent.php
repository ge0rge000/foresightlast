<?php
namespace App\Livewire\Dashboard\ClientResponse;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClientResponse;

class ShowClientRespnseComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function deleteResponse($id)
    {
        $response = ClientResponse::find($id);

        if ($response) {
            $response->delete();
            session()->flash('success', 'تم مسح الرد بنجاح');
        } else {
            session()->flash('error', 'لا يوجد الرد');
        }
    }



    public function render()
    {


        $clientresponses = ClientResponse::where('type_response', 'like', '%' . $this->searchTerm . '%')->paginate(10);

        return view('livewire.dashboard.client-response.show-client-respnse-component', ['clientresponses' => $clientresponses])->layout('layouts.admin');
    }

}
