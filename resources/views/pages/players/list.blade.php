
@extends('layouts.main2')

@section('content')

<div class="row">
    <div class="col-12">
        {{-- DataTable of all players  firstname, lastname, alias, msisdn, email, status --}}
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Registered Players</h4>
              <p class="card-description">
                All registered players active or inactive
              </p>
              <div class="table-responsive">
                <table id="datatable2" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="va-m">First Name</th>
                            <th class="va-m">Last Name</th>
                            <th class="va-m">Alias</th>
                            <th>MSISDN</th>
                            <th class="va-m">Email</th>
                            <th class="va-m">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $player)
                            <tr>
                                <td>{{$player->firstname}}</td>
                                <td>{{$player->lastname}}</td>
                                <td>{{$player->alias}}</td>
                                <td>{{$player->msisdn}}</td>
                                <td>{{$player->email}}</td>
                                <td>{{$player->status}}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">View</a>
                                    <button href="#resetPassword"
                                    onclick="resetUserPin({{$player->id}}, '{{$player->firstname}}', '{{$player->lastname}}', '{{$player->msisdn}}')" class="btn btn-danger btn-sm">Reset PIN</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#players-table').DataTable({
            pageLength:5
        });
    });

    let resetUserPin = async (user_id, firstname, lastname, msisdn)=>{
        const message = `Do you confirm reseting PIN for ${firstname}, ${lastname} (${msisdn})?`;
        const prompt = confirm(message)
        if(prompt){
            try{
                const options = {
                    method:"PUT",
                    headers:{
                        'Content-Type':'application/json'
                    },
                    body:JSON.stringify({'user_id':user_id})
                }
                let response = await fetch(BASE_URL+"/api/v1/user/reset_pin", options)
                response = await response.json()
                if(response.status == 'success'){
                    alert(`Success Alert: ${response.message}`)
                    return
                }
                alert(`Error Alert: ${response.message}`)
            }catch(err){
                console.log(err)
                alert(err.message)
            }
        }
    }
</script>
@endsection
