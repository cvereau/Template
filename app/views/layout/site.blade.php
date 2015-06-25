<!DOCTYPE html>
<html lang="en">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Colegio Hipólito Unanue</title>

    <!--Favicon--->
    <link rel="shortcut icon" href="{{{ asset('assets/img/favicon.png') }}}">

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}

    <!-- MetisMenu CSS -->
    {{ HTML::style('assets/bower_components/metisMenu/dist/metisMenu.min.css') }}

    @yield('StyleSection')

    <!-- Timeline CSS -->
    {{ HTML::style('assets/dist/css/timeline.css') }}

    <!-- Custom CSS -->
    {{ HTML::style('assets/dist/css/sb-admin-2.css') }}

    <!-- Morris Charts CSS -->
    {{ HTML::style('assets/bower_components/morrisjs/morris.css') }}

    <!-- Custom Fonts -->
    {{ HTML::style('assets/bower_components/font-awesome/css/font-awesome.min.css') }}

    <!--Toastr -->
    {{HTML::style('http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css')}}

    <!-- Custom Checkbox -->
    {{HTML::style('assets/dist/css/checkbox.css')}}

    <!--DatePicker-->
    {{HTML::style('assets/dist/css/bootstrap-datetimepicker.min.css')}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
    {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{ asset('assets/img/logo/cu-logo.png') }}" height="35px" style="max-width:100px; margin-top: -7px;"/></a>
            <span class="navbar-brand" style="margin-left:-15px">Hipólito Unanue</span>
        </div>
        <!-- /.navbar-header -->


        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    @if(Session::has('username'))
                        <span class="nav navbar-top-links navbar-left" >{{ Session::get('username') }} </span>&nbsp;
                    @endif
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{URL::to('cerrarSesion')}}"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    {{--<li>--}}
                        {{--<a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="flot.html">Flot Charts</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="morris.html">Morris.js Charts</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="panels-wells.html">Panels and Wells</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="buttons.html">Buttons</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="notifications.html">Notifications</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="typography.html">Typography</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="icons.html"> Icons</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="grid.html">Grid</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="#">Second Level Item</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Second Level Item</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Third Level <span class="fa arrow"></span></a>--}}
                                {{--<ul class="nav nav-third-level">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<!-- /.nav-third-level -->--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    <li>
                        <a id="administradorLink" href="#"><i class="fa fa-cog fa-fw"></i> Administrador<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{URL::to('periodoMatricula')}}">Periodo Matrícula</a>
                            </li>
                            <li>
                                <a href="{{URL::to('periodoIngresoNotas')}}">Periodo Ingreso Notas</a>
                            </li>
                            <li>
                                <a id="mantenimientoLink" href="#">Mantenimiento <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a id="asignaturasLink" href="{{URL::to('asignaturas')}}">Asignaturas</a>
                                    </li>
                                    <li>
                                        <a idd="profesoresLink" href="{{URL::to('profesores')}}">Profesores</a>
                                    </li>
                                    <li>
                                        <a id="sedesLink" href="{{URL::to('sedes')}}">Sedes</a>
                                    </li>
                                </ul>
                            </li>
                                <!-- /.nav-third-level -->
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a id="seguridadLink" href="#"><i class="fa fa-lock fa-fw"></i> Seguridad<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="usuariosLink" href="{{URL::to('usuarios')}}">Usuarios</a>
                            </li>
                            <li>
                                <a id="rolesLink" href="{{URL::to('roles')}}">Roles</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    @yield('main')
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!--knockout-->
{{ HTML::script('http://knockoutjs.com/downloads/knockout-3.3.0.js') }}

<!-- KnockoutJS Mapping http://knockoutjs.com/documentation/plugins-mapping.html -->
{{ HTML::script('http://cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.min.js') }}

<!-- jQuery -->
{{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }} <!--https://code.jquery.com/jquery-2.1.4.min.js-->

<!-- Bootstrap Core JavaScript -->
{{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}

<!-- Metis Menu Plugin JavaScript -->
{{ HTML::script('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}

<!-- Morris Charts JavaScript -->
{{ HTML::script('assets/bower_components/raphael/raphael-min.js') }}
{{ HTML::script('assets/bower_components/morrisjs/morris.min.js') }}

<!-- Custom Theme JavaScript -->
{{ HTML::script('assets/dist/js/sb-admin-2.js') }}

<!--Toastr-->
{{ HTML::script('http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}




@yield('ScriptSection')

<script>
    // set the current class on the appropriate li
    var currentUrl = window.location.href;
    if (currentUrl.indexOf("usuarios") >= 0) {
        $("#seguridadLink").closest("li").attr("aria-expanded","true");
        $("#usuariosLink").closest("li").addClass("active");
    }
    else if (currentUrl.indexOf("roles") >= 0) {
        $("#seguridadLink").closest("li").attr("aria-expanded","true");
        $("#rolesLink").closest("li").addClass("active");
    }
    else if (currentUrl.indexOf("sedes") >= 0) {
        $("#administradorLink").closest("li").addClass("active");
        $("#mantenimientoLink").closest("li").attr("aria-expanded","true");
        $("#sedesLink").closest("li").addClass("active");
    }
    else if (currentUrl.indexOf("asignaturas") >= 0){
        $("#administradorLink").closest("li").addClass("active");
        $("#mantenimientoLink").closest("li").attr("aria-expanded","true");
        $("#asignaturasLink").closest("li").addClass("active");
    }
    else if (currentUrl.indexOf("profesores") >= 0){
        $("#administradorLink").closest("li").addClass("active");
        $("#mantenimientoLink").closest("li").attr("aria-expanded","true");
        $("#profesoresLink").closest("li").addClass("active");
    }
</script>

</body>

</html>
