
@extends('layouts.main2')

@section('content')

<div class="row">
    {{-- <div class="col-12 text-right px5 px-4 mb5">
        <a href="/admins/create" class="d-inline float-right text-right text-white btn btn-primary btn-sm">Create New <i class="fa fa-plus-circle"></i></a>

    </div> --}}
    <div class="col-md-12 my-2">

        <div class="panel panel-visible" id="spy6">
            <div class="panel-heading text-right">
                <div class="panel-title text-right hidden-xs">
                   <a href="/admins/create" class="d-inline float-right text-right btn text-white btn-primary btn-sm">Create New <i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
            <div class="panel-body pn mt20">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-12"><hr></div>
                    </div>
                    <table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="va-m">Name</th>
                                <th class="va-m">Email Address</th>
                                <th class="va-m">Phone</th>
                                <th class="hidden-xs va-m">Verified</th>
                                <th class="hidden-xs va-m">Status</th>
                                <th class="va-m">Created At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($admins) > 0)
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->firstname}} {{$admin->lastname}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->msisdn}}</td>
                                    <td class="hidden-xs">
                                        @if($admin->verified == 1)
                                            <span class="fa fa-check text-success"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td class="hidden-xs">
                                        @if($admin->status == 1)
                                            <span class="fa fa-check text-success"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>{{$admin->created_at}}</td>
                                    <td class="fs15 fw700 text-right">
                                        <a href="/admins/edit/{{$admin->id}}" class="btn btn-info btn-md">Edit</a>
                                        <a  href="/admins/delete/{{$admin->id}}" class="delete_action btn btn-danger btn-md">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

@endsection
