@extends('layout.site')
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $sedeId or 'Nueva Sede' }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos de la Sede
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" data-bind="value: name" placeholder="Ingrese un nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Responsable</label>
                                        <input class="form-control" data-bind="value: responsible" placeholder="Ingrese un responsable">
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input class="form-control" data-bind="value: location" placeholder="Ingrese una dirección">
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer">
                        <button  class="btn btn-primary" data-bind="click: save">Guardar</button>
                        <a href="{{URL::to('sedes')}}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@stop
@section('ScriptSection')
    <script>
        function SedeDetailViewModel() {
            var me =  this;

            me.requestSedeId = "{{ $sedeId }}";
            me.id = ko.observable(0);
            me.name = ko.observable(null);
            me.responsible = ko.observable(null);

            me.getSedeInfo = function (){
                if (me.requestSedeId != "") {
                    $.ajax({
                        type: "GET",
                        url:"http://localhost:8080/Template/public/api/v1/getSedeInfoById",
                        data: { sedeId: me.id},
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        success: function (data) {
                            var rawSede = data.sede;
                            me.loadSede(rawSede);
                        },
                        error: function (data) {
                            console.log(data);
                            console.log("error ;(");
                        }
                    });
                }

            };

            me.loadSede = function(rawSede){
                me.id(rawSede.sede_id);
                me.name(rawSede.sede_name);
                me.responsible(rawSede.sede_responsible);
            };

            me.save = function(){
                var SedeRaw = {
                    id: me.id(),
                    Sedename: me.Sedename(),
                    password: me.password(),
                    email: me.email(),
                    active: me.active()? 1: 0,
                    rol: me.rol(),
                    sede: me.sede()
                };
                console.log(SedeRaw);
                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/saveSede",
                    data: { Sede: SedeRaw},
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        //send the toast
                        console.log(data.result);
                        toastr.success('Sus cambios fueron registrados con éxito','Sede Guardada');
                        //redirect them
                        setTimeout(function () { window.location = "{{URL::to('sedes')}}"; }, 1000);


                    },
                    error: function () {
                        console.log("error ;(");
                    }
                });
            };

            me.getSedeInfo();

            return {
                Sedename:me.Sedename,
                password:me.password,
                email:me.email,
                active:me.active,
                rol:me.rol,
                getSedeInfo: me.getSedeInfo,
                loadSede:me.loadSede,
                save:me.save
            };

        };

        var viewModel =  new SedeDetailViewModel();


        $(function () {

            ko.applyBindings(viewModel , $("#page-wrapper")[0]);
        });
    </script>
@stop