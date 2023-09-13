@extends('layouts.main_hr')
@section('xara_cbs')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>all_business
        <small>manage_business</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('package_id',  __('packages') . ':') !!}
                {!! Form::select('package_id', $packages, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('all')]); !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('subscription_status',  __('subscription_status') . ':') !!}
                {!! Form::select('subscription_status', $subscription_statuses, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('all')]); !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('is_active',  __('sale.status') . ':') !!}
                {!! Form::select('is_active', ['active' => __('business.is_active'), 'inactive' => __('inactive')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('all')]); !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('last_transaction_date',  __('last_transaction_date') . ':') !!}
                {!! Form::select('last_transaction_date', $last_transaction_date, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('messages.please_select')]); !!}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
              <label for="no_transaction_since">no_transaction_since:</label>
              <select name="no_transaction_since" id="no_transaction_since" class="form-control select2" style="width:100%" placeholder="messages.please_select">
                @foreach($last_transaction_date as $value => $option)
                 <option value="{{ $value }}">{{ $option }}</option>
                 @endforeach
             </select>
            </div>
        </div>
	<div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
        	<div class="box-tools">
                <a href="/businesscontrollercreate" 
                    class="btn btn-block btn-primary">
                	<i class="fa fa-plus"></i>messages</a>
            </div>
        </div>
        
        <div class="box-body">
            superadmin
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="superadmin_business_table">
                        <thead>
                            <tr>
                                <th>
                                    registered_on
                                </th>
                                <th>business_name</th>
                                <th>business.owner</th>
                                <th>business.email</th>
                                <th>owner_number</th>
                                <th>business_contact_number</th>
                                <th>business.address</th>
                                <th>sale.status</th>
                                <th>current_subscription</th>
                                <th>business.created_by</th>
                                <th>action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
  </div>

</section>
<!-- /.content -->

@endsection

@section('javascript')

<script type="text/javascript">
    $(document).ready( function(){
        superadmin_business_table = $('#superadmin_business_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{action('\App\Http\Controllers\BusinessController@index')}}",
                data: function(d) {
                    d.package_id = $('#package_id').val();
                    d.subscription_status = $('#subscription_status').val();
                    d.is_active = $('#is_active').val();
                    d.last_transaction_date = $('#last_transaction_date').val();
                    d.no_transaction_since = $('#no_transaction_since').val();
                },
            },
            aaSorting: [[0, 'desc']],
            columns: [
                { data: 'created_at', name: 'business.created_at' },
                { data: 'name', name: 'business.name' },
                { data: 'owner_name', name: 'owner_name', searchable: false},
                { data: 'owner_email', name: 'u.email' },
                { data: 'contact_number', name: 'u.contact_number' },
                { data: 'business_contact_number', name: 'business_contact_number' },
                { data: 'address', name: 'address' },
                { data: 'is_active', name: 'is_active', searchable: false },
                { data: 'current_subscription', name: 'p.name' },
                { data: 'biz_creator', name: 'biz_creator', searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#package_id, #subscription_status, #is_active, #last_transaction_date, #no_transaction_since').change( function(){
            superadmin_business_table.ajax.reload();
        });
    });
    $(document).on('click', 'a.delete_business_confirmation', function(e){
        e.preventDefault();
        swal({
            title:sure,
            text: "Once deleted, you will not be able to recover this business!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((confirmed) => {
            if (confirmed) {
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>

@endsection






