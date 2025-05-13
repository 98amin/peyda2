<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- ✅ Enables mobile responsiveness -->
    <title>لیست افراد</title>
    
    <!-- ✅ Bootstrap CSS and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Anjoman';
            src: url('/fonts/anjoman-light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Anjoman';
            src: url('/fonts/anjoman-thin.ttf') format('truetype');
            font-weight: 200;
            font-style: normal;
        }

        html, body {
            height: 100%;
            margin: 0;
            background: url('/images/peyda2Horizontal.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Anjoman', sans-serif;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.6); /* semi-transparent black to improve readability */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        h1 {
            color: white;
        }

        table {
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
        }

        /* Make the table responsive on mobile */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="mb-4 text-center">جستجوی افراد</h1>

        <!-- ✅ Search Form -->
        <form method="GET" action="/">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="جستجو بر اساس نام">
            </div>
        </form>

        <!-- ✅ Table Wrapper for responsiveness -->
        <div class="table-wrapper">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($people as $person)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->status->name }}</td>
                            <td><a href="{{ url('/person/' . $person->id . '/edit')}}" class="btn"><i class="bi bi-pencil-square"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">موردی یافت نشد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
