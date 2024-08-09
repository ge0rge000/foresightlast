<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
            <h4 class="form-section"><i class="ft-activity"></i> قائمة المندوبين</h4>
            <button onclick="printSalesmenTable()" class="btn btn-primary mb-3 no-print">طباعة الجدول</button>
            <div class="table-responsive">
                <table class="table table-striped" id="salesmenTable" dir="rtl">
                    <thead class="thead-dark">
                        <tr>
                            <th>اسم المندوب</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم موبايل</th>
                            <th class="no-print">انشاء</th>
                            <th class="no-print">حذف</th>
                            <th class="no-print">قراءه</th>
                            <th class="no-print">تعديل</th>
                            <th class="no-print">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salesmen as $salesman)
                            <tr>
                                <td>{{ $salesman->name }}</td>
                                <td>{{ $salesman->email }}</td>
                                <td>{{ $salesman->number_of_phone }}</td>
                                <td class="no-print">{!! $salesman->can_create ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                                <td class="no-print">{!! $salesman->can_delete ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                                <td class="no-print">{!! $salesman->can_read ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                                <td class="no-print">{!! $salesman->can_update ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                                <td class="no-print">
                                    @if(Auth::user()->can_update == 1)
                                        <button wire:click="edit({{ $salesman->id }})" class="btn btn-primary">تعديل</button>
                                    @endif
                                    @if(Auth::user()->can_delete == 1)
                                        <button wire:click="delete({{ $salesman->id }})" class="btn btn-danger">حذف</button>
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
        function printSalesmenTable() {
            var table = document.getElementById("salesmenTable").outerHTML;
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
