<!-- resources/views/livewire/dashboard/following/today-following.blade.php -->
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
            <input type="text" class="form-control" placeholder="بحث بالاسم او اسم شركه او ارقام الموبايل او عنوان" wire:model.debounce.500ms="searchTerm">
        </div>
    </div>

    <div class="card-content collapse show">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>اسم المتابع</th>
                        <th>اسم شركه</th>
                        <th>الاسم تابع للشركه</th>
                        <th>نوع المتابعة</th>
                        <th>وقت  اتصال اخر </th>
                        <th>تاريخ اتصال اخر </th>
                        <th>تعليق</th>
                        <th>الاجراءت</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todaysFollowings as $follow)
                        <tr>
                            <td>{{ $follow->id }}</td>
                            <td>{{ $follow->user->name }}</td>
                            <td>{{ $follow->contactPerson->company->name_company }}</td>
                            <td>{{ $follow->contactPerson->name }}</td>
                            <td>{{ $follow->typefollow == 'visit' ? 'زياره' : 'مكالمة' }}</td>
                            <td>{{ $follow->time_calling }}</td>
                            <td>{{ $follow->date_calling }}</td>
                            <td>{{ $follow->comments }}</td>
                            <td>
                                @if(Auth::user()->can_update == 1)
                                    <a href="{{ route('edit_following', ['id' => $follow->id]) }}" class="btn btn-warning">تعديل</a>
                                @endif
                                @if(Auth::user()->can_delete == 1)
                                    <button wire:click="deleteFollowing({{ $follow->id }})" class="btn btn-danger">حذف</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $todaysFollowings->links() }}
        </div>
    </div>
</div>
