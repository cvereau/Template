@extends('layout.site')
@section('StyleSection')
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
                                    <th>Usuario</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Sede</th>
                                    <th>Estado</th>
                                    <th>Fecha de Creación</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- ko if: loadingUsers() -->
                                <tr>
                                    <td colspan="9" style="text-align: center">
                                    <img src="{{asset("assets/img/ajax-loader.gif")}}" alt=""/>
                                    </td>
                                </tr>
                                <!-- /ko -->
                                <!-- ko if: !loadingUsers() && matchingUsers().length < 1 -->
                                <tr data-bind="visible: !loadingUsers() && matchingUsers().length < 1">
                                    <td colspan="9">
                                        <strong><i class="glyphicon glyphicon-info-sign"></i> No se encontraron usuarios</strong>
                                    </td>
                                </tr>
                                <!-- /ko -->
                                <!-- ko foreach: { data: matchingUsers, as: 'user' } -->
                                <tr class ="user" data-bind="click: $parent.editUser, attr: {'data-id': $index}"  style="cursor:pointer">
                                    <td class="center" data-bind="text: user.usr_id"></td>
                                    <td data-bind="text: user.usr_username"></td>
                                    <td data-bind="text: user.usr_password"></td>
                                    <td data-bind="text: user.usr_email"></td>
                                    <td>
                                        <!-- ko text: user.rol_nombre -->
                                        <!-- /ko -->
                                        <!-- ko if: user.rol_nombre == 'Administrador'-->
                                        <i class="glyphicon glyphicon-king"></i>
                                        <!--/ko-->
                                    </td>
                                    <td data-bind="text: user.sede_nombre"></td>
                                    <td class="center">
                                        <!-- ko if: user.usr_active -->
                                        <span class='label label-success'>Active</span>
                                        <!-- /ko -->
                                        <!-- ko ifnot: user.usr_active -->
                                        <span class='label label-danger'>Inactive</span>
                                        <!-- /ko -->
                                    </td>
                                    <td class="center" data-bind="text: user.created_at"></td>
                                    <td class="actions center">
                                        <a href="javascript:void(0)" data-bind="click: $parent.delete" class="on-default remove-row"><i class="fa fa-trash-o fa-2x"></i></a>
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
@section('ScriptSection')
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
                            console.log(data);
                            console.log(data.users);
                            var rawUsers = JSON.parse(data.users);
                            me.loadingUsers(false);
                            me.matchingUsers.removeAll();

                            for (var i = 0; i < rawUsers.length; i++) {
                                me.matchingUsers.push(rawUsers[i]);
                            }
                        },
                        error: function (data) {
                            me.loadingUsers(false);
                            console.log(data);
                            console.log("error ;(");
                        }
                    }).done(function(){ if(me.matchingUsers().length > 0){initializeDataTable();} });
                //}
            };

            me.editUser = function(user) {
                var username = user.usr_username;
                window.location="http://localhost:8080/Template/public/usuarios/" + username;
            };

            me.delete = function (user, event) {
                event.preventDefault();
                event.stopPropagation();
                $trClick = $(event.target).parents('tr.user');

                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/deleteUser",
                    data: { userId: user.usr_id},
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        //send the toast
                        console.log(data.result);
                        var table = $('#usersData').DataTable();
                        table.row($trClick).remove().draw( false );
                        toastr.success('Sus cambios fueron guardados con éxito','Usuario Eliminado');
                        //var table = $('#userData').DataTable();


                        //me.getUsers();
                    },
                    error: function () {
                        console.log("error ;(");
                    }
                });
            };

            me.getUsers();

            return {
                matchingUsers: me.matchingUsers,
                loadingUsers: me.loadingUsers,
                getUsers: me.getUsers,
                editUser: me.editUser,
                delete: me.delete
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
                    "sInfoEmpty":      "",
                    "sInfoFiltered":   "",
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
                },
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 8 ] }
                ]
            });
        }
        $(function () {
            //we bind the viewmodel to the view
            ko.applyBindings(viewModel , $("#page-wrapper")[0]);

        });

    </script>

@stop