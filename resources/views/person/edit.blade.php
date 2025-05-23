<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش اطلاعات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
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
            color: white;
        }

        </style>
</head>
<body class="container mt-5 text-start">

    <h2 class="mb-4">ویرایش فرد</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('person.update', $person->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">نام</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $person->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="status_id" class="form-label">وضعیت</label>
            <select class="form-select" id="status_id" name="status_id" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="hospital" class="form-label">نام بیمارستان</label>
            <input type="text" class="form-control" id="hospital" name="hospital" value="{{ old('hospital', $person->hospital) }}">
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <a href="/" class="btn btn-secondary">بازگشت</a>
    </form>

</body>
</html>
