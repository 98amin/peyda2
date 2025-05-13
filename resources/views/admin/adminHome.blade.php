<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لیست افراد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.6); /* semi-transparent black to improve readability */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        table {
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
        }
    </style>
</head>
<body class="container mt-5">
    <h1 class="mb-4 text-center">جستجوی افراد</h1>

    <form method="GET" action="/">
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="جستجو بر اساس نام">
    </div>
</form>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>نام</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($people as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->status->name }}</td>
                    <td><a href="{{ url('/person/' . $person->id . '/edit')}}" class="btn"><i class="bi bi-pencil-square"></i></a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">موردی یافت نشد.</td>
                </tr>
            @endforelse
            
        </tbody>
    </table>
</body>
</html>
