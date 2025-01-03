<!DOCTYPE html>
<html>
<head>
    <title>Thông tin đăng ký</title>
</head>
<body>
    <h1>Danh sách thông tin đăng ký</h1>
    <table>
        <thead>
            <tr>
                <th>Họ</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personalInfos as $info)
            <tr>
                <td>{{ $info->first_name }}</td>
                <td>{{ $info->last_name }}</td>
                <td>{{ $info->email }}</td>
                <td>{{ $info->phone_number }}</td>
                <td>{{ $info->address }}</td>
                <td>{{ $info->birthdate }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
