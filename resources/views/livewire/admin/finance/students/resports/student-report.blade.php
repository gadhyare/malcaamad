<div class="bg-white p-2">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="form-group">
                        <label for="students_info_id">
                            الرقم الجامعي
                        </label>
                        <span class="float-start">
                            @error('students_info_id')
                                <div class="bg-danger text-white px-2">
                                    مطلوب
                                </div>
                            @enderror
                        </span>
                        <input type="text" id="students_info_id" wire:model="students_info_id"
                            class="form-control rounded-0 alert alert-info py-2 my-2">
                    </div>
                    <div class="form-group">
                        <label for="from">
                            من تاريخ
                        </label>
                        <span class="float-start">
                            @error('from')
                                <div class="bg-danger text-white px-2">
                                    مطلوب
                                </div>
                            @enderror
                        </span>
                        <input type="date" id="from" wire:model="from"
                            class="form-control rounded-0 alert alert-info py-2 my-2">
                    </div>
                    <div class="form-group">
                        <label for="to">
                            حتى تاريخ
                        </label>
                        <span class="float-start">
                            @error('to')
                                <div class="bg-danger text-white px-2">
                                    مطلوب
                                </div>
                            @enderror
                        </span>
                        <input type="date" id="to" wire:model="to"
                            class="form-control rounded-0 alert alert-info py-2 my-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10">
            <div class="container fw-bold text-center" wire:loading>
                <img src="{{ asset('/images/loading-loading-forever.gif') }}" alt="loading"
                    style="width:50px; height:50px">
            </div>
            <br>
            <br>
            @php $i = 1 ; @endphp
            <table class="table table-bordered">
                <thead>
                    <th class="py-3">#</th>
                    <th class="py-3"> اسم الطالب </th>
                    <th class="py-3"> رقم الرصيد </th>
                    <th class="py-3"> التاريخ </th>
                    <th class="py-3"> جهة الدفع </th>

                    <th class="py-3"> الخصم </th>
                    <th class="py-3"> المبلغ </th>
                </thead>
                <tbody>
                    @foreach ($feetrans as $feetran)
                        <tr>
                            <td> {{ $i++ }}</td>
                            <td> {{ $feetran->invoices->studentInfo->name }}
                                {{ $feetran->invoices->studentInfo->father->name }} </td>
                            <td> {{ $feetran->invoices->id }} </td>
                            <td> {{ $feetran->paid_date }} </td>
                            <td> {{ $feetran->invoices->feestypes->name }} </td>
                            <td> {{ $feetran->descount }} </td>
                            <td> {{ $feetran->amount }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
