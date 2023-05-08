@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
   <div class="content">
      <!-- Table Product -->
      <div class="row">
         <div class="col-12">
            <div class="card card-default">
               <div class="card-header">
                  <h2>Activities</h2>
               </div>
               <div class="card-body">
                  <table id="" class="table table-striped table-product" style="width:100%">
                     <thead>
                        <tr>
                            <th>S/N</th>
                           <th>Image</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                        @forelse($activities as $key => $activity)
                            <td>
                            {{$activities->perPage()*($activities->currentPage()-1)+$loop->iteration}}
                            </td>
                           <td class="py-0">
                              @if($activity->image)
                              <img src="{{asset('images/'.$activity->image)}}" width="100px">
                              @else
                              No Image
                              @endif
                           </td>
                           <td>{{$activity->title}}</td>
                           <td>
                            {{ Str::limit($activity->description, 20) }}
                           </td>
                           <td>
                            <a type="button" href="{{route('activity.edit',$activity->reference)}}" class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" action="{{route('activity.delete', ['reference' => $activity->reference, 'user_id' => $activity->user_id])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
                            </form>
                           </td>
                        </tr>
                        @empty
                           <p>No Activity</p>
                           @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
            {{ $activities->links('layouts.pagination', ['activities' => 'paginator']) }}
         </div>
      </div>
   </div>
</div>
@endsection
