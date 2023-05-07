@extends('home')
@section('content')
<!-- start: page body -->
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3>List of Billing Items</h3>

                    <div class="col text-md-end">
                        <a class="btn btn-primary" href="{{ url('billing-items/create') }}"><i class="fa fa-list me-2"></i>Create
                            Add Billing Item</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Billing item name</th>
                                <th>Billing item Charge</th>
                                <th>Billing item Active</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $row)
                            <tr>
                                <td class="sorting">{{ $loop->index + 1 }}</td>
                                <td class="sorting">{{$row->billing_item_name}}</td>
                                <td class="sorting">{{$row->billing_item_charge}}</td>
                                <td class="sorting">{{$row->billing_item_show_in_invoice}}</td>
                                <td class="sorting">
                                    <a href="{{ 'billing-items/' . $row->id . '/' . 'edit' }}"
                                       class="btn btn-sm btn-primary">Edit</a>

<!--                                    <a href="{{ 'billing-items/' . $row->id }}"
                                       class="btn btn-sm btn-info">View</a>-->


                                    <button class="btn btn-sm btn-warning"
                                            onclick="deleteItems({{ $row->id }})">Delete</button>               

                                </td>                               
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
            function deleteItems(params) {
            var isConfirm = confirm('Are You Sure!');
            if (isConfirm) {
                $('.loader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: "billing-items" + '/' + params,
                    success: function(data) {
                        location.reload();
                    }
                }).done(function() {
                    $("#success_msg").html("Data Save Successfully");
                }).fail(function(data, textStatus, jqXHR) {
                    $('.loader').hide();
                    var json_data = JSON.parse(data.responseText);
                    $.each(json_data.errors, function(key, value) {
                        $("#" + key).after(
                            "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                            value +
                            "</span>");
                    });
                });
            } else {
                $('.loader').hide();
            }
        }
</script>
@endsection