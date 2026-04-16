@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <a class="text-muted fw-light" href="{{route('gold.index')}}">Gold /</a> 
        @if (isset($gold)) Edit @else Create @endif
    </h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Gold Details</h5>

                <div class="card-body">
                    <form class="row g-3"
                        method="POST"
                        action="{{ isset($gold) ? route('gold.update',$gold->id) : route('gold.store') }}">
                        
                        @csrf

                        <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <input type="text" class="form-control"
                                name="type"
                                placeholder="gold916 / type1"
                                value="{{$gold->type ?? ''}}"
                                {{ isset($gold) ? 'readonly' : '' }}
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Display Name</label>
                            <input type="text" class="form-control"
                                name="show_name"
                                value="{{$gold->show_name ?? ''}}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Base Value</label>
                            <input type="number" step="0.01" class="form-control"
                                name="value"
                                value="{{$gold->value ?? ''}}"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Water Level</label>
                            <input type="number" step="0.01" class="form-control"
                                name="water_level"
                                value="{{$gold->water_level ?? 0}}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Additional Value</label>
                            <input type="number" step="0.01" class="form-control"
                                name="additional_value"
                                value="{{$gold->additional_value ?? 0}}">
                        </div>

                        <hr>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection