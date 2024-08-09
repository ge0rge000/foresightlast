<div>

    <!-- Display success or error messages -->
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
                    <h4 class="card-title">شركات</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">اسم الشركة</th>
                                    <th scope="col">النشاط</th>
                                    <th scope="col">المحافظة</th>
                                    <th scope="col">المدينة</th>
                                    <th scope="col">العنوان</th>
                                    <th scope="col">المسجل</th>
                                    <th scope="col">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <th scope="row">{{ $company->id }}</th>
                                        <td>{{ $company->name_company }}</td>
                                        <td>{{ $company->activity->name_of_activity }}</td>
                                        <td>{{ $company->governorate->governorate_name_ar }}</td>
                                        <td>{{ $company->city->city_name_ar }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ $company->user->name }}</td>
                                        <td>
                                            @if(Auth::user()->can_update==1)

                                            <a href={{ route('edit_company', ['companyId' => $company->id]) }} class="btn btn-primary btn-sm">تعديل</a>
                                            @endif
                                            @if(Auth::user()->can_delete==1)
                                            <button wire:click="deleteCompany({{ $company->id }})" class="btn btn-danger btn-sm">حذف</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
