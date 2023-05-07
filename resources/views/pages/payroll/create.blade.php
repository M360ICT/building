@extends('home')
@section('content')
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
                <h4 class="card-title">Add Employee Expense</h4>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="row g-3 maskking-form" id="payroll_form">
                    @csrf

                    {{-- @php
                        $date = date('y-m-d');
                    @endphp
                    <input type="hidden" id="row" value="{{ $row_count }}">
                    <input type="hidden" id="date" value="{{ $date }}"> --}}

                    <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg" id="employee_get"
                                    placeholder="Employee *" name="employee_id">
                                <input type="hidden" class="form-control form-control-lg" id="hiddenEmployeeId"
                                    placeholder="Employee *" name="payroll_employee_id">
                                <label class="form-label" for="TextInput">Employee</label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">


                            <span class="float-label">
                                <select class="form-control form-control-lg" id="payment_type"
                                    name="payroll_account_method">
                                    <option selected disabled>Select Payment Type</option>

                                    <option value="BANK">BANK</option>
                                    <option value="CASH">CASH</option>
                                    <option value="MOBILE_BANKING">MOBILE_BANKING</option>
                                </select>
                            </span>
                            <input type="hidden" id="hiddenAccId" name="expense_account">
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <select class="form-control form-control-lg" id="getAccount" name="payroll_account_id">

                                </select>
                            </span>
                            <input type="hidden" id="hiddenAccId" name="expense_account">
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg" id="amount_check"
                                    placeholder="Accounts *" name="amount_check" readonly>
                                <label class="form-label" for="TextInput">Available Balance</label>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card m-4">
                            <h3 class="text-center text-info p-3">Expense Purposes</h3>
                        </div>
                    </div>

                    <div class="row mb-4">
                        @foreach ($items as $items)
                            <div class="col-lg-4 col-md-6 col-sm-6 m-4">
                                <span class="float-label">
                                    <input type="text" class="form-control form-control-lg expense_amnt"
                                        id="employee_get" placeholder="E *" name="{{ $items->payroll_expense_name }}">
                                    {{-- <input type="hidden" class="form-control form-control-lg" id="amount_check"
                                        placeholder="Accounts *" name="amount_check"> --}}
                                    <label class="form-label" for="TextInput">{{ $items->payroll_expense_name }}</label>
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <input type="text" class="form-control form-control-lg" id="payroll_date"
                                    placeholder="Employee *" name="payroll_date" readonly value="{{ date('d-m-Y') }}">
                                <label class="form-label" for="TextInput">Date</label>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="float-label">
                                <textarea name="payroll_note" id="" cols="30" rows="10"></textarea>
                                <label class="form-label" for="TextInput">Note</label>
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
        $("#add_btn").click(function() {
            $('.loader').show();
            $(".error_msg").html('');
            var data = new FormData($('#add_form')[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('payroll-expense-items') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {

                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                window.location.href = "{{ url('payroll-expense-items') }}";
                // window.location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
            $('.loader').hide();
        });




        // var cost = 0;
        // $('.expense_amnt').blur(function() {
        //     cost += $(this).val();
        //     alert(cost);
        //     // ds
        // });


        $("#payroll_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#payroll_form')[0]);

            // var sum = 0;
            // $('.expense_amnt').each(function() {
            //     sum += parseFloat($(this).text());
            // });
            // alert(sum);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('payroll') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    alert('Completed');
                    window.location.href = "{{ url('payroll') }}";
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                // window.location.href = "{{ url('payroll') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });


        });



        $('#employee_get').autocomplete({
            html: true,
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-employee') }}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function(data) {
                        response(data.content);
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.label);
                $('#amount_check').val(ui.item.remain);
                $('#hiddenEmployeeId').val(ui
                    .item.value);
                $('#remaining').val(ui.item.remain);

                return false;
            },
            minLength: 1,
            open: function() {

                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {

                if ($('#hiddenEmployeeId').val() == '') {
                    $(this).val('');
                    $('#hiddenEmployeeId').val('');
                    alert();
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });

        $('#payment_type').on('click', function() {
            let payment_type = $(this).find(":checked").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "GET",
                url: "{{ url('invoice/account-type') }}" + '/' + payment_type,
                success: function(data, textStatus, jqXHR) {
                    $('#getAccount').html(data);
                    // $('#productAddBtn').removeClass('disabled');
                    // alert(data);
                    // $('#InvoiceButtonArea').hide();
                    // $('#InvoiceSkipButtonArea').show();
                    //$('#checkMoneyReceipt').html(data);
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
                // window.location.href = "{{ url('agents') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });
        });

        $('#getAccount').on('change', function() {
            let acc = $(this).val();

            $.ajax({
                method: "GET",
                url: "{{ url('get-current-account-bal') }}" + '/' + acc,
                success: function(data, textStatus, jqXHR) {
                    $('#amount_check').val(data);
                    //alert(data);

                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                // window.location.href = "{{ url('payroll-expense-items') }}";
                // window.location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });
        });
    </script>
@endsection
