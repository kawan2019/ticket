@extends('layouts.app')
@section('content')
<div class="container">
    <br> 
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-warning rounded-0">{{$error}}
                <button type="button" class="close text-white" onclick="hid()" data-dismiss="alert">x</button>
            </div>
        @endforeach
    @endif
    @if (session('result'))
        <div class="alert alert-success rounded-0">{{session('result')}}
            <button type="button" class="close text-white" onclick="hid()" data-dismiss="alert">x</button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Tikit') }}</div>
                <div class="card-body">
                    <form action="/home" method="POST" class=" text-center">
                        @csrf
                        <div class="row mt-3 justify-content-center">
                            <div class="col text-center col-lg-5 col-12 mt-3">
                                <label for="sel1">Select Tikit Catagory</label>
                                <input list="Cate" name="Cate" class=" form-control   rounded-0 border-1">
                                <datalist id="Cate">
                                @foreach ($Category as $Category)
                                <option value="{{$Category->Category}}">
                                @endforeach    
                                    </datalist>
                                <label for="sel2">Select Tikit Catagory2</label>
                                <input list="Cate2" name="Cate2" class=" form-control   rounded-0 border-1">
                                    <datalist id="Cate2">
                                        @foreach ($CategoryT as $CategoryT)
                                        <option value="{{$CategoryT->Category}}">
                                        @endforeach  
                                    </datalist>  
                                <label for="des">Tikit Description</label>
                                <textarea name="des" id="des" cols="30" rows="3" class=" form-control   rounded-0 border-1"></textarea>
                                <button style="background-color:#025091;"class=" text-white btn rounded-0 mt-5 border-white w-50">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hid(){
        $(".container .alert").hide();
    }
</script>
@endsection
