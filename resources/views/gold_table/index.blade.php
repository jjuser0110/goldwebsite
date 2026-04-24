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
                <div class="dt-buttons d-flex gap-2 justify-content-end">

                    <a class="dt-button create-new btn btn-primary" href="{{route('gold.create')}}">
                        <i class="bx bx-plus me-sm-1"></i> 
                        <span class="d-none d-sm-inline-block">Add New Gold</span>
                    </a> 

                    <button class="dt-button btn btn-warning" onclick="openBulkModal()">
                        <i class="bx bx-edit me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Bulk Update Price</span>
                    </button>

                </div>
            </div>

            <div class="card-datatable text-nowrap">
            
                <table class="dt-column-search table table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
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
                            <td>
                                <input type="checkbox"
                                    class="row-check"
                                    value="{{ $row->id }}"
                                    @if($row->type !== '银饰') checked @endif>
                            </td>
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
    <!-- / Bulk Update Content -->
    <div class="modal fade" id="bulkModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Bulk Price Adjustment</h5>
                </div>

                <div class="modal-body">

                    <!-- Last used value -->
                    <div class="mb-2">
                        <small class="text-muted">Last used:</small>
                        <button type="button" class="btn btn-sm btn-outline-secondary"
                            onclick="useLastValue()">
                            <span id="lastValueText">+0</span>
                        </button>
                    </div>

                    <!-- Quick buttons -->
                    <div class="mb-3">
                        <button class="btn btn-sm btn-success" onclick="setValue('+1')">+1</button>
                        <button class="btn btn-sm btn-success" onclick="setValue('+0.5')">+0.5</button>
                        <button class="btn btn-sm btn-danger" onclick="setValue('-0.5')">-0.5</button>
                        <button class="btn btn-sm btn-danger" onclick="setValue('-1')">-1</button>
                    </div>

                    <!-- Manual input -->
                    <label>Custom Value (+ / -)</label>
                    <input type="text" id="bulk_value" class="form-control"
                        placeholder="+1 or -0.5">

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="applyBulk()">Save</button>
                </div>

            </div>
        </div>
    </div>
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

    let lastBulkValue = "+0";

    function openBulkModal(){
        let selected = $('.row-check:checked').length;

        if(selected === 0){
            alert('Please select at least one item');
            return;
        }

        $('#lastValueText').text(lastBulkValue);

        $('#bulkModal').modal('show');
    }

    // quick buttons
    function setValue(val){
        $('#bulk_value').val(val);
    }

    // reuse last value
    function useLastValue(){
        $('#bulk_value').val(lastBulkValue);
    }

    // save
    function applyBulk(){

        let ids = [];
        $('.row-check:checked').each(function(){
            ids.push($(this).val());
        });

        let adjust = $('#bulk_value').val();

        if(!adjust){
            alert('Enter a value');
            return;
        }

        adjust = normalizeValue(adjust); 

        lastBulkValue = adjust;
        $('#lastValueText').text(lastBulkValue);

        $.ajax({
            url: '{{ route("bulk_update_gold") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                ids: ids,
                adjust: adjust
            },
            success: function(res){
                    if(res.status === 'success'){

                        res.data.forEach(function(row){

                            // update Add Value input
                            $('#additional_value_' + row.id).val(row.additional_value);

                            // update New Value display (respect decimals)
                            let decimals = $('#value_' + row.id).val().includes('.') &&
                                        $('#value_' + row.id).val().split('.')[1].length === 4 ? 4 : 2;

                            $('#new_value_' + row.id).text(parseFloat(row.new_value).toFixed(decimals));
                        });

                        alert('Updated successfully');
                        $('#bulkModal').modal('hide');

                        // optional: clear input
                        $('#bulk_value').val('');
                    }
                }
        });
    }
    function normalizeValue(val){
        val = val.trim();

        if (!val.startsWith('+') && !val.startsWith('-')) {
            val = '+' + val;
        }

        return val;
    }
  </script>
    @endsection