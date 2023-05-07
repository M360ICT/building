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
                <h4 class="card-title">Create Billing Item</h4>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="add_form" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="field_key">Create Payroll Expense Item *</label>
                            <input placeholder="Enter Payroll Expense Item" id="payroll_expense_name" class="form-control"
                                name="payroll_expense_name" type="text">
                        </div>
                    </div>

                    <br>

                    <button type="button" id="add_btn" class="btn btn-primary">Submit</button>
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
    </script>
@endsection
