@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3 class="text-center">Carga Masiva</h3>
                <hr/>
                <input type="file" name="fileToUpload" id="fileToUpload" accept=".csv">
                <br>
                <select id="meses" name="meses" class="form-control">
                    <option value="12">12 meses</option>
                    <option value="18">18 meses</option>
                    <option value="24">24 meses</option>
                    <option value="36">36 meses</option>
                </select>
                <br>
                <select id="compania" name="compania" class="form-control">
                    <option value="telcel">Telcel</option>
                    <option value="movistar">Movistar</option>
                    <option value="iusacell">Iusacell</option>
                    <option value="nextel">Nextel</option>
                </select>
                <br>
                <input type="button" id="submit" value="Actualizar" name="submit" class="btn btn-primary center-block">
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">

        var filez;
        $('#fileToUpload').change(function () {
            filez = this.files[0];
        });
        $("#submit").click(function () {

            if (filez) {
                if ($("#meses").val()) {
                    if ($("#compania").val()) {
                        sendFile(filez);
                    }
                }
            }

        });

        function sendFile(file) {
            alert("Enviando");
            var data = new FormData();
            data.append('fileToUpload', file, file.name);

            var xhr = new XMLHttpRequest();
            // Create a new XMLHttpRequest
            xhr.open('POST', 'actualizar/upload/upload.php?comp=' + $("#compania").val() + "&meses=" + $("#meses").val(), true);
            // File Location, this is where the data will be posted
            xhr.send(data);
            xhr.onload = function () {
                // On Data send the following works
                if (xhr.status === 200) {
                    $("#drop-box").html("<p>File Uploaded. Select more files</p>");
                } else {
                    $("#drop-box").html("<p>Error in upload, try again.</p>");
                }
            };
        }
    </script>
@endsection