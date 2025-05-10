<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>افزودن فرد جدید</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
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
    </style>
</head>
<body class="container mt-5">

    <h2 class="mb-4">افزودن فرد جدید</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('person.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">نام</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="نام را وارد کنید" required>
        </div>
        <div class="mb-3">
    <label for="hospital" class="form-label">نام بیمارستان</label>
    <input type="text" class="form-control" id="hospital" name="hospital" placeholder="بیمارستان را وارد کنید">
</div>
        <div class="mb-3">
            <label for="status_id" class="form-label">وضعیت</label>
            <select class="form-select" id="status_id" name="status_id" required>
                <option value="">انتخاب وضعیت</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">ذخیره</button>
        <a href="/" class="btn btn-secondary">بازگشت</a>
    </form>

</body>
</html>
