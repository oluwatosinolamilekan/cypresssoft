@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
   <div class="content">
      <!-- Table Product -->
      <div class="row">
         <div class="col-12">
            <div class="card card-default">
               <div class="card-header">
                  <h2>Users</h2>
               </div>
               <div class="card-body">
                  <table id="" class="table table-striped table-product" style="width:100%">
                     <thead>
                        <tr>
                           <th>S/N</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($users as $key => $user)
                        <tr>
                           <td class="py-0">
                                {{$users->perPage()*($users->currentPage()-1)+$loop->iteration}}
                           </td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>
                            @if(count($user->activities) > 0)
                                <a type="button" href="{{route('user.show',$user->id)}}" class="btn btn-sm btn-primary">
                                    View Activities
                                </a>
                            @else
                                User has No Activities Yet
                            @endif
                           </td>
                        </tr>
                        @empty
                            <p>No users</p>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
            {{ $users->links('layouts.pagination', ['users' => 'paginator']) }}
         </div>
      </div>
   </div>
</div>
@endsection
