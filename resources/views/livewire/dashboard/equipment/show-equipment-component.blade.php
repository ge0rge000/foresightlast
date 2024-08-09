<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-md-12">
            <input type="text" class="form-control" placeholder="بحث" wire:model.live.debounce.500ms="searchTerm">
        </div>
    </div>

    <div class="card-content collapse show">
        <div class="card-body">
            <h4 class="form-section"><i class="ft-activity"></i> المعدات</h4>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>

                        <th>الاجراءات</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($equipments as $equipment)
                        <tr>
                            <td>{{ $equipment->id }}</td>
                            <td>{{ $equipment->name }}</td>
                            <td>
                                @if(Auth::user()->can_update==1)

                                <a href={{ route('edit-equipment', ['id' => $equipment->id]) }} class="btn btn-primary btn-sm">تعديل</a>
                                @endif
                                @if(Auth::user()->can_delete==1)

                                <button wire:click="deleteequipment({{ $equipment->id }})" class="btn btn-danger btn-sm">حذف</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $equipments->links() }}

        </div>
    </div>
</div>
