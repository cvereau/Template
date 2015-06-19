@extends('layout.site')
@section('StyleSection')
    <!-- TreeView CSS -->
    {{HTML::style('assets/bower_components/jstree/jstree.css')}}
@stop
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $sedeId or 'Nueva Asignatura' }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos de la Asignatura
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" data-bind="value: nombre" placeholder="Ingrese un nombre para la asignatura">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <label>Grados</label>
                            <div id="treeCheckbox">
                                <ul>
                                    <li>
                                        <strong class="colorInicial">Inicial</strong>
                                    </li>
                                    <li>
                                        <strong class="colorPrimaria">Primaria</strong>
                                        <ul>
                                            <li>
                                                Primer Grado
                                            </li>
                                            <li>
                                                Segundo Grado
                                            </li>
                                            <li data-jstree='{ "icon" : "" }'>
                                                Tercer Grado
                                            </li>
                                            <li data-jstree='{ "icon" : "" }'>
                                                Cuarto Grado
                                            </li>
                                            <li data-jstree='{ "icon" : "" }'>
                                                Quinto Grado
                                            </li>
                                            <li data-jstree='{ "icon" : "" }'>
                                                Sexto Grado
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong class="colorSecundaria">Secundaria</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer">
                        <button  class="btn btn-primary" data-bind="click: save">Guardar</button>
                        <a href="{{URL::to('asignaturas')}}" class="btn btn-default">Cancelar</a>
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
    {{HTML::script('assets/bower_components/jstree/jstree.js')}}
    {{HTML::script('assets/bower_components/jstree/examples.treeview.js')}}
@stop