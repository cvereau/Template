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
                            <a href="{{URL::to('profesores/nuevo')}}" id="addUser" role="button" class="btn btn-primary">Agregar</a>
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
                                <tr>
                                    <td class="center">45766270</td>
                                    <td>Juan</th>
                                    <td>Velit</th>
                                    <td>Sanchez</th>
                                    <td>jvelit</td>
                                    <td>985445250</td>
                                    <td class="center"><span class='label label-success'>Sí</span></td>
                                    <td class="center">2014-08-15 00:00:00</td>
                                    <td class="center">
                                        <a href="javascript:void(0)" data-bind="click: $parent.delete" class="on-default remove-row"><i class="fa fa-trash-o fa-2x"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="center">40885202</td>
                                    <td>Leonardo</th>
                                    <td>Delgado</th>
                                    <td>Monteverde</th>
                                    <td>ldelgado</td>
                                    <td>962359363</td>
                                    <td class="center"><span class='label label-danger'>No</span></td>
                                    <td class="center">2014-09-12 00:00:00</td>
                                    <td class="center">
                                        <a href="javascript:void(0)" data-bind="click: $parent.delete" class="on-default remove-row"><i class="fa fa-trash-o fa-2x"></i></a>
                                    </td>
                                </tr>
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
        $(function () {
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
        });
    </script>

@stop