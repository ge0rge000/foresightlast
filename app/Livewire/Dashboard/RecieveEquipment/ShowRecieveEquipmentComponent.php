<?php

namespace App\Livewire\Dashboard\RecieveEquipment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReceiveOrder;
use Illuminate\Database\Eloquent\Builder;
use PDF; // Import the PDF facade
use Carbon\Carbon;

class ShowRecieveEquipmentComponent extends Component
{
    use WithPagination;
    public $searchTerm;
    public $dateRecieve;
    public $createdAt;


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
            // Apply search term filters to various fields
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

            // Apply case_status filters based on searchTerm
            if ($this->searchTerm == 'تم تسليم') {
                $query->orWhere('case_status', '=', 'Deliver');
            } elseif ($this->searchTerm == 'لم يتم تسليم') {
                $query->orWhere('case_status', '=', 'Receive');
            }

            if ($this->createdAt) {
                // Ensure you're only comparing the date part of created_at
                $query->whereDate('created_at', '=', $this->createdAt);
            }

            if ($this->dateRecieve) {
                $query->whereDate('date_recieve', '=', $this->dateRecieve);
            }

            // Check if a search term for 'created_at' exists, and treat it like a date search
            if ($this->searchTerm) {
                // This ensures that if 'created_at' contains a date like '2024-08-18', it matches
                $query->orWhereDate('created_at', '=', $this->searchTerm);  // Compare just the date part
            }
        })
        ->orderBy('created_at', 'DESC') // Adjust this if you want to order by a different column
        ->get();
        // $createdAt = '%' . $this->createdAt . '%';
        // $createdAt =  $createdAt ; // if you want to match the time

        // $receiveOrders = ReceiveOrder::where(function (Builder $query) use ($createdAt) {
        //     $query->where('created_at', 'like', $createdAt);
        // })
        // ->orderBy('created_at', 'DESC') // Adjust this if you want to order by a different column
        // ->get();


        return view('livewire.dashboard.recieve-equipment.show-recieve-equipment-component', ['receiveOrders' => $receiveOrders])->layout('layouts.admin');
    }


}
