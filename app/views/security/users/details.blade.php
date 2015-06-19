@extends('layout.site')
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $name or 'Nuevo Usuario' }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos del Usuario
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input class="form-control" data-bind="value: username" placeholder="Ingrese un usuario">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" data-bind="value: password" placeholder="Ingrese un password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Email</label>
                                                <input class="form-control" data-bind="value: email" placeholder="Ingrese un email (ejemplo@prueba.com)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label> <br/>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-success active btn-sm">
                                                <input type="radio" name="userActive" id="userActive" autocomplete="off" data-bind="checked: active"> Activo
                                            </label>
                                            <label class="btn btn-default btn-sm">
                                                <input type="radio" name="userInactive" id="userInactive" autocomplete="off" data-bind="checked: !active"> Inactivo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" data-bind="value: rol">
                                                    @foreach( $roles as $rol)
                                                        <option value="{{$rol->rol_id}}">{{$rol->rol_nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sede</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" data-bind="value: sede">
                                                    @foreach( $sedes as $sede)
                                                        <option value="{{$sede->sede_id}}">{{$sede->sede_nombre}}</option>
                                                    @endforeach
                                                </select>
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
                        <a href="{{URL::to('usuarios')}}" class="btn btn-default">Cancelar</a>
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
        function UserDetailViewModel() {
            var me =  this;

            me.requestUsername = "{{ $name }}";
            me.id = ko.observable(0);
            me.username = ko.observable(null);
            me.password = ko.observable(null);
            me.email = ko.observable(null);
            me.active = ko.observable(true);
            me.rol = ko.observable(0);
            me.sede = ko.observable(0);

            me.getUserInfo = function (){
                if (me.requestUsername != "") {
                    $.ajax({
                        type: "GET",
                        url:"http://localhost:8080/Template/public/api/v1/getUserInfoByUsername",
                        data: { username: me.requestUsername},
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        success: function (data) {
                            console.log(data.user);
                            var rawUser = data.user;
                            me.loadUser(rawUser);
                            //me.rol.valueHasMutated();
                        },
                        error: function (data) {
                            console.log(data);
                            console.log("error ;(");
                        }
                    });
                }

            };

            me.loadUser = function(rawuser){
                me.id(rawuser.usr_id);
                me.username(rawuser.usr_username);
                me.password(rawuser.usr_password);
                me.email(rawuser.usr_email);
                me.active(rawuser.usr_active == 1? true : false);
                me.rol(rawuser.rol_id);
                me.sede(rawuser.sede_id);
                setActiveRadioButtons();
            };

            me.save = function(){
              var userRaw = {
                  id: me.id(),
                  username: me.username(),
                  password: me.password(),
                  email: me.email(),
                  active: me.active()? 1: 0,
                  rol: me.rol(),
                  sede: me.sede()
              };
                console.log(userRaw);
                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/saveUser",
                    data: { user: userRaw},
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        //send the toast
                        console.log(data.result);
                        toastr.success('Sus cambios fueron registrados con éxito','Usuario Guardado');
                        //redirect them
                        setTimeout(function () { window.location = "{{URL::to('usuarios')}}"; }, 1000);

                    },
                    error: function () {
                        console.log("error ;(");
                    }
                });
            };

            //me.getUserInfo();

            return {
                username:me.username,
                password:me.password,
                email:me.email,
                active:me.active,
                rol:me.rol,
                sede:me.sede,
                getUserInfo:me.getUserInfo,
                loadUser:me.loadUser,
                save:me.save
            };

        };

        var viewModel =  new UserDetailViewModel();

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

            // llenamos el formulario con los datos del usuario.
           viewModel.getUserInfo();
            // bindeamos knockout
           ko.applyBindings(viewModel , $("#page-wrapper")[0]);
        });
    </script>
@stop