<div>
    <form wire:submit.prevent="generateReport">
        <div>
            <label for="table">Select Table:</label>
            <select id="table" wire:model="selectedTable">
                <option value="">-- Select Table --</option>
                @foreach ($tables as $table)
                    <option value="{{ $table }}">{{ $table }}</option>
                @endforeach
            </select>
        </div>
        @if($columns)
        <div>
            <label for="columns">Select Columns:</label>
            @foreach ($columns as $column)
                <div>
                    <input type="checkbox" id="column_{{ $column }}" wire:model="selectedColumns" value="{{ $column }}">
                    <label for="column_{{ $column }}">{{ $column }}</label>
                </div>
            @endforeach
        </div>
        @endif
        <button type="submit">Generate Report</button>
    </form>

    @if($reportData)
        <table>
            <thead>
                <tr>
                    @foreach($selectedColumns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($reportData as $row)
                    <tr>
                        @foreach($selectedColumns as $column)
                            <td>{{ $row[$column] }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button wire:click="printReport">Print Report</button>
    @endif
</div>
