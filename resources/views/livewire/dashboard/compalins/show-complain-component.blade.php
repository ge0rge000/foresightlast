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
                <input type="text" class="form-control" placeholder=" البحث بالاسم او اسم الشكوى او رقم الشاكي او اسم الشركه" wire:model.live.debounce.500ms="searchTerm">
            </div>
        </div>

        <div class="card-content collapse show">
            <div class="card-body">
                <h4 class="form-section"><i class="ft-activity"></i> قائمة الشكاوى</h4>
                <button onclick="printComplaintsTable()" class="btn btn-primary mb-3 no-print">طباعة الجدول</button>
                <div class="table-responsive">
                    <table class="table table-striped" id="complaintsTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>اسم الشكوى</th>
                                <th>رقم موبايل الشاكي</th>
                                <th>الشركه التابعه</th>
                                <th>الشكوى</th>
                                <th>المستخدم</th>
                                <th>طلب الاستلام</th>
                                <th>تاريخ استلام الشكوي </th>
                                <th>تاريخ رد الشكوي </th>

                                <th>رد شكوي</th>

                                <th class="no-print">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complains as $complain)
                                <tr>
                                    <td>{{ $complain->id }}</td>
                                    <td>{{ $complain->name_complain }}</td>
                                    <td>{{ $complain->number_of_person }}</td>
                                    <td>{{ $complain->receiveOrder->company->name_company }}</td>
                                    <td>{{ $complain->compain }}</td>
                                    <td>{{ $complain->user->name }}</td>
                                    <td>{{ $complain->receiveOrder->id }}</td>
                                    <td>{{ $complain->created_at }}</td>
                                    <td>{{ $complain->date_reaction }}</td>
                                    <td>{{ $complain->reaction_complain }}</td>

                                    <td class="no-print">
                                        <a href="{{ route('details_complain', ['id' => $complain->id]) }}" class="btn btn-info">تفاصيل</a>
                                        @if(Auth::user()->can_update==1)
                                            <a href="{{ route('edit_complains', ['id' => $complain->id]) }}" class="btn btn-warning">تعديل</a>
                                        @endif
                                        @if(Auth::user()->can_delete==1)
                                            <button wire:click="deleteComplain({{ $complain->id }})" class="btn btn-danger">حذف</button>
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

        <script>
            function printComplaintsTable() {
                var table = document.getElementById("complaintsTable").outerHTML;
                var iframe = document.getElementById("printIframe");
                var doc = iframe.contentDocument || iframe.contentWindow.document;
                doc.open();
                doc.write('<html lang="ar" dir="rtl"><head><title>Print</title><style>@media print { .no-print { display: none; } table { width: 100%; direction: rtl; text-align: right; } th, td { text-align: right; }}</style></head><body>' + table + '</body></html>');
                doc.close();
                iframe.contentWindow.focus();
                iframe.contentWindow.print();
            }
        </script>
    </div>



