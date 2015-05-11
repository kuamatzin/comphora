@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3 class="text-center">Costo Agregado</h3>
                <hr/>
                <button class="btn btn-danger center-block" id="get_iusacell">IUSACELL</button>
                <br/>
                <button class="btn btn-warning center-block" id="get_nextel">NEXTEL</button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var compania = "";
            $("button#get_iusacell").click(function () {
                compania = "iusacell";
                get_compania();
            });
            $("button#get_nextel").click(function () {
                compania = "nextel";
                get_compania();
            });

            function get_compania() {
                $.ajax({
                    url: "actualizar/scripting.php?compania=" + compania,
                    success: function (regreso) {
                        var files = [];
                        if (compania == "iusacell") {
                            files.push('actualizar/download.php?name=equipos_iusa12.csv&compania=' + compania);
                            files.push('actualizar/download.php?name=equipos_iusa12_controlado.csv&compania=' + compania);
                            files.push('actualizar/download.php?name=equipos_iusa18.csv&compania=' + compania);
                            files.push('actualizar/download.php?name=equipos_iusa18_controlado.csv&compania=' + compania);

                            files.push('actualizar/download.php?name=equipos_iusa24.csv&compania=' + compania);
                            files.push('actualizar/download.php?name=equipos_iusa24_controlado.csv&compania=' + compania);
                        }
                        else {

                            files.push('actualizar/download.php?name=equipos_next18.csv&compania=' + compania + "/next_iden");
                            files.push('actualizar/download.php?name=equipos_next24.csv&compania=' + compania + "/next_iden");

                            files.push('actualizar/download.php?name=equipos_next18.csv&compania=' + compania + "/next_iphone");
                            files.push('actualizar/download.php?name=equipos_next24.csv&compania=' + compania + "/next_iphone");

                            files.push('actualizar/download.php?name=equipos_next18.csv&compania=' + compania + "/next_navegacion");
                            files.push('actualizar/download.php?name=equipos_next24.csv&compania=' + compania + "/next_navegacion");
                        }
                        for (var ii = 0; ii < files.length; ii++) {
                            downloadURL(files[ii]);
                        }
                        var count = 0;

                        function downloadURL(url) {
                            var hiddenIFrameID = 'hiddenDownloader' + count++;
                            var iframe = document.createElement('iframe');
                            iframe.id = hiddenIFrameID;
                            iframe.style.display = 'none';
                            document.body.appendChild(iframe);
                            iframe.src = url;
                        }
                    }
                });
            }
        })
    </script>
@endsection