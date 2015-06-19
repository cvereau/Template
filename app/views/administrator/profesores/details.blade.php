@extends('layout.site')
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $profesorId or 'Nuevo Profesor' }}</h1>
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
                                        <label>DNI</label>
                                        <input class="form-control" data-bind="value: username" placeholder="Ingrese un dni">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" data-bind="value: password" placeholder="Ingrese un nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input class="form-control" data-bind="value: password" placeholder="Ingrese un apellido paterno">
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input class="form-control" data-bind="value: password" placeholder="Ingrese un apellido materno">
                                    </div>
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" data-bind="value: rol">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input class="form-control" data-bind="value: password" placeholder="Ingrese una dirección">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Teléfono</label>
                                                <input class="form-control" data-bind="value: email" placeholder="Ingrese un telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Es Tutor</label> <br/>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-success active btn-sm">
                                                <input type="radio" name="userActive" id="userActive" autocomplete="off" data-bind="checked: active"> Activo
                                            </label>
                                            <label class="btn btn-default btn-sm">
                                                <input type="radio" name="userInactive" id="userInactive" autocomplete="off" data-bind="checked: !active"> Inactivo
                                            </label>
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
    <script>

        function setActiveRadioButtons(){
            var active =  viewModel.active();
            if(!active){
                $("#userActive").closest('label').removeClass('btn-success');
                $("#userActive").closest('label').addClass('btn-default');
                $("#userActive").closest('label').removeClass('active');
                $("#userInactive").closest('label').addClass('btn-danger');
                $("#userInactive").closest('label').removeClass('btn-default');
                $("#userInactive").closest('label').addClass('active');
            }
        }

        $(function () {
            //handlers for the radio input
            $("input[type='radio'][name='userInactive']").change(function () {
                viewModel.active(false);
                if (this.checked) {
                    $(this).closest('label').removeClass('btn-default');
                    $(this).closest('label').addClass('btn-danger');
                    $("#userActive").closest('label').removeClass('btn-success');
                    $("#userActive").closest('label').addClass('btn-default');
                }
            });
            $("input[type='radio'][name='userActive']").change(function () {
                if (this.checked) {
                    viewModel.active(true);
                    $("#userInactive").closest('label').removeClass('btn-danger');
                    $("#userInactive").closest('label').addClass('btn-default');
                    $(this).closest('label').addClass('btn-success');
                    $(this).closest('label').removeClass('btn-default');
                }
            });

        });
    </script>
@stop