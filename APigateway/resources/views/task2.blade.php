<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task 2</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">

        <div class="d-flex mb-4 float-end font-weight-bolder">
            <a href="{{url('/')}}">Tasks</a>
        </div>

        <div class="mt-5">
            <form action="">
                <div class="input-group mt-5">
                    <input required name="lat"
                           type="text"
                           class="form-control"
                           placeholder="Latitude"
                           aria-label="Latitude">
                    <span class="input-group-text">&</span>
                    <input required name="lng"
                           type="text"
                           class="form-control"
                           placeholder="Longitude"
                           aria-label="Longitude">
                    <button type="submit" class="btn btn-info">Find</button>
                </div>
            </form>

            @if($result[0][0] === true)
                <div class="d-flex mt-5 justify-content-center">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="d-flex justify-content-center px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{isset($result[1]['division']) ? $result[1]['division'] : 'Not Found'}}</div>
                        </div>
                        <div class="d-flex px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{isset($result[1]['lat']) ? 'Latitude : '.$result[1]['lat'] : 'Latitude'}}</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{isset($result[1]['lng']) ? 'Longitude : '.$result[1]['lng'] : 'Longitude'}}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
