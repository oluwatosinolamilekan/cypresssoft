<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
       <!-- Aplication Brand -->
       <div class="app-brand">
          <a href="#">
          <img src="{{asset('assets/img/logo.png')}}" alt="Mono">
          <span class="brand-name">Cypress</span>
          </a>
       </div>
       <!-- begin sidebar scrollbar -->
       <div class="sidebar-left" data-simplebar style="height: 100%;">
          <!-- sidebar menu -->
          <ul class="nav sidebar-inner" id="sidebar-menu">

             <li class="section-title">
                Menu
             </li>
             <li
             >
              <a class="sidenav-item-link" href="{{route('user.index')}}">
                <i class="mdi mdi-briefcase-account-outline"></i>
                <span class="nav-text">Users</span>
              </a>
            </li>
             <li  class="has-sub" >
                <a class="sidenav-item-link" href="{{route('activity.index')}}" data-toggle="collapse" data-target="#ui-elements"
                   aria-expanded="false" aria-controls="ui-elements">
                <i class="mdi mdi-folder-outline"></i>
                <span class="nav-text">Activity</span> <b class="caret"></b>
                </a>
                <ul  class="collapse"  id="ui-elements"
                   data-parent="#sidebar-menu">
                   <div class="sub-menu">
                      <li >
                         <a class="sidenav-item-link" href="{{route('activity.index')}}">
                         <span class="nav-text">All Activity</span>
                         </a>
                      </li>
                      <li >
                         <a class="sidenav-item-link" href="{{route('activity.create')}}">
                         <span class="nav-text">Create Activity</span>
                         </a>
                      </li>
                   </div>
                </ul>
             </li>
             <li
             >
              <a class="sidenav-item-link" href="{{route('logout')}}">
                <i class="mdi mdi-logout"></i>
                <span class="nav-text">Logout</span>
              </a>
            </li>
          </ul>
       </div>

    </div>
 </aside>
