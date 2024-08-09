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

    <div class="card-content collapse show">
        <div class="card-body">
            <h4 class="form-section"><i class="ft-activity"></i> قائمة البيان</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المؤشر</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($indicators as $indicator)
                    <tr>
                        <td>{{ $indicator->id }}</td>
                        <td>{{ $indicator->name }}</td>
                        <td>
                            @if(Auth::user()->can_update==1)
                            <a href="{{ route('edit-Indicator', ['indicatorId' => $indicator->id]) }}" class="btn btn-primary btn-sm">تعديل</a>
                            @endif
                            @if(Auth::user()->can_delete==1)
                            <button wire:click="deleteIndicator({{ $indicator->id }})" class="btn btn-danger btn-sm">حذف</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
