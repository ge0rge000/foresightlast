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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الردود</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نوع الرد</th>
                                    <th scope="col">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientresponses as $response)
                                    <tr>
                                        <th scope="row">{{ $response->id }}</th>
                                        <td>{{ $response->type_response }}</td>
                                        <td>
                                            @if(Auth::user()->can_update==1)
                                            <a href="{{ route('edit_response', ['id' => $response->id]) }}" class="btn btn-primary btn-sm">تعديل</a>
                                            @endif
                                            @if(Auth::user()->can_delete==1)
                                            <button wire:click="deleteResponse({{ $response->id }})" class="btn btn-danger btn-sm">حذف</button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $clientresponses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
