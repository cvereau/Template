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
                <h1 class="page-header">Roles</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Roles
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="RolesData">
                                <thead>
                                <tr>
                                    <th class="center">Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- ko if: loadingRoles() -->
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <img src="{{asset("assets/img/ajax-loader.gif")}}" alt=""/>
                                    </td>
                                </tr>
                                <!-- /ko -->
                                <!-- ko if: !loadingRoles() && matchingRoles().length < 1 -->
                                <tr data-bind="visible: !loadingRoles() && matchingRoles().length < 1">
                                    <td colspan="3">
                                        <strong><i class="glyphicon glyphicon-info-sign"></i> No se encontraron roles</strong>
                                    </td>
                                </tr>
                                <!-- /ko -->
                                <!-- ko foreach: { data: matchingRoles, as: 'rol' } -->
                                <tr class ="rol" >
                                    <td class="center" data-bind="text: rol.role_id"></td>
                                    <td>
                                        <!-- ko text: rol.role_name -->
                                        <!-- /ko -->
                                        <!-- ko if: rol.role_name == 'Administrador'-->
                                        <i class="glyphicon glyphicon-king"></i>
                                        <!--/ko-->
                                    </td>
                                    <td data-bind="text: rol.role_description"></td>
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
        function RolesViewModel(){
            var me = this;

            me.matchingRoles = ko.observableArray([]);
            me.loadingRoles = ko.observable(false);

            me.getRoles = function () {
                me.loadingRoles(true);
                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/getRoles",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        console.log(data);
                        console.log(data.roles);
                        var rawRoles = JSON.parse(data.roles);
                        me.loadingRoles(false);
                        me.matchingRoles.removeAll();
                        for (var i = 0; i < rawRoles.length; i++) {
                            me.matchingRoles.push(rawRoles[i]);
                        }
                    },
                    error: function (data) {
                        me.loadingRoles(false);
                        console.log(data);
                        console.log("error ;(");
                    }
                }).done(function(){ initializeDataTable(); });
                //}
            };

            me.getRoles();

            return {
                matchingRoles: me.matchingRoles,
                loadingRoles: me.loadingRoles,
                getRoles: me.getRoles
            };
        }

        var viewModel = new RolesViewModel();

        function initializeDataTable(){
            $('#RolesData').DataTable({
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
                }
            });
        }
        $(function () {
            //we bind the viewmodel to the view
            ko.applyBindings(viewModel , $("#page-wrapper")[0]);

        });

    </script>

@stop