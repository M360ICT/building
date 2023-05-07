@extends('home')
@section('content')
    @inject('employee_info', 'App\Models\Configuration\Employee')
    <style>
        span.select2.select2-container.select2-container--default {
            width: 450px !important;
        }

        .hide {
            display: none;
        }

        #valid-msg {
            color: green;
        }

        #error-msg {
            color: red;
        }
    </style>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Payroll Expense Items</h3>

                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('billing-items') }}"><i class="fa fa-list me-2"></i>
                        List of Payroll Expense Items</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="row g-3 maskking-form" id="payroll_form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="payroll_id" value="{{ $data->id }}">
                    <input type="hidden" name="payroll_transaction_id" value="{{ $pr->transaction_account_id }}">

                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg" readonly id="employee_get"
                                    placeholder="Employee *" name="employee_id"
                                    value="{{ $employee_info->getEmployeeName($data->payroll_employee_id) }}">


                                <input type="hidden" class="form-control form-control-lg" id="hiddenEmployeeId"
                                    placeholder="Employee *" name="payroll_employee_id"
                                    value="{{ $data->payroll_employee_id }}">
                                <label class="form-label" for="TextInput">Employee</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <label class="form-label" for="TextInput">Payment Method</label>
                                <input type="text" class="form-control form-control-lg" readonly id="employee_get"
                                    placeholder="Employee *" name="payroll_account_method"
                                    value="{{ $data->payroll_account_method }}">
                            </span>
                            <input type="hidden" id="hiddenAccId" name="expense_account">
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <input type="text" class="form-control form-control-lg" readonly id="employee_get"
                                placeholder="Employee *" name=""
                                value="{{ get_account_method_information_by_id($data->payroll_account_id) }}">

                            <input type="hidden" name="payroll_account_id" value="{{ $data->payroll_account_id }}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="card m-4">
                            <h3 class="text-center text-info p-3">Expense Purposes</h3>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="salary" name="salary" value="{{ $data->salary }}">

                                <label class="form-label" for="TextInput">salary</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="Deduction" name="deduction" value="{{ $data->deduction }}">

                                <label class="form-label" for="TextInput">deduction</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="Deduction Reason" name="deduction_reason"
                                    value="{{ $data->deduction_reason }}">

                                <label class="form-label" for="TextInput">deduction_reason</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="Mobile Bill" name="mobile_bill" value="{{ $data->mobile_bill }}">

                                <label class="form-label" for="TextInput">mobile_bill</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="food_bill" name="food_bill" value="{{ $data->food_bill }}">

                                <label class="form-label" for="TextInput">food_bill</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="Bonus" name="bonus" value="{{ $data->bonus }}">

                                <label class="form-label" for="TextInput">Bonus</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="commision" name="commision" value="{{ $data->commision }}">

                                <label class="form-label" for="TextInput">commision</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="Festifal Bonus" name="festifal_bonus"
                                    value="{{ $data->festifal_bonus }}">

                                <label class="form-label" for="TextInput">festifal_bonus</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg expense_amnt" id="employee_get"
                                    placeholder="TA" name="TA" value="{{ $data->TA }}">

                                <label class="form-label" for="TextInput">TA</label>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg" id="payroll_date"
                                    placeholder="Employee *" name="payroll_date" readonly
                                    value="{{ $data->payroll_date }}">
                                <label class="form-label" for="TextInput">Date</label>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <textarea name="payroll_note" id="" cols="30" rows="10"></textarea>
                                <label class="form-label" for="TextInput">{{ $data->payroll_note }}</label>
                            </span>
                        </div>
                    </div>





                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <script>
        $("#payroll_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#payroll_form')[0]);
            let payroll = $("[name=payroll_id]").val();
            $('#loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('payroll') }}/" + payroll,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    window.location.href = "{{ url('payroll') }}/" + payroll;
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                //window.location.href = "{{ url('employees') }}/";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $('#loader').hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
        });
    </script>
@endsection
