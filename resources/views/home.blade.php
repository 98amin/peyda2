<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>جستجوی افراد</title>
    <!-- Use RTL version of Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
            </tr>
        </thead>
        <tbody>
            @forelse($people as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->status->name }}</td>
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
