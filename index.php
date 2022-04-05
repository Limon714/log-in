<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h2 class="bg-warning d-flex justify-content-center py-3"> Fill Up The Form</h2>
    <div class="d-flex justify-content-center">


        <form action="user.php" method="post" class="mx-5">
            <input type="text" name="name" placeholder="Your name.." class="box px-4 shadow mx-5 my-3">
            <br>

            <input type="email" name="email" placeholder="Your email.." class="box px-4 shadow mx-5 my-3">
            <br>
            <textarea name="message" placeholder="Write Your Message.." cols="22" rows="10"
                class="box px-4 shadow mx-5 my-3"></textarea>
            <br>
            <span class="mx-4"></span><input type="submit" value="Submit"
                class="btn btn-warning mx-5 px-5 font-weight-bold text-dark">
        </form>
    </div>
</body>

</html>