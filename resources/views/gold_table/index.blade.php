@extends('layouts.app')
@section('content')
<style>
.editvalue{
    width: 100px;
    border: 1px solid #ccc;
}
.editnamevalue{
    width: 200px;
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
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons"> 
                        <a class="dt-button create-new btn btn-primary" type="button" href="{{route('gold.create')}}">
                            <span><i class="bx bx-plus me-sm-1"></i> 
                                <span class="d-none d-sm-inline-block">Add New Gold</span>
                            </span>
                        </a> 
                    </div>
                </div>

            <div class="card-datatable text-nowrap">
                <table class="dt-column-search table table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Water Level</th>
                            <th>Add Value</th>
                            <th>New Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($goldRates->where('type', '!=', 'datetime') as $row)
                        <tr>
                            <td>{{$row->type??""}}</td>
                            <td><input type="text" class="editnamevalue" name="show_name" value="{{$row->show_name??""}}" onchange="saveData({{$row->id}})" id="show_name_{{$row->id}}" /></td>
                            @if($row->type == 'usd')
                           
                            <td>
                                <input type="text"
                                    class="editvalue"
                                    name="value"
                                    value="{{$row->value, 4 ?? ''}}"
                                    onchange="saveData({{$row->id}})"
                                    id="value_{{$row->id}}" />
                            </td>
                            @else
                           
                            <td>
                                <input type="text"
                                    class="editvalue"
                                    name="value"
                                    value="{{$row->value, 2 ?? ''}}"
                                    onchange="saveData({{$row->id}})"
                                    id="value_{{$row->id}}" />
                            </td>
                            @endif
                            <td>
                                @if($row->type != 'datetime' && $row->type != 'usd')
                                <input type="text" class="editvalue" name="water_level" value="{{$row->water_level??''}}" onchange="saveData({{$row->id}})" id="water_level_{{$row->id}}" />
                                @endif
                            </td>
                            <td>
                                @if($row->type != 'datetime')
                                <input type="text" class="editvalue" name="additional_value" value="{{$row->additional_value??''}}" onchange="saveData({{$row->id}})" id="additional_value_{{$row->id}}" />
                                @endif
                            </td>
                            
                            @if($row->type == 'usd')
                            <td id="new_value_{{$row->id}}">{{number_format($row->new_value, 4)??""}}</td>
                            @else
                            <td id="new_value_{{$row->id}}">{{number_format($row->new_value, 2)??""}}</td>
                            @endif
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
            pageLength: 20,
            displayLength: 5,
            ordering:false,
            lengthMenu: [20, 25, 50, 75, 100]
        });
    });
    // function saveData(id){
    //     var show_name = $('#show_name_'+id).val();
    //     var additional_value = $('#additional_value_'+id).val();
    //     var water_level = $('#water_level_'+id).val();
    //     $.ajax({
    //         url: '{{ route("update_additional_value") }}',
    //         type: 'POST',
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             id: id,
    //             show_name: show_name,
    //             additional_value: additional_value,
    //             water_level: water_level
    //         },
    //         success: function(response) {
    //             if(response.status == 'success'){
    //                 alert('Additional value updated successfully.');
    //                 $('#new_value_'+id).text(response.new_value);
    //             } else {
    //                 alert('Failed to update additional value.');
    //             }
    //         },
    //         error: function(xhr) {
    //             alert('An error occurred while updating additional value.');
    //         }
    //     });
    // }

    function saveData(id){
        var show_name = $('#show_name_'+id).val();
        var value = $('#value_'+id).val();
        var additional_value = $('#additional_value_'+id).val();
        var water_level = $('#water_level_'+id).val();

        $.ajax({
            url: '{{ route("update_additional_value") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                show_name: show_name,
                value: value, // ✅ NEW
                additional_value: additional_value,
                water_level: water_level
            },
            success: function(response) {
                if(response.status == 'success'){
                    alert('Updated successfully.');
                    $('#new_value_'+id).text(response.new_value);
                } else {
                    alert('Failed to update.');
                }
            }
        });
    }
  </script>
    @endsection