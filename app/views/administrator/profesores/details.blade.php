@extends('layout.site')
@section('StyleSection')
    <!--DatePicker-->
    {{HTML::style('assets/dist/css/bootstrap-datetimepicker.min.css')}}
@stop
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $profesorNombre or 'Nuevo Profesor' }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos del Profesor
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>DNI</label>
                                                <input class="form-control" data-bind="value: dni" pattern="^[0-9]+$" placeholder="Ingrese un dni">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" data-bind="value: nombre" placeholder="Ingrese un nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input class="form-control" data-bind="value: apePaterno" placeholder="Ingrese un apellido paterno">
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input class="form-control" data-bind="value: apeMaterno" placeholder="Ingrese un apellido materno">
                                    </div>
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" data-bind="value: username">
                                                    <option value="1">Seleccione usuario</option>
                                                    <option value="1">ldelgado</option>
                                                    <option value="2">jvelit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" data-bind="value: sexo">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input class="form-control" data-bind="value: direccion" placeholder="Ingrese una dirección">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Teléfono</label>
                                                <input class="form-control" data-bind="value: telefono" placeholder="Ingrese un telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Fecha de Nacimiento</label>
                                                <input type="date" pattern="dd/mm/yyyy" class="form-control" data-bind="value: fechaNac" placeholder="Seleccione su fecha de nacimiento">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label>¿Es Tutor?</label> <br/>
                                            <div class="form-inline">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-default btn-sm">
                                                        <input type="radio" id="esTutor" autocomplete="off" data-bind="checked: active"> SI
                                                    </label>
                                                    <label class="btn btn-danger active btn-sm">
                                                        <input type="radio" id="noEsTutor" autocomplete="off" data-bind="checked: !active"> NO
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    &nbsp;<label id="labelTutorAula" style="display:none">Aula</label>
                                                    <input id="tutorAula" class="form-control" data-bind="value: tutorAula" placeholder="Aula" style="display:none">
                                                </div>
                                            </div>
                                        </div>
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
                        <a href="{{URL::to('profesores')}}" class="btn btn-default">Cancelar</a>
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
    <!--DatePicker-->
    {{ HTML::script('assets/dist/js/bootstrap-datetimepicker.min.js') }}

    <script>
        var baseURL = "http://localhost:8080/Template/public";

        function ProfesorDetailViewModel() {
            var me =  this;

            me.requestId = "{{ $profesorId }}";
            me.id = ko.observable(0);
            me.dni = ko.observable(null);
            me.nombre = ko.observable(null);
            me.apePaterno = ko.observable(null);
            me.apeMaterno = ko.observable(null);
            me.username = ko.observable(0);
            me.sexo = ko.observable("M");
            me.direccion = ko.observable(null);
            me.telefono = ko.observable(null);
            me.fechaNac = ko.observable(null);
            me.active = ko.observable(true);
            me.tutorAula = ko.observable(null);

            me.getProfesorInfo = function (){
                if (me.requestId != "") {
                    $.ajax({
                        type: "GET",
                        url: baseURL + "/api/v1/getProfesorInfoById",
                        data: { profesorId: me.requestId},
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        success: function (data) {
                            console.log(data.profesor);
                            var rawProfesor = data.profesor;
                            me.loadProfesor(rawProfesor);
                            //me.rol.valueHasMutated();
                        },
                        error: function (data) {
                            console.log(data);
                            console.log("error ;(");
                        }
                    });
                }

            };

            me.loadProfesor = function(rawProfesor){
                me.id(rawProfesor.prof_id);
                me.username(rawProfesor.usr_id);
                me.dni(rawProfesor.prof_dni);
                me.nombre(rawProfesor.prof_nombre);
                me.apePaterno(rawProfesor.prof_apellido_paterno);
                me.apeMaterno(rawProfesor.prof_apellido_materno);
                me.sexo(rawProfesor.prof_sexo);
                me.direccion(rawProfesor.prof_direccion);
                me.telefono(rawProfesor.prof_telefono);
                me.fechaNac(rawProfesor.prof_fecha_nac);
                me.active(rawProfesor.prof_esTutor == 1? true : false);
                me.tutorAula(rawProfesor.prof_esTutor_aula);
                setActiveRadioButtons();
            };

            me.save = function(){
                var profesorRaw = {
                    id: me.id(),
                    username:me.username(),
                    dni:me.dni(),
                    nombre: me.nombre(),
                    apePaterno: me.apePaterno(),
                    apeMaterno: me.apeMaterno(),
                    sexo: me.sexo(),
                    direccion: me.direccion(),
                    telefono: me.telefono(),
                    fechaNac: me.fechaNac(),
                    active: me.active()? 0: 1,
                    tutorAula: me. tutorAula()
                };
                //console.log(profesorRaw);
                $.ajax({
                    type: "GET",
                    url:baseURL + "/api/v1/saveProfesor",
                    data: { profesor: profesorRaw},
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        //send the toast
                        console.log(data.result);
                        toastr.success('Sus cambios fueron registrados con éxito','Usuario Guardado');
                        //redirect them
                        setTimeout(function () { window.location = baseURL + "/profesores"; }, 1000);
                    },
                    error: function () {
                        console.log("error ;(");
                    }
                });
            };

            me.getProfesorInfo();

            return {
                username:me.username,
                id: me.id,
                dni:me.dni,
                nombre: me.nombre,
                apePaterno: me.apePaterno,
                apeMaterno: me.apeMaterno,
                sexo: me.sexo,
                direccion: me.direccion,
                telefono: me.telefono,
                fechaNac: me.fechaNac,
                active:me.active,
                tutorAula:me.tutorAula,
                getProfesorInfo:me.getProfesorInfo,
                loadProfesor:me.loadProfesor,
                save:me.save
            };

        };

        var viewModel =  new ProfesorDetailViewModel();

        function setActiveRadioButtons(){
            var active =  viewModel.active();
            if(!active){
                $("#esTutor").closest('label').removeClass('btn-success');
                $("#esTutor").closest('label').addClass('btn-default');
                $("#esTutor").closest('label').removeClass('active');
                $("#noEsTutor").closest('label').addClass('btn-danger');
                $("#noEsTutor").closest('label').removeClass('btn-default');
                $("#noEsTutor").closest('label').addClass('active');
            }
        }

        $(function () {

            $('#datetimepicker4').datetimepicker({
                pickTime: false
            });
            //handlers for the radio input
            $("input[type='radio'][id='noEsTutor']").change(function () {
                viewModel.active(false);
                if (this.checked) {
                    $(this).closest('label').removeClass('btn-default');
                    $(this).closest('label').addClass('btn-danger');
                    $("#esTutor").closest('label').removeClass('btn-success');
                    $("#esTutor").closest('label').addClass('btn-default');
                    $("#tutorAula").hide();
                    $("#labelTutorAula").hide();
                }
            });
            $("input[type='radio'][id='esTutor']").change(function () {
                if (this.checked) {
                    viewModel.active(true);
                    $("#noEsTutor").closest('label').removeClass('btn-danger');
                    $("#noEsTutor").closest('label').addClass('btn-default');
                    $(this).closest('label').addClass('btn-success');
                    $(this).closest('label').removeClass('btn-default');
                    $("#tutorAula").show();
                    $("#labelTutorAula").show();
                }
            });

            ko.applyBindings(viewModel , $("#page-wrapper")[0]);
        });
    </script>
@stop