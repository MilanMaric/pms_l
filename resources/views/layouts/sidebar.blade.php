<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://www.startupdb.asia/assets/images/team.default.png" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                    <p>PMS</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                    @endif
                            <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Projects</span>
                </a>
                <ul class="treeview-menu">
                    @if(!empty(Session::get('projects')))
                        @foreach(Session::get('projects') as $project)
                            <li><a href={!! route('projects.show',$project->Id)!!}>
                                    {{$project->Title}}
                                </a></li>
                        @endforeach
                    @endif
                    <li><a href="{!! route('projects.create') !!}">Create new project</a></li>
                </ul>
            </li>
            <li>
                @if(Auth::user()->email=='admin@admin.admin')
                    <a href={!! route('people.index') !!}>People</a>
                @endif
            </li>
            <li>
                <a href={!! route('tasks.index') !!}>Tasks</a>
            </li>


        </ul>


        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>