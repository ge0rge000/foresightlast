<?php

namespace App\Livewire\Dashboard\Sales;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class ShowSalesmanComponent extends Component
{
    public $salesmen;

    public function mount()
    {
        $this->salesmen = User::with('role')->get();
    }

    public function edit($id)
    {
        return redirect()->route('edit_sales', ['id' => $id]);
    }

    public function delete($id)
    {
        $salesman = User::find($id);
        if ($salesman) {
            $salesman->delete();
            session()->flash('success', 'مندوب المبيعات تم حذفه بنجاح.');
        } else {
            session()->flash('error', 'حدث خطأ أثناء حذف مندوب المبيعات.');
        }
        $this->salesmen = User::with('role')->get(); // Refresh the list
    }

    public function render()
    {
        return view('livewire.dashboard.sales.show-salesman-component', ['salesmen' => $this->salesmen])->layout('layouts.admin');
    }
}
