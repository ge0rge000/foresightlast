<?php

namespace App\Livewire\Dashboard\RecieveEquipment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReceiveOrder;
use Illuminate\Database\Eloquent\Builder;
use PDF; // Import the PDF facade

class ShowRecieveEquipmentComponent extends Component
{
    use WithPagination;
    public $searchTerm;
    public $date_recieve;
    public $created_at;


    public function updatingSearchTerm()
    {
        $this->resetPage();
    }
    public function delete($id)
    {
        $receiveOrder = ReceiveOrder::find($id);
        if ($receiveOrder) {
            $equipment = $receiveOrder->equipment;
            $receiveOrder->delete();
            $equipment->delete();
            session()->flash('success', 'تم حذف أمر الاستلام والمعدة المرتبطة بنجاح.');
        } else {
            session()->flash('error', 'أمر الاستلام غير موجود.');
        }
    }
    public function toggleGuarantee($id)
    {
        $receiveOrder = ReceiveOrder::find($id);
        if ($receiveOrder) {
            $receiveOrder->guarantee_status = $receiveOrder->guarantee_status == "1" ? "0" : "1";
            $receiveOrder->save();
        } else {
            session()->flash('error', 'أمر الاستلام غير موجود.');
        }
    }

    public function toggleCaseStatus($id)
    {
        $receiveOrder = ReceiveOrder::find($id);
        if ($receiveOrder) {
            $receiveOrder->case_status = $receiveOrder->case_status == "Receive" ? "Deliver" : "Receive";
            $receiveOrder->save();
        } else {
            session()->flash('error', 'أمر الاستلام غير موجود.');
        }
    }
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $receiveOrders = ReceiveOrder::where(function (Builder $query) use ($searchTerm) {
            $query->where('name_person', 'like', $searchTerm)
                ->orWhere('number_person', 'like', $searchTerm)
                ->orWhere('another_number_person', 'like', $searchTerm)
                ->orWhere('person_receive', 'like', $searchTerm)
                ->orWhere('serial', 'like', $searchTerm)
                ->orWhere('date_recieve', 'like', $searchTerm)
                ->orWhere('created_at', 'like', $searchTerm)
                ->orWhereHas('equipment', function (Builder $query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                })
                ->orWhereHas('user', function (Builder $query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                })
                ->orWhereHas('company', function (Builder $query) use ($searchTerm) {
                    $query->where('name_company', 'like', $searchTerm);
                });

            // Add specific filtering for case_status based on searchTerm
            if ($this->searchTerm == 'تم تسليم') {
                $query->orWhere('case_status', '=', 'Deliver');
            } elseif ($this->searchTerm == 'لم يتم تسليم') {
                $query->orWhere('case_status', '=', 'Receive');
            }
        })
        ->orderBy('created_at', 'DESC') // You can replace 'created_at' with the desired column

        ->get();

        return view('livewire.dashboard.recieve-equipment.show-recieve-equipment-component', ['receiveOrders' => $receiveOrders])->layout('layouts.admin');
    }

}
