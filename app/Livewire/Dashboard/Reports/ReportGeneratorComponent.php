<?php

namespace App\Livewire\Dashboard\Reports;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ReportGeneratorComponent extends Component
{
    public $tables = [];
    public $columns = [];
    public $selectedTable = '';
    public $selectedColumns = [];
    public $reportData = [];

    public function mount()
    {
        $this->tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
    }

    public function updatedSelectedTable($table)
    {
        $this->columns = DB::getSchemaBuilder()->getColumnListing($table);
        $this->selectedColumns = [];
        $this->reportData = [];
    }
    public function generateReport()
    {
        if ($this->selectedTable && $this->selectedColumns) {
            $this->reportData = DB::table($this->selectedTable)
                                  ->select($this->selectedColumns)
                                  ->get()
                                  ->map(function($item) {
                                      return array_map('utf8_encode', (array) $item);
                                  })
                                  ->toArray();
        }
    }

    public function printReport()
    {
        $columns = array_map('utf8_encode', $this->selectedColumns);
        $data = array_map(function($row) {
            return array_map('utf8_encode', $row);
        }, $this->reportData);

        $pdf = \PDF::loadView('livewire.dashboard.reports.report-pdf-component', [
            'columns' => $columns,
            'data' => $data,
        ]);

        return $pdf->download('report.pdf');
    }


    public function render()
    {
        return view('livewire.dashboard.reports.report-generator-component')->layout('layouts.admin');
    }
}
