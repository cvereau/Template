@extends('layout.site')
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nuevo Usuario</h1>
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
                                        <input class="form-control" placeholder="Ingrese un usuario">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" placeholder="Ingrese un password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Email</label>
                                                <input class="form-control" placeholder="Ingrese un email (ejemplo@prueba.com)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label> <br/>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-success active btn-sm">
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked> Activo
                                            </label>
                                            <label class="btn btn-default btn-sm">
                                                <input type="radio" name="options" id="option2" autocomplete="off" checked> Inactivo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control">
                                                    <option>Administrador</option>
                                                    <option>Usuario</option>
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
                        <button  class="btn btn-primary">Guardar</button>
                        <a href="{{URL::to('usuarios')}}" class="btn btn-default    ">Cancelar</a>
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@stop