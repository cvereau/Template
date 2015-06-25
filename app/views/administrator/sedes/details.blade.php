@extends('layout.site')
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $sedeName or 'Nueva Sede' }}</h1>
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
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#infoTab" data-toggle="tab">Información Básica</a>
                            </li>
                            <li><a href="#gradosTab" data-toggle="tab">Grados y Aulas</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="infoTab">
                                <br/>
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" data-bind="value: nombre" placeholder="Ingrese un nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Responsable</label>
                                            <input class="form-control" data-bind="value: responsable" placeholder="Ingrese un responsable">
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input class="form-control" data-bind="value: direccion" placeholder="Ingrese una dirección">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gradosTab">
                                <br/>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div id="nvInicial" class="col-md-10 nvParent">
                                            <div class="checkbox">
                                                <input type="checkbox" id="chkInicial" class="chkNivel">
                                                <label></label>
                                                <button class="btn btn-success" id="btnInicial"><i class="fa fa-plus"></i> Inicial</button>
                                            </div>
                                            <div class="tab-grados" id="grInicial">
                                                <div class="checkbox checkbox-success">
                                                    <input type="checkbox" id="3" class="chkGrado">
                                                    <label for="3">
                                                        3 años
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-success">
                                                    <input type="checkbox" id="4" class="chkGrado">
                                                    <label for="4">
                                                        4 años
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-success">
                                                    <input type="checkbox" id="5" class="chkGrado">
                                                    <label for="5">
                                                        5 años
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div id="nvPrimaria" class="col-md-12 nvParent">
                                            <div class="checkbox">
                                                <input type="checkbox" id="chkPrimaria" class="chkNivel" >
                                                <label></label>
                                                <button class="btn btn-info" id="btnPrimaria"><i class="fa fa-plus"></i> Primaria</button>
                                            </div>
                                            <div class="tab-grados" id="grPrimaria">
                                                <div style="display:none;" class="notConsider">
                                                    <div class="seccionContainer tab">
                                                        <div class="form-inline">
                                                            <small data-bind="text: currentGrado"></small>&nbsp;&nbsp;
                                                            <select class="form-control input-sm">
                                                                <option value="A">A</option>
                                                                <option value="A">B</option>
                                                                <option value="A">C</option>
                                                            </select>
                                                            <input type="text" class="form-control input-sm small-input" placeholder="Aula" style="width: 80px;" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="prim_primerGrado">
                                                    <div id="1" data-id="1ero" class="checkbox checkbox-info">
                                                        <input type="checkbox" id="chk1GP" class="chkGrado" >
                                                        <label for="chk1GP" style="width:70px">
                                                            Primero
                                                        </label>
                                                        <button class="btn btn-sm btn-default addSecciones " style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones1">
                                                    </div>
                                                </div>
                                                <div id="prim_segundoGrado">
                                                    <div id="2" data-id="2do" class="checkbox checkbox-info">
                                                        <input type="checkbox" id="chk2GP" class="chkGrado" >
                                                        <label for="chk2GP" style="width:70px">
                                                            Segundo
                                                        </label>
                                                        <button  class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones2">
                                                    </div>
                                                </div>
                                                <div id="prim_tercerGrado">
                                                    <div id="3" data-id="3ero" class="checkbox checkbox-info">
                                                        <input type="checkbox" id="chk3GP"  class="chkGrado">
                                                        <label for="chk3GP" style="width:70px">
                                                            Tercero
                                                        </label>
                                                        <button class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones3">
                                                    </div>
                                                </div>
                                                <div id="prim_cuartoGrado">
                                                    <div id="4" data-id="4to"  class="checkbox checkbox-info">
                                                        <input type="checkbox" id="chk4GP" class="chkGrado">
                                                        <label for="chk4GP" style="width:70px">
                                                            Cuarto
                                                        </label>
                                                        <button class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones4">
                                                    </div>
                                                </div>
                                                <div id="prim_quintoGrado">
                                                    <div id="5" data-id="5to" class="checkbox checkbox-info">
                                                        <input type="checkbox" id="chk5GP" class="chkGrado">
                                                        <label for="chk5GP" style="width:70px">
                                                            Quinto
                                                        </label>
                                                        <button class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones5">
                                                    </div>
                                                </div>
                                                <div id="prim_sextoGrado">
                                                    <div id="6" data-id="6to" class="checkbox checkbox-info">
                                                        <input type="checkbox" id="chk6GP" class="chkGrado">
                                                        <label for="chk6GP" style="width:70px">
                                                            Sexto
                                                        </label>
                                                        <button class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones6">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div id="nvSecundaria" class="col-md-12 nvParent">
                                            <div class="checkbox">
                                                <input type="checkbox" id="chkSecundaria" class="chkNivel" >
                                                <label></label>
                                                <button class="btn btn-primary" id="btnSecundaria"><i class="fa fa-plus"></i> Secundaria</button>
                                            </div>
                                            <div class="tab-grados" id="grSecundaria">
                                                <div style="display:none;" class="notConsider">
                                                    <div class="seccionContainer tab">
                                                        <div class="form-inline">
                                                            <small data-bind="text: currentGrado"></small>&nbsp;&nbsp;
                                                            <select class="form-control input-sm">
                                                                <option value="A">A</option>
                                                                <option value="A">B</option>
                                                                <option value="A">C</option>
                                                            </select>
                                                            <input type="text" class="form-control input-sm small-input" placeholder="Aula" style="width: 80px;" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="sec_primerGrado">
                                                    <div id="1" data-id="1ero" class="checkbox checkbox-primary">
                                                        <input type="checkbox" id="chk1GS" class="chkGrado">
                                                        <label for="chk1GS" style="width:70px">
                                                            Primero
                                                        </label>
                                                        <button  class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones1">
                                                    </div>
                                                </div>
                                                <div id="sec_segundoGrado">
                                                    <div id="2" data-id="2do" class="checkbox  checkbox-primary">
                                                        <input type="checkbox" id="chk2GS" class="chkGrado">
                                                        <label for="chk2GS" style="width:70px">
                                                            Segundo
                                                        </label>
                                                        <button  class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones2">
                                                    </div>
                                                </div>
                                                <div id="sec_tercerGrado">
                                                    <div id="3" data-id="3ero" class="checkbox  checkbox-primary">
                                                        <input type="checkbox" id="chk3GS"  class="chkGrado">
                                                        <label for="chk3GS" style="width:70px">
                                                            Tercero
                                                        </label>
                                                        <button  class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones3">
                                                    </div>
                                                </div>
                                                <div id="sec_cuartoGrado">
                                                    <div id="4" data-id="4to" class="checkbox checkbox-primary">
                                                        <input type="checkbox" id="chk4GS" class="chkGrado">
                                                        <label for="chk4GS" style="width:70px" >
                                                            Cuarto
                                                        </label>
                                                        <button  class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones4">
                                                    </div>
                                                </div>
                                                <div id="sec_quintoGrado">
                                                    <div id="5" data-id="5to" class="checkbox checkbox-primary">
                                                        <input type="checkbox" id="chk5GS" class="chkGrado">
                                                        <label for="chk5GS" style="width:70px">
                                                            Quinto
                                                        </label>
                                                        <button  class="btn btn-sm btn-default addSecciones" style="display:none;"><i class="glyphicon glyphicon-plus"></i> Secciones</button>
                                                    </div>
                                                    <div class="secciones5">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
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
            me.nombre = ko.observable(null);
            me.responsable = ko.observable(null);
            me.direccion = ko.observable(null);
            me.currentGrado = ko.observable(null);

            me.getSedeInfo = function (){
                if (me.requestSedeId != "") {
                    $.ajax({
                        type: "GET",
                        url:"http://localhost:8080/Template/public/api/v1/getSedeInfoById",
                        data: { sedeId: me.requestSedeId},
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
                me.nombre(rawSede.sede_nombre);
                me.responsable(rawSede.sede_responsable);
                me.direccion(rawSede.sede_direccion)
            };

            me.save = function(){
                var SedeRaw = {
                    id: me.id(),
                    nombre: me.nombre(),
                    responsable: me.responsable(),
                    direccion: me.direccion()
                };
                console.log(SedeRaw);
                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/saveSede",
                    data: { sede: SedeRaw},
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
                id: me.id,
                nombre: me.nombre,
                responsable: me.responsable,
                direccion: me.direccion,
                currentGrado: me.currentGrado,
                save: me.save
            };

        };

        var viewModel =  new SedeDetailViewModel();

        function mostrarPanelesGrados(panel, valor){
            if(valor){
                $("#" + panel).show();
            }
            else{
                $("#" + panel).hide();
            }
        }

        function activarBotonNivel(evt){
            $btn = $(evt.target);
            //cambiamos el icono y el estilo del boton a activo
            $icon = $btn.find("i");
            if($icon.hasClass("fa-plus")){
                $icon.removeClass("fa-plus").addClass("fa-minus");
                $btn.addClass("active");
            }
            else{
                $icon.removeClass("fa fa-minus").addClass("fa fa-plus");
                $btn.removeClass("active");
            }
        }

        function onInicialClick(evt){
            activarBotonNivel(evt);
            //mostramos el panel respectivo
            $("#grInicial").toggle();
        }

        function onPrimariaClick(evt){
            activarBotonNivel(evt);
            //mostramos el panel respectivo
            $("#grPrimaria").toggle();
        }

        function onSecundariaClick(evt){
            activarBotonNivel(evt);
            //mostramos el panel respectivo
            $("#grSecundaria").toggle();
        }

        function onChkGradoClick(evt){
            // obtenemos los componenets que usaremos , el checkboxGrado, el checkboxNivel y el div de el checkbox nivel, con los estilos
            $chk = $(evt.target);
            $chkNivel = $chk.parents("div.nvParent").find("div.checkbox").children(".chkNivel").eq(0);
            $chkNivelDiv =  $chk.parents("div.nvParent").find("div.checkbox").eq(0);
            //condicionales
            if ($chkNivel.is(":checked")){
                if ($chk.is(":checked")){
                    if(estanTodosCheckeados($chkNivelDiv)){
                        if($chkNivel[0].id == "chkInicial"){
                            $chkNivelDiv.addClass("checkbox-success");
                        }
                        else if($chkNivel[0].id == "chkPrimaria"){
                            $chkNivelDiv.addClass("checkbox-info");
                        }
                        else{
                            $chkNivelDiv.addClass("checkbox-primary");
                        }

                    }
                }
                else {
                    $chkNivelDiv.removeClass().addClass("checkbox");
                    if(estanTodosDescheckeados($chkNivelDiv)){
                        $chkNivel.prop("checked", false);
                    }
                }
            }
            else{
                if ($chk.is(":checked")){
                    $chkNivel.prop("checked", true);
                    $chkNivelDiv.removeClass().addClass("checkbox");
                }
            }
        }

        function onChkGradoChanged(evt){
            $chk = $(evt.target);
            if($chk.is(":checked")){
                $chk.siblings("button.addSecciones").show();
                //$chk.parents("div.checkbox").siblings().eq(0).show();
            }
            else {
                $chk.siblings("button.addSecciones").hide();
                if($chk.parents("div.checkbox").parents(".nvParent")[0].id != "nvInicial"){
                    $chk.parents("div.checkbox").siblings().eq(0).children().hide();
                }
            }
        }

        function estanTodosCheckeados($chkNivelDiv){
            var estanTodos = true;
            $chkNivelDiv.siblings(".tab-grados").children().each(function () {
                if(!$(this).find("input[type='checkbox']").is(":checked") && !$(this).hasClass("notConsider")){
                    estanTodos = false;
                }
            });
            return estanTodos;
        }

        function estanTodosDescheckeados($chkNivelDiv){
            var estanTodos = true;
            $chkNivelDiv.siblings(".tab-grados").children().each(function () {
                if($(this).find("input[type='checkbox']").is(":checked") && !$(this).hasClass("notConsider")){
                    estanTodos = false;
                }
            });
            return estanTodos;
        }

        function onChkNivelClick(evt){
            $chk = $(evt.target);
            var id = $chk[0].id;
            if(id == "chkInicial"){
                $chk.closest("div").addClass("checkbox-success");
                if($chk.is(":checked")){
                    $("#grInicial").children().each(function () {
                        $(this).find('input').prop('checked', true).change();
                    })
                }
                else{
                    $("#grInicial").children().each(function () {
                        $(this).find('input').prop('checked', false).change();
                    });
                }
            }
            else if (id == "chkPrimaria"){
                $chk.closest("div").addClass("checkbox-info");
                if($chk.is(":checked")){
                    $("#grPrimaria").children().each(function () {
                        $(this).find('input').prop('checked', true).change();
                    });
                }
                else{
                    $("#grPrimaria").children().each(function () {
                        $(this).find('input').prop('checked', false).change();
                    });
                }
            }
            else{
                $chk.closest("div").addClass("checkbox-primary");
                if($chk.is(":checked")){
                    $("#grSecundaria").children().each(function () {
                        $(this).find('input').prop('checked', true).change();
                    });
                }
                else{
                    $("#grSecundaria").children().each(function () {
                        $(this).find('input').prop('checked', false).change();
                    });
                }
            }
        }

        function onAddSeccionClick(evt){
            $button = $(evt.target);
            var gradoNombre = $button.parents('div.checkbox').data("id");
            var $seccionesDiv = $button.parents('div.checkbox').siblings().eq(0);
            viewModel.currentGrado(gradoNombre);
            $(".seccionContainer").first().clone().appendTo($seccionesDiv);
        }

        function inialize(){
            //ocultamos todos los paneles de grados la inicio
            $("#grInicial").hide();
            $("#grPrimaria").hide();
            $("#grSecundaria").hide();
        }



        $(function () {
            //handlers
            inialize();
            $("#btnInicial").on("click", onInicialClick);
            $("#btnPrimaria").on("click", onPrimariaClick);
            $("#btnSecundaria").on("click", onSecundariaClick);
            $(".chkGrado").on("click", onChkGradoClick);
            $(".chkGrado").on("change", onChkGradoChanged);
            $(".chkNivel").on("click", onChkNivelClick);
            $(".addSecciones").on("click", onAddSeccionClick);

            ko.applyBindings(viewModel , $("#page-wrapper")[0]);
        });
    </script>
@stop