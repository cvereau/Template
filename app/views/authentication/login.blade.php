<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Colegio Hipólito Unanue</title>

    <!--Favicon--->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Bootstrap Core CSS -->
    {{ HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}    

    <!-- MetisMenu CSS -->
    {{ HTML::style('assets/bower_components/metisMenu/dist/metisMenu.min.css')}}

    <!-- Custom CSS -->
    {{ HTML::style('assets/dist/css/sb-admin-2.css')}}

    <!-- Custom Fonts -->
    {{ HTML::style('assets/bower_components/font-awesome/css/font-awesome.min.css')}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="logo">
                    <img src="{{asset("assets/img/logo/cu-logo.png")}}" height="120" class="img-logo" alt="Colegio Hipólito Unanue" />
                </div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar Sesión</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input id="username" class="form-control" data-bind="value:username" placeholder="Usuario" name="user" type="text" autofocus>
                                </div>
                                <label id="usernameRequiredMessage" class="validation-error" style="display:none;width:100%">Ingrese un usuario</label>
                                <div class="form-group">
                                    <input id="password" class="form-control" data-bind="value:password" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <label id="passwordRequiredMessage" class="validation-error" style="display:none;width:100%">Ingrese un password</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <select class="form-control" id="sede" data-bind="value: sede">
                                                <option value="-1" disabled selected>Seleccione una sede</option>
                                                @foreach($sedes as $sede)
                                                    <option value="{{$sede->sede_id}}">{{$sede->sede_nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label id="sedeRequiredMessage" class="validation-error " style="display:none;width:100%">Seleccione una sede</label>
                                <label id="loginFailedMessage" class="validation-error" style="display:none;width:100%">Su usuario o password es incorrecto</label>
                                <!-- Change this to a button or input when using this as a form -->
                                <a id="btnLogin" href="javascript:void(0)" role="button" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--knockout-->
    {{ HTML::script('http://knockoutjs.com/downloads/knockout-3.3.0.js') }}
    <!-- jQuery -->
    {{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}    

    <!-- Metis Menu Plugin JavaScript -->
    {{ HTML::script('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}

    <!-- Custom Theme JavaScript -->
    {{ HTML::script('assets/dist/js/sb-admin-2.js') }}

    <script>
        function LoginViewModel() {
            var me = this;

            me.username = ko.observable(null);
            me.password = ko.observable(null);
            me.sede = ko.observable(0);

            me.authenticate = function () {
                $.ajax({
                    type: "GET",
                    url:"http://localhost:8080/Template/public/api/v1/login",
                    data: { username: me.username(), password: me.password(), sede: me.sede()},
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (data) {
                        if(data.result == false){
                            $("#loginFailedMessage").show();
                        }
                        else{
                            //we store the userId on the session
                            window.location="{{URL::to('usuarios')}}";
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        console.log(data.d);
                        console.log("error :(");
                    }
                });
            }

            return{
                username: me.username,
                password: me.password,
                sede: me.sede,
                authenticate: me.authenticate
            };

        }

        //we create the viewModel
        var viewModel = new LoginViewModel();

        function Login(e){
            e.preventDefault();
            validateLoginForm({
                invalid: function () {
                    e.preventDefault();
                },
                valid: function () {
                    viewModel.authenticate();
                }
            });


        }
        $(function (){
            //event hanlders
            $("#btnLogin").on("click", Login);
            $("#username").on("keyup", onUsernameKeyup);
            $("#password").on("keyup", onPasswordKeyup);
            $("#sede").on("change", onSedeChange);

            //bind the object
            ko.applyBindings(viewModel, $(".container")[0]);
        });

        var initialized = false;

        function onUsernameKeyup(e) {
            var keyCode = e.which || e.keyCode;
            if (keyCode != 9 && keyCode != 13 && keyCode != 16) {
                $("#loginFailedMessage").fadeOut();
                validateUsernameSupplied();
            }
        }

        function onPasswordKeyup(e) {
            var keyCode = e.which || e.keyCode;
            if (keyCode != 9 && keyCode != 13 && keyCode != 16) {
                $("#loginFailedMessage").fadeOut();
                validatePasswordSupplied();
            }
            else if(keyCode == 13) {
                $("#btnLogin").trigger("click");
            }
        }

        function onSedeChange(e)
        {
            if(initialized){
                validateSedeSupplied();
            }else{
                initialized = true;
            }

        }

        function validateLoginForm(options) {
            options = $.extend({ valid: function () { }, invalid: function () { } }, (options || {}));
            var isValid = true;
            var validateOptions = { invalid: function () { isValid = false; } };
            validateUsernameSupplied(validateOptions);
            validatePasswordSupplied(validateOptions);
            validateSedeSupplied(validateOptions);

            if (isValid) {
                options.valid();
            }
            else {
                options.invalid();
            }
        }

        function validateUsernameSupplied(options) {
            options = $.extend({ valid: function () { }, invalid: function () { } }, (options || {}));
            if ($.trim($("#username").val())) {
                $("#username").removeClass("error");
                $("#usernameRequiredMessage").fadeOut();
                options.valid();
            }
            else {
                $("#username").addClass("error");
                $("#usernameRequiredMessage").fadeIn();
                options.invalid();
            }
        }

        function validatePasswordSupplied(options) {
            options = $.extend({ valid: function () { }, invalid: function () { } }, (options || {}));
            if ($.trim($("#password").val())) {
                $("#password").removeClass("error");
                $("#passwordRequiredMessage").fadeOut();
                options.valid();
            }
            else {
                $("#password").addClass("error");
                $("#passwordRequiredMessage").fadeIn();
                options.invalid();
            }
        }

        function validateSedeSupplied(options) {
            options = $.extend({ valid: function () { }, invalid: function () { } }, (options || {}));
            if ($.trim($("#sede").val())) {
                $("#sede").removeClass("error");
                $("#sedeRequiredMessage").fadeOut();
                options.valid();
            }
            else{
                $("#sede").addClass("error");
                $("#sedeRequiredMessage").fadeIn();
                options.invalid();

            }
        }
    </script>
</body>

</html>
