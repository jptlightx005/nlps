@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="wrapper" id="dashboard-wrapper">
    <div class="row map-row">
        <div class="col-md-12">
            <map-component></map-component>
        </div>
    </div>
</div>
@endsection

@section('modals')
{{-- <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Brgy. Name:</label>
                <span id="loc_name">Lucena</span>
            </div>
            <div class="form-group">
                <label>Top Crimes committed</label>
                <ol id="top_crimes">
                    <li>Murder</li>
                    <li>Pesticide</li>
                </ol>
            </div>
            <div class="form-group">
                <label>Remarks: </label>
                <span id="remarks">Too Safe</span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="link/to/details" id="more_details" class="btn btn-primary">Details</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div> --}}
@endsection
