@extends('home')
@section('content')

<style>
    span.select2.select2-container.select2-container--default{
        width: 450px !important;
    }
    .hide{
        display: none;
    }
    #valid-msg{
        color: green;
    }
    #error-msg{
        color: red;
    }
</style>

<div class="col-12">
    <div class="card">
        <div class="card-header">
          <h3>Edit Billing Items</h3>

                    <div class="col text-md-end">
                        <a class="btn btn-primary" href="{{ url('billing-items') }}"><i class="fa fa-list me-2"></i>
                            List of Billing Items</a>
                    </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="add_form" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
         

                    <div class="form-group col-md-6">
                        <label for="field_key">Billing Item Name *</label>
                        <input placeholder="Enter Default Value" id="billing_item_name" value="{{$items[0]->billing_item_name}}" class="form-control" name="billing_item_name" type="text">
                        <input placeholder="Enter Default Value" id="id" value="{{$items[0]->id}}" class="form-control" name="id" type="hidden">
                    </div>

                   
                    <div class="form-group col-md-6">
                        <label for="field_default_value">Billing Item Charge</label>
                        <input placeholder="Enter Default Value" id="billing_item_charge" value="{{$items[0]->billing_item_charge}}" class="form-control" name="billing_item_charge" type="text">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="field_in_list">Billing Item in Invoice ?</label>
                        <select class="form-control" name="billing_item_show_in_invoice" id="billing_item_show_in_invoice">
                            <option value="">Select</option>
                            <option value="YES" @if($items[0]->billing_item_show_in_invoice == "YES") selected @endif)>YES</option>
                            <option value="NO" @if($items[0]->billing_item_show_in_invoice == "NO") selected @endif>NO</option>
                        </select>
                    </div>
                </div>

                <br>

                <button type="button" id="add_btn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
    
</div>

<script>


    $("#add_btn").click(function (){
        $('.loader').show();
        $(".error_msg").html('');
        let data = new FormData($('#add_form')[0]);
        let id = $('#id').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{url("billing-items")}}/"+id,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                
            }
        }).done(function() {
            $("#success_msg").html("Data Save Successfully");
            window.location.href = "{{ url('billing-items')}}";
            // window.location.reload();
        }).fail(function(data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function(key, value){
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
        $('.loader').hide();
    });
  </script>


@endsection


