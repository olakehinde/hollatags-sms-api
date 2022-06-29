<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>SMS Status</title>
    </head>

    <body>
        <div class="container justify-content-center col-md-6 my-5">
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ route('status') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="phone">Enter SMS Message ID here <sup>*</sup></label>
                    <input type="text" name="msgid" class="form-control col-md-6" id="msgid" aria-describedby="phoneHelp" placeholder="Enter message ID">
                    <small id="phoneHelp" class="form-text text-muted">Multiple phone numbers can be separated with a comma ','</small>
                </div>

                <button type="submit" class="btn btn-primary">Lookup SMS</button>
            </form>
        </div>
        
    </body>
</html>