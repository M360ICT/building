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
                    <h4 class="card-title">Create Flat</h4>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="add_form" autocomplete="off">
                        @csrf
                        <div class="row">


                            <div class="form-group col-md-6">
                                <label for="field_key">Flat No*</label>
                                <input placeholder="Enter Default Value" id="flat_no" class="form-control" name="flat_no"
                                    type="text">
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
                                <select class="form-control" name="owner_id" id="owner_id">
                                    <option value="">Select</option>
                                    @foreach ($users as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="field_key">Flat Entry ID*</label>
                                <input placeholder="Enter Default Value" id="entry_id" class="form-control" name="entry_id"
                                    type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="field_in_list">Floor No?</label>
                                <select class="form-control" name="floor_no" id="floor_no">
                                    <option value="">Select</option>
                                    <?php
                            for($i=0;$i<30;$i++)
                            {
                            ?>
                                    <option><?php echo $i; ?></option>
                                    <?php }?>
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="field_default_value">House No.</label>
                                <input placeholder="Enter Default Value" id="house_no" class="form-control" name="house_no"
                                    type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="field_default_value">Road No.</label>
                                <input placeholder="Enter Default Value" id="road_no" class="form-control" name="road_no"
                                    type="text">
                            </div>

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
                url: "{{ url('flat') }}",
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
