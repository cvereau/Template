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
                <h1 class="page-header">Profesores</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Profesores
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-md">
                            <a href="{{URL::to('profesores/nuevo')}}" id="addProfesor" role="button" class="btn btn-primary">Agregar</a>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="profesoresData">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Usuario</th>
                                        <th>Teléfono</th>
                                        <th>¿Es Tutor?</th>
                                        <th>Fecha de Creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ko if: loadingProfesores() -->
                                    <tr>
                                        <td colspan="8" style="text-align: center">
                                            <img src="{{asset("assets/img/ajax-loader.gif")}}" alt=""/>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <!-- ko if: !loadingProfesores() && matchingProfesores().length < 1 -->
                                    <tr data-bind="visible: !loadingProfesores() && matchingProfesores().length < 1">
                                        <td colspan="8">
                                            <strong><i class="glyphicon glyphicon-info-sign"></i> No se encontraron usuarios</strong>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <!-- ko foreach: { data: matchingProfesores, as: 'profesor' } -->
                                    <tr class ="profesor" data-bind="click: $parent.editProfesor, attr: {'data-id': $index}"  style="cursor:pointer">
                                        <td class="center" data-bind="text: profesor.prof_dni"></td>
                                        <td data-bind="text: profesor.prof_nombre"></td>
                                        <td data-bind="text: profesor.prof_apellido_paterno"></td>
                                        <td data-bind="text: profesor.prof_apellido_materno"></td>
                                        <td data-bind="text: profesor.usr_username"></td>
                                        <td data-bind="text: profesor.prof_telefono"></td>
                                        <td class="center">
                                            <!-- ko if: profesor.prof_esTutor -->
                                            <span class='label label-success'> SI </span>
                                            <!-- /ko -->
                                            <!-- ko ifnot: profesor.prof_esTutor -->
                                            <span class='label label-danger'>NO</span>
                                            <!-- /ko -->
                                        </td>
                                        <td class="center" data-bind="text: profesor.created_at"></td>
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
        var baseURL = "http://localhost:8080/Template/public";

        function ProfesoresViewModel(){
            var me = this;

            me.matchingProfesores = ko.observableArray([]);
            me.loadingProfesores = ko.observable(false);

            me.getProfesores = function () {
                me.loadingProfesores(true);
                $.ajax({
                    type: "GET",
                    url: baseURL + "/api/v1/getProfesores",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        console.log(data);
                        console.log(data.profesores);
                        var rawProfesores = JSON.parse(data.profesores);
                        me.loadingProfesores(false);
                        me.matchingProfesores.removeAll();
                        for (var i = 0; i < rawProfesores.length; i++) {
                            me.matchingProfesores.push(rawProfesores[i]);
                        }
                    },
                    error: function (data) {
                        me.loadingProfesores(false);
                        console.log(data);
                        console.log("error ;(");
                    }
                }).done(function(){ if(me.matchingProfesores().length > 0){initializeDataTable();} });
                //}
            };

            me.editProfesor = function(profesor) {
                var id = profesor.prof_id;
                window.location= baseURL + "/profesores/" + id;
            };

            me.delete = function (profesor, event) {
                event.preventDefault();
                event.stopPropagation();
                $trClick = $(event.target).parents('tr.profesor');

                $.ajax({
                    type: "GET",
                    url: baseURL + "/api/v1/deleteProfesor",
                    data: { profesorId: profesor.prof_id},
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        //send the toast
                        console.log(data.result);
                        var table = $('#profesoresData').DataTable();
                        table.row($trClick).remove().draw( false );
                        toastr.success('Sus cambios fueron guardados con éxito','Profesor Eliminado');
                        //var table = $('#ProfesorData').DataTable();


                        //me.getProfesores();
                    },
                    error: function () {
                        console.log("error ;(");
                    }
                });
            };

            me.getProfesores();

            return {
                matchingProfesores: me.matchingProfesores,
                loadingProfesores: me.loadingProfesores,
                getProfesores: me.getProfesores,
                editProfesor: me.editProfesor,
                delete: me.delete
            };
        }

        var viewModel = new ProfesoresViewModel();

        function initializeDataTable(){
            $('#profesoresData').DataTable({
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