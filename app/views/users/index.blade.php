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
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Creado En</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>1</td>
                                    <td>huadmin</td>
                                    <td>cu12#</td>
                                    <td>huadmin@hipolitounanue.com</td>
                                    <td><span class="label label-success">Activo</span></td>
                                    <td>18/05/2015</td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>2</td>
                                    <td>testuser</td>
                                    <td>test</td>
                                    <td>test@hipolitounanue.com</td>
                                    <td><span class="label label-success">Activo</span></td>
                                    <td>20/05/2015</td>
                                </tr>
                                <tr class="odd gradeA">
                                    <td>3</td>
                                    <td>invitado</td>
                                    <td>invitado12#</td>
                                    <td>invitado@hipolitounanue.com</td>
                                    <td><span class="label label-success">Activo</span></td>
                                    <td>22/05/2015</td>
                                </tr>
                                <tr class="even gradeA">
                                    <td>4</td>
                                    <td>deshabilitado</td>
                                    <td>deshabilitado#</td>
                                    <td>deshabilitado@hipolitounanue.com</td>
                                    <td><span class="label label-danger">Inactivo</span></td>
                                    <td>24/05/2015</td>
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
@section('usersScriptSection')
    <!-- DataTables JavaScript -->
    {{ HTML::script('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}

    <script>

        $(document).ready(function() {
            //Inicializamos y eteamos el lenguaje de nuestra tabla
            $('#dataTables-example').DataTable({
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
        });
    </script>

@stop