<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Request</title>
    <style>
        *{
            font-family: sans-serif;
        }
        tr, td, th{
            border:solid 1px transparent;
            border-bottom-color: black;
            border-right-color:black;
            padding:10px;
            font-size: 12px;
        }
        table{
            width: 100%;
            overflow-x:scroll;
        }

    </style>
</head>
<body>
<span style="color:#047857; font-size:20px; font-weight: bold">Alternativo</span>
<p>Contact Request</p>
<p>Details</p>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Message</th>
    </tr>
    <tr>
        <td>{{$f_name}}</td>
        <td>{{$l_name}}</td>
        <td>{{$email}}</td>
        <td>{{$phone}}</td>
        <td><p>{{$user_message}}</p></td>
    </tr>
</table>
</body>
</html>

