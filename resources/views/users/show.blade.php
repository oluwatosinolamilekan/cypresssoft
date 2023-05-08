@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
   <div class="content">
      <!-- Table Product -->
      <div class="row">
         <div class="col-12">
            <div class="card card-default">
               <div class="card-header">
                  <h2>User Activities</h2>
                <form method="POST" action="{{route('activity.mass.delete', ['reference' => $reference])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-sm btn-secondary">Delete Activities</button>
                </form>
               </div>
               <div class="card-body">
                <table id="" class="table table-striped table-product" style="width:100%">
                    <thead>
                       <tr>
                        <th>S/N</th>
                          <th>Name</th>
                          <th>Reference</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                       @forelse ($activities as $key => $activity)
                       <tr>
                        <td>
                            {{$activities->perPage()*($activities->currentPage()-1)+$loop->iteration}}
                        </td>
                          <td>{{$activity->title}}</td>
                          <td>{{$activity->reference}}</td>
                          <td>{{Str::limit($activity->description, 20)}}</td>
                          <td>{{$activity->date}}</td>
                          <td>
                            <a type="button" href="{{route('activity.edit', ['reference' => $activity->reference, 'user_id' => $user->id])}}" class="btn btn-sm btn-primary">Edit</a>
                          </td>
                       </tr>
                       @empty
                           <p>No activity</p>
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
