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
        function UserDetailViewModel() {
            var me =  this;

            me.requestUsername = "{{ $name }}";
            me.id = ko.observable(0);
            me.username = ko.observable(null);
            me.password = ko.observable(null);
            me.email = ko.observable(null);
            me.active = ko.observable(true);
            me.rol = ko.observable(0);

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
                        },
                        error: function (data) {
                            console.log(data);
                            console.log("error ;(");
                        }
                    });
                }

            };

            me.loadUser = function(rawuser){
                me.id(rawuser.id);
                me.username(rawuser.username);
                me.password(rawuser.password);
                me.email(rawuser.email);
            };

            me.save = function(){
                var userRaw = {
                    id: me.id(),
                    username: me.username(),
                    password: me.password(),
                    email: me.email(),
                    active: me.active()? 1: 0,
                    rol: me.rol()
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
                        toastr.success('Sus cambios fueron registrados con éxito','Sede Guardada');
                        //redirect them
                        setTimeout(function () { window.location = "{{URL::to('sedes')}}"; }, 1000);


                    },
                    error: function () {
                        console.log("error ;(");
                    }
                });
            };

            me.getUserInfo();

            return {
                username:me.username,
                password:me.password,
                email:me.email,
                active:me.active,
                rol:me.rol,
                getUserInfo: me.getUserInfo,
                loadUser:me.loadUser,
                save:me.save
            };

        };

        var viewModel =  new UserDetailViewModel();


        $(function () {

            ko.applyBindings(viewModel , $("#page-wrapper")[0]);
        });
    </script>
@stop