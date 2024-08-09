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
            <input type="text" class="form-control" placeholder=" بحث بالاسم او اسم شركه او ارقام الموبايل او عنوان " wire:model.live.debounce.500ms="searchTerm">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اشخاص تابعه لشركات </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">رقم موبايل</th>
                                    <th scope="col">رقم موبايل اخر</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">الشركات</th>
                                    <th scope="col">الاجراءت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactPersons as $contactPerson)
                                    <tr>
                                        <th scope="row">{{ $contactPerson->id }}</th>
                                        <td>{{ $contactPerson->name }}</td>
                                        <td>{{ $contactPerson->mobile_number }}</td>
                                        <td>{{ $contactPerson->second_mobile_number }}</td>
                                        <td>{{ $contactPerson->address }}</td>
                                        <td>
                                        {{$contactPerson->company->name_company}}

                                        </td>
                                        <td>
                                            @if(Auth::user()->can_update==1)
                                            <a href="{{ route('edit_contact_person', ['id' => $contactPerson->id]) }}"
                                               class="btn btn-primary btn-sm">تعديل</a>
                                                @endif
                                               @if(Auth::user()->can_delete==1)
                                               <button wire:click="delete({{ $contactPerson->id }})" class="btn btn-danger btn-sm">حذف</button>
                                               @endif
                                            </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $contactPersons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
