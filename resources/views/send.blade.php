<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Send SMS</title>
    </head>

    <body>
        <div class="container justify-content-center col-md-6 my-5">
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ route('send') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="phone">Enter Recipient Phone Number(s) here <sup>*</sup></label>
                    <input type="tel" name="phone" required class="form-control col-md-6" id="phone" aria-describedby="phoneHelp" placeholder="Enter phone number">
                    <small id="phoneHelp" class="form-text text-muted">Multiple phone numbers can be separated with a comma ','</small>
                </div>

                <div class="form-group">
                    <label for="sms">Type your SMS message here <sup>*</sup></label>
                    <textarea class="form-control" name="sms" required id="sms" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send SMS</button>
            </form>
        </div>
        
    </body>
</html>