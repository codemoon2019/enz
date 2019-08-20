<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="9" style="text-align:center;">INQUIRIES</th>
            </tr>
            <tr>
                <th style="text-align:center; width: auto;">Date</th>
                <th style="text-align:center; width: auto;">Full Name</th>
                <th style="text-align:center; width: auto;">Profession</th>
                <th style="text-align:center; width: auto;">Email</th>
                <th style="text-align:center; width: auto;">Mobile No.</th>
                <th style="text-align:center; width: auto;">Location</th>
                <th style="text-align:center; width: auto;">Consultation</th>
                <th style="text-align:center; width: auto;">Inquiry</th>
                <th style="text-align:center; width: auto;">Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inquiries as $inquiry)
                <tr>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->created_at->format('d-m-Y')}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->full_name}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->profession}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->email_address}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->mobile_number}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->location}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->consultation}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->inquiry}}</td>
                    <td width="20" style="text-align:center; width: auto; font-size: 9px">{{$inquiry->country}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>