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
                <h1 class="page-header">Sedes</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Sedes
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-md">
                            <a href="{{URL::to('sedes/nuevo')}}" id="addsede" role="button" class="btn btn-primary">Agregar</a>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="SedesData">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Responsable</th>
                                    <th>Dirección</th>
                                    <th>Fecha de Creación</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- ko if: loadingSedes() -->
                                <tr>
                                    <td colspan="6" style="text-align: center">
                                        <img src="{{asset("assets/img/ajax-loader.gif")}}" alt=""/>
                                    </td>
                                </tr>
                                <!-- /ko -->
                                <!-- ko if: !loadingSedes() && matchingSedes().length < 1 -->
                                <tr data-bind="visible: !loadingSedes() && matchingSedes().length < 1">
                                    <td colspan="6">
                                        <strong><i class="glyphicon glyphicon-info-sign"></i> No se encontraron sedes</strong>
                                    </td>
                                </tr>
                                <!-- /ko -->
                                <!-- ko foreach: { data: matchingSedes, as: 'sede' } -->
                                <tr class ="sede" data-bind="click: $parent.editSede, attr: {'data-id': $index}"  style="cursor:pointer">
                                    <td class="center" data-bind="text: sede.sede_id"></td>
                                    <td data-bind="text: sede.sede_nombre"></td>
                                    <td data-bind="text: sede.sede_responsable"></td>
                                    <td data-bind="text: sede.sede_direccion"></td>
                                    <td class="center" data-bind="text: sede.created_at"></td>
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
        function SedesViewModel(){
            var me = this;

            me.matchingSedes = ko.observableArray([]);
            me.loadingSedes = ko.observable(false);

            me.getSedes = function () {
                me.loadingSedes(true);
                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/getSedes",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        console.log(data);
                        console.log(data.sedes);
                        var rawSedes = JSON.parse(data.sedes);
                        me.loadingSedes(false);
                        me.matchingSedes.removeAll();
                        for (var i = 0; i < rawSedes.length; i++) {
                            me.matchingSedes.push(rawSedes[i]);
                        }
                    },
                    error: function (data) {
                        me.loadingSedes(false);
                        console.log(data);
                        console.log("error ;(");
                    }
                }).done(function(){ initializeDataTable(); });
                //}
            };

            me.editSede = function(sede) {
                var sedeId = sede.sede_id;
                window.location="http://localhost:8080/Template/public/sedes/" + sedeId;
            };

            me.delete = function (sede, event) {
                event.preventDefault();
                event.stopPropagation();
                $trClick = $(event.target).parents('tr.sede');

                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/deleteSede",
                    data: { sedeId: sede.id},
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        //send the toast
                        console.log(data.result);
                        var table = $('#SedesData').DataTable();
                        table.row($trClick).remove().draw( false );
                        toastr.success('Sus cambios fueron guardados con éxito','Sede Eliminada');
                        //var table = $('#sedeData').DataTable();


                        //me.getSedes();
                    },
                    error: function () {
                        console.log("error ;(");
                    }
                });
            };

            me.getSedes();

            return {
                matchingSedes: me.matchingSedes,
                loadingSedes: me.loadingSedes,
                getSedes: me.getSedes,
                editSede: me.editSede,
                delete: me.delete
            };
        }

        var viewModel = new SedesViewModel();

        function initializeDataTable(){
            $('#SedesData').DataTable({
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
                    { 'bSortable': false, 'aTargets': [ 5 ] }
                ]
            });
        }
        $(function () {
            //we bind the viewmodel to the view
            ko.applyBindings(viewModel , $("#page-wrapper")[0]);

        });

    </script>

@stop