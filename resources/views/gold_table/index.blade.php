@extends('layouts.app')
@section('content')
<style>
.editvalue{
    width: 100px;
    border: 1px solid #ccc;
}
</style>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Gold </span></h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="head-label">
                    <h5 class="card-title mb-0">Gold Listing
                    </h5>
                        {{ $goldRates->where('type', 'datetime')->first()->value ?? '' }}
                </div>
            </div>
            <div class="card-datatable text-nowrap">
                <table class="dt-column-search table table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Add Value</th>
                            <th>Water Level</th>
                            <th>New Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($goldRates->where('type', '!=', 'datetime') as $row)
                        <tr>
                            <td>{{$row->type??""}}</td>
                            @if($row->type == 'usd')
                            <td>{{number_format($row->value, 4)??""}}</td>
                            @else
                            <td>{{number_format($row->value, 2)??""}}</td>
                            @endif
                            <td>
                                @if($row->type != 'datetime')
                                <input type="text" class="editvalue" name="additional_value" value="{{$row->additional_value??''}}" onchange="saveData({{$row->id}})" id="additional_value_{{$row->id}}" />
                                @endif
                            </td>
                            <td>
                                @if($row->type != 'datetime' && $row->type != 'usd')
                                <input type="text" class="editvalue" name="water_level" value="{{$row->water_level??''}}" onchange="saveData({{$row->id}})" id="water_level_{{$row->id}}" />
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
    $(function(){
        var table = $('#mytable').DataTable({
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            pageLength: 10,
            displayLength: 5,
            ordering:false,
            lengthMenu: [5, 10, 25, 50, 75, 100],
        });
    });
    function saveData(id){
        var additional_value = $('#additional_value_'+id).val();
        var water_level = $('#water_level_'+id).val();
        $.ajax({
            url: '{{ route("update_additional_value") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                additional_value: additional_value,
                water_level: water_level
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