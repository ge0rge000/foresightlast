<div>
    <style>
        body {
            direction: rtl;
            text-align: right;
        }

        table {
            width: 100%;
            direction: rtl;
            text-align: right;
        }

        th,
        td {
            text-align: right;
        }

        @media print {
            .no-print {
                display: none;
            }
            table {
                direction: rtl;
                text-align: right;
            }
            th,
            td {
                text-align: right;
            }
        }
    </style>
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
            <input type="text" class="form-control" placeholder="بحث بالاسم او اسم شركه او ارقام الموبايل او عنوان" wire:model.live.debounce.500ms="searchTerm">
        </div>
    </div>

    <div class="card-content collapse show">
        <div class="card-body">
            <h4 class="form-section"><i class="ft-activity"></i> قائمة المتابعات</h4>
            <button onclick="printFollowingTable()" class="btn btn-primary mb-3 no-print">طباعة الجدول</button>
            <div class="table-responsive">
                <table class="table table-striped" id="followingsTable" dir="rtl">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>اسم المتابع</th>
                            <th>اسم شركه</th>
                            <th>الاسم تابع للشركه</th>
                            <th>نوع المتابعة</th>
                            <th>وقت اتصال اخر </th>
                            <th>تاريخ اتصال اخر </th>
                            <th>تعليق</th>
                            <th class="no-print">الاجراءت</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($followinsgs as $follow)
                            <tr>
                                <td>{{ $follow->id }}</td>
                                <td>{{ $follow->user->name }}</td>
                                <td>{{ $follow->contactPerson->company->name_company }}</td>
                                <td>{{ $follow->contactPerson->name }}</td>
                                <td>{{ $follow->typefollow=="visit"?'زياره':'مكالمة' }}</td>
                                <td>{{ $follow->time_calling }}</td>
                                <td>{{ $follow->date_calling }}</td>
                                <td>{{ $follow->comments }}</td>
                                <td class="no-print">
                                    @if(Auth::user()->can_update==1)
                                        <a href="{{ route('edit_following', ['id' => $follow->id]) }}" class="btn btn-warning">تعديل</a>
                                    @endif
                                    @if(Auth::user()->can_delete==1)
                                        <button wire:click="deleteFollowing({{ $follow->id }})" class="btn btn-danger">حذف</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <iframe id="printIframe" style="display:none;"></iframe>

    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>

    <script>
        function printFollowingTable() {
            var table = document.getElementById("followingsTable").outerHTML;
            var iframe = document.getElementById("printIframe");
            var doc = iframe.contentDocument || iframe.contentWindow.document;
            doc.open();
            doc.write('<html><head><title>Print</title><style>@media print { .no-print { display: none; } table { direction: rtl; }}</style></head><body>' + table + '</body></html>');
            doc.close();
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }
    </script>
</div>
