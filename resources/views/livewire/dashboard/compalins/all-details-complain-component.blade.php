<div>
    @livewireScripts
    <div class="card-content collapse show">
        <div class="card-body">
            <h4 class="form-section"><i class="ft-user"></i> تفاصيل الشكوى</h4>

            <!-- Print Button -->
            <button onclick="printDiv()" class="btn btn-primary mb-3">طباعة</button>

            <div class="table-responsive" id="printableArea">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>اسم الشاكي</th>
                            <td>{{ $complain->name_complain }}</td>
                        </tr>
                        <tr>
                            <th>رقم موبايل الشاكي</th>
                            <td>{{ $complain->number_of_person }}</td>
                        </tr>
                        <tr>
                            <th>الشركه التابعه</th>
                            <td>{{ $complain->receiveOrder->company->name_company }}</td>
                        </tr>
                        <tr>
                            <th>البيان</th>
                            <td>{{ $complain->receiveOrder->indicator_equipment->name }}</td>
                        </tr>
                        <tr>
                            <th>النوع</th>
                            <td>{{ $complain->receiveOrder->type_tool->name }}</td>
                        </tr>
                        <tr>
                            <th>الماركه</th>
                            <td>{{ $complain->receiveOrder->Brand->name }}</td>
                        </tr>
                        <tr>
                            <th>المعده</th>
                            <td>{{ $complain->receiveOrder->equipment->name }}</td>
                        </tr>
                        <tr>
                            <th>الشكوى</th>
                            <td>{{ $complain->compain }}</td>
                        </tr>
                        <tr>
                            <th>رد شكوي</th>
                            <td>{{ $complain->reaction_complain }}</td>
                        </tr>
                        <tr>
                            <th>المستخدم</th>
                            <td>{{ $complain->user->name }}</td>
                        </tr>
                        <tr>
                            <th>طلب الاستلام</th>
                            <td>{{ $complain->receiveOrder->id }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function printDiv() {
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
