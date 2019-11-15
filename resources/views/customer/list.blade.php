@extends('home')
@section('content')


    <div class="row">
        <div class="col-lg-3 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                CREATE
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ADD NEW CUSTOMERS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="exampleInputEmail1">NAME</label>
                                <input type="text" class="form-control" id="name-add" placeholder="Enter Name">
                            </div>
                            <div>
                                <label for="exampleInputEmail1">AGE</label>
                                <input type="number" class="form-control" id="age-add" placeholder="Enter Age">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary add">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0">
                        <input style="width: 400px" class="form-control mr-sm-2" type="search" placeholder="Search"
                               aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-center" scope="col">NAME</th>
                <th class="text-center" scope="col">AGE</th>
                <th class="text-center" scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody id="list-customer">
            @foreach($customers as $key =>$customer)
                <tr>
                    <th class="text-center indexOld" data-index={{(empty($key))?1:($key+1)}}>{{(empty($key))?1:($key+1)}}</th>
                    <th class="text-center" scope="col">{{$customer->name}}</th>
                    <th class="text-center" scope="col">{{$customer->age}}</th>
                    <th class="text-center" scope="col" style="width: 220px">
                        <a class="btn btn-danger" href="">DELETE</a>
                        <a class="btn btn-success" href="">EDIT</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection
