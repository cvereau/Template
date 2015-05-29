@extends('layout.site')
@section('usersStyleSection')
    <!-- DataTables Responsive CSS -->
    {{ HTML::style('assets/bower_components/datatables-responsive/css/dataTables.responsive.css') }}
    <!-- DataTables CSS -->
    {{ HTML::style('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}
@stop
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Usuarios</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Usuarios
                    </div>
                     <div class="col-sm-6">
                            <div class="mb-md">
                                <a href="{{URL::to('usuarios/nuevo')}}" id="addUser" role="button" class="btn btn-primary">Agregar</a>
                            </div>
                     </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="usersData">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Active?</th>
                                    <th>Fecha de Creación</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--<tr data-bind="visible: loadingUsers()">--}}
                                    {{--<td colspan="7" style="text-align: center">--}}
                                    {{--<img src="{{asset("assets/img/ajax-loader.gif")}}" alt=""/>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr data-bind="visible: !loadingUsers() && matchingUsers().length < 1">--}}
                                    {{--<td colspan="7">--}}
                                    {{--No se encontraron usuarios--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                <!-- ko foreach: { data: matchingUsers, as: 'user' } -->
                                <tr class ="user gradeA">
                                    <td data-bind="text: user.id"></td>
                                    <td data-bind="text: user.username"></td>
                                    <td data-bind="text: user.password"></td>
                                    <td data-bind="text: user.email"></td>
                                    <td data-bind="text: user.active"></td>
                                    <td data-bind="text: user.created_at"></td>
                                    <td class="actions">
                                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <!-- /ko -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@stop
@section('usersScriptSection')
    <!-- DataTables JavaScript -->
    <!-- jQuery DataTables http://datatables.net -->
    {{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.js') }}

    <!-- Bootstrap DataTables http://www.datatables.net/manual/styling/bootstrap -->
    {{ HTML::script('http://cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js') }}

    <!-- Responsive DataTables http://www.datatables.net/extensions/responsive/ -->
    {{ HTML::script('http://cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js') }}

    <script>
        function UsersViewModel(){
            var me = this;

            me.matchingUsers = ko.observableArray([]);
            me.loadingUsers = ko.observable(false);

            me.getUsers = function () {
                    me.loadingUsers(true);
                    $.ajax({
                        type: "GET",
                        url:"http://localhost:8080/Template/public/api/v1/getUsers",
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        success: function (data) {
                            me.loadingUsers(false);
                            me.matchingUsers.removeAll();
                            for (var i = 0; i < data.users.length; i++) {
                                me.matchingUsers.push(data.users[i]);
                            }
                        },
                        error: function (data) {
                            me.loadingUsers(false);
                            console.log(data);
                            console.log(data.d);
                            console.log("error ;(");
                        }
                    }).done(function(){ initializeDataTable(); });
                //}
            }

            me.getUsers();

            return {
                matchingUsers: me.matchingUsers,
                loadingUsers: me.loadingUsers,
                getUsers: me.getUsers
            };
        }

        var viewModel = new UsersViewModel();

        function initializeDataTable(){
            $('#usersData').DataTable({
                responsive: true,
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando del _START_ al _END_ de  _TOTAL_ registro(s)",
                    "sInfoEmpty":      "Mostrando 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
        $(function () {
            //we bind the viewmodel to the view
            ko.applyBindings(viewModel , $("#page-wrapper")[0]);

        });

    </script>

@stop