@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Gold </span></h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="head-label">
                    <h5 class="card-title mb-0">Gold Listing</h5>
                </div>
            </div>
            <div class="card-datatable text-nowrap">
                <table class="dt-column-search table table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Additional Value</th>
                            <th>New Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($goldRates as $row)
                        <tr>
                            <td>{{$row->type??""}}</td>
                            <td>{{$row->value??""}}</td>
                            <td>
                                @if($row->type != 'datetime')
                                <input type="text" class="form-control" name="additional_value" value="{{$row->additional_value??''}}" onchange="saveData({{$row->id}})" id="additional_value_{{$row->id}}" />
                                @endif
                            </td>
                            <td id="new_value_{{$row->id}}">{{$row->new_value??""}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->


    @endsection
    @section('page-js')
    @endsection
    @section('scripts')
    <script>
    $(function () {
        $('#mytable').DataTable({
            responsive: true,
            paging: false,     
            searching: false,  
            info: false,
            ordering: false,  
        });
    });

    function saveData(id){
        var additional_value = $('#additional_value_'+id).val();
        $.ajax({
            url: '{{ route("update_additional_value") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                additional_value: additional_value
            },
            success: function(response) {
                if(response.status == 'success'){
                    alert('Additional value updated successfully.');
                    $('#new_value_'+id).text(response.new_value);
                } else {
                    alert('Failed to update additional value.');
                }
            },
            error: function(xhr) {
                alert('An error occurred while updating additional value.');
            }
        });
    }
  </script>
    @endsection