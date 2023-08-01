<div class="container py-5 fw-bold">
    <div class="form-group col-xs-12 col-sm-12 col-md-4 ">
        <div class="float-end">
            <select class=" form-select bg-white  pe-5 " wire:model.lazy="billingCycleId">
                <option> اختر الدورة المالية </option>
                @foreach ($billingCycles as $item)
                    <option value="{{ $item->id }}"> {{ $item->from }} - {{ $item->to }} </option>
                @endforeach
            </select>
        </div>
        <div class="float-end" >
             <p class="mt-2 mx-3">
                الرصيد الافتتاحي: {{$initial_balance->initial_balance ?? 0}}
             </p>
        </div>
        <div class="float-start" wire:loading>
            <p class="mt-2 ">
            <i class="fa-solid fa-spinner  text-danger"></i>
            </p>
        </div>
    </div>


    <div class="clearfix"></div>

    <br>

    <div class="container px-0">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="card rounded-0 shadow-md border-0">
                    <div class="card-header rounded-0 bg-gray-dark text-white"> رسوم الطلبة </div>
                    <div class="card-body">
                        <div>المطلوب:   <span class="float-start" > {{$total_of_want}} </span> </div>
                        <div>المدفوع:     <span class="float-start" > {{$paid_amount}} </span> </div>
                        <div> الخصم:   <span class="float-start" > {{$total_of_discount}} </span> </div>
                        <div>المتبقي:   <span class="float-start" > {{$total_of_want - $paid_amount - $total_of_discount}} </span> </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="card rounded-0 shadow-md border-0">
                    <div class="card-header rounded-0 bg-gray-dark text-white">  مالية الموظفين     </div>
                    <div class="card-body">
                        <div> العلاوات:   <span class="float-start" > {{$total_of_allowance}} </span> </div>
                        <div> المرتبات:     <span class="float-start" > {{$total_of_employee_net_sallary}} </span> </div>
                        <div> <br>  </div>
                        <div> <br>  </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="card rounded-0 shadow-md border-0">
                    <div class="card-header rounded-0 bg-gray-dark text-white"> العلاوات والمصروفات   </div>
                    <div class="card-body">
                        <div> العلاوات:   <span class="float-start" > {{$total_of_allowance}} </span> </div>
                        <div> المصروفات:     <span class="float-start" > {{$total_of_expenses}} </span> </div>
                        <div> المشتريات:   <span class="float-start" > {{$total_of_discount}} </span> </div>
                        <div> <br>  </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">

            </div>
        </div>
    </div>


<div class="container py-2 px-0">
    <p>
        الفائدة: {{ ($initial_balance->initial_balance ?? 0) + ($paid_amount ?? 0)  -  ($total_of_allowance + $total_of_employee_net_sallary + $total_of_expenses ?? 0 )     }}
    </p>
</div>
</div>
