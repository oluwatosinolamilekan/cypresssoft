@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content">
       <!-- Table Product -->
       <div class="row">
          <div class="col-12">
             <div class="card card-default">
                <div class="card-header">

                   <h2>Update Activity </h2>
                </div>
                <div class="card-body">
                    @include('error')
                    <form method="POST" action="{{route('activity.update', $activity->reference)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if($user_id)
                            <input type="hidden" name="user_id" value={{$user_id}}>
                        @endif
                        <div class="form-group col-6">
                          <label for="exampleFormControlInput3">Title</label>
                          <input type="text" class="form-control rounded-pill" name="title" value={{$activity->title}} placeholder="Enter Title">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput3">Date</label>
                            <input type="date" class="form-control rounded-pill" name="date" value="{{$activity->date}}">
                          </div>
                        @if($user_id == null)

                        <div class="form-group col-6">
                            <select class="form-control" id="exampleFormControlSelect12" name="user_id"  value="{{$activity->user_id}}">
                                <option value="">Select User</option>
                              @foreach($users as $user)
                              <option value="{{$user->id}}"
                                {{ $user->id == $activity->user_id ? 'selected' : '' }}
                                >
                              {{$user->name}}
                            </option>
                              @endforeach
                            </select>
                          </div>
                          @endif

                          <div class="form-group col-6">
                            <label for="">Image</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                             @if($activity->image)
                             Current Image:   <img src="{{asset('images/'.$activity->image)}}" width="70px">
                             @else
                             <span>
                                Current Image: No Image
                             </span>
                             @endif
                          </div>

                        <div class="form-group col-6">
                          <label for="exampleFormControlPassword31">Description</label>
                            <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="5">{{$activity->description}}</textarea>
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
