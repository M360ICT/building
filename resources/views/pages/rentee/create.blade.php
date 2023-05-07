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
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Rentee</h4>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="add_form" autocomplete="off">
                        @csrf
                        <div class="row">




                            <div class="form-group col-md-6">
                                <label for="field_in_list">Select Flat</label>
                                <select class="form-control" name="flat_id" id="flat_id">
                                    <option value="">Select</option>
                                    @foreach ($flats as $row)
                                        <option value="{{ $row->id }}">{{ $row->flat_no }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="field_in_list">Building</label>
                                <select class="form-control" name="building_id" id="building_id">
                                    <option value="">Select</option>
                                    @foreach ($buildings as $row)
                                        <option value="{{ $row->id }}">{{ $row->building_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="field_in_list">Assign Owner</label>
                                <select class="form-control" name="user_id" id="user_id">
                                    <option value="">Select</option>
                                    @foreach ($users as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!--                        <div class="form-group col-md-6">
                            <label for="field_default_value">Rent.</label>
                            <input placeholder="Enter Default Value" id="rent" class="form-control" name="rent" type="text">
                        </div>-->

                            <div class="form-group col-md-6">
                                <label for="field_default_value">Description.</label>
                                <input placeholder="Enter Default Value" id="description" class="form-control"
                                    name="description" type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="field_in_list">Status ?</label>
                                <select class="form-control" name="status" id="status">

                                    <option value="ACTIVE" selected>ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <button type="button" id="add_btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
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
                url: "{{ url('rentee') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {

                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                window.location.href = "{{ url('flat') }}";
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
