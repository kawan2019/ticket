@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Tickets') }}</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        @foreach ($stocks as $stock)
                            <div class="card text-left  m-2" style="max-width: 20rem;">
                                <div class="card-body ml--3 mt--2 ">
                                    <small class="card-title"><b>Name:</b> {{$stock->creator}}</small><br>
                                    <small class="card-title"><b>Category:</b>  {{$stock->type}}</small><br>
                                    <small class="card-title"><b>Type: </b> {{$stock->typet}}</small><br>
                                    <small class="card-title"><b>Description: </b> {{$stock->description}}</small><br>
                                    <small class="card-title"><b>Created at: </b> {{$stock->create_date}}</small><br>
                                    <small class="card-title"><b>Ticket Status:</b> 
                                        @if ($stock->tikit_state == "Pending")
                                        <span class="btn-sm  btn-warning ">{{$stock->tikit_state}}</span>
                                        @elseif($stock->tikit_state == "Accepted")
                                        <span class="btn-sm  btn-success">{{$stock->tikit_state}}</span>
                                        @else
                                        <span class="btn-sm  btn-danger">{{$stock->tikit_state}}</span>
                                        @endif
                                    
                                    </small><br>
                                    <small class="card-title"><b>Ticket Approval:</b> {{$stock->supervisor_approval}}</small><br> 
                                </div>
                                <div class="col text-center mt--3">
                                    <span class="btn btn-sm rounded-0 text-primary text-center shadow-none" data-toggle="modal" data-target="#edit{{$stock->id}}"><i class="ion-edit text-center" style="font-size: 170%;"></i></span>
                                    <span class="btn btn-sm rounded-0 text-danger text-center shadow-none" data-toggle="modal" data-target="#delete{{$stock->id}}"><i class="ion-ios-trash text-center" style="font-size: 200%;"></i></span>  
                                </div>
                            </div>      
            <!--Modal Delete -->
                            <div class="modal fade text-center" id="delete{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-1">
                                        <div class="modal-body">
                                            <span> Do You Want Delete {{$stock->name}} ?</span>
                                            <form >
                                                @csrf
                                                <button class="btn btn-azure-secondary w-75 rounded-1 text-danger mt-4">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade text-center" id="edit{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-1">
                                        <div class="modal-body">
                                            <span> You not have Permision this action. </span>
                                            <form>
                                                @csrf
                                                <button class="btn btn-azure-secondary w-75 rounded-1 text-danger mt-4">Okay</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection
