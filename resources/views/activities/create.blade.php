@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content">
       <!-- Table Product -->
       <div class="row">
          <div class="col-12">
             <div class="card card-default">
                <div class="card-header">
                   <h2>Create Activity</h2>
                </div>
                <div class="card-body">
                    @include('error')
                    <form method="POST" action="{{route('activity.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-6">
                          <label for="exampleFormControlInput3">Title</label>
                          <input type="text" class="form-control rounded-pill" name="title" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput3">Date</label>
                            <input type="date" class="form-control rounded-pill" name="date" required>
                          </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlSelect12">Select User</label>
                            <select class="form-control" id="exampleFormControlSelect12" name="user_id" required>
                                <option value="">Select User</option>
                              @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group col-6">
                            <label for="">Image</label>
                            <input type="file" class="form-control-file"  name="image" id="exampleFormControlFile1" required>
                          </div>
                        <div class="form-group col-6">
                          <label for="exampleFormControlPassword31">Description</label>
                            <textarea class="form-control"  name="description"  id="exampleFormControlTextarea1" rows="5" required></textarea>
                        </div>
                        <div class="form-footer mt-4">
                          <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                        </div>
                      </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
