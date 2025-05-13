<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- ✅ Mobile responsiveness -->
    <title>افزودن فرد جدید</title>
    
    <!-- ✅ Bootstrap RTL and Icons -->
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
            background-color: rgba(0, 0, 0, 0.6); /* semi-transparent black */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .form-label {
            font-size: 1.1rem; /* Make the label a bit larger for better accessibility */
        }

        .btn {
            width: 100%;
            margin-top: 10px; /* Give some space between buttons */
        }

        /* For small screen devices */
        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }

            .form-control, .form-select {
                font-size: 1.1rem; /* Slightly larger input fields on small screens */
            }

            .btn {
                width: 100%; /* Full-width buttons on smaller screens */
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="mb-4 text-center text-white">افزودن فرد جدید</h2>

        <!-- Display error messages if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form for adding new person -->
        <form method="POST" action="{{ route('person.store') }}">
            @csrf

            <!-- Name input -->
            <div class="mb-3">
                <label for="name" class="form-label">نام</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="نام را وارد کنید" required>
            </div>

            <!-- Hospital input -->
            <div class="mb-3">
                <label for="hospital" class="form-label">نام بیمارستان</label>
                <input type="text" class="form-control" id="hospital" name="hospital" placeholder="بیمارستان را وارد کنید">
            </div>

            <!-- Status select -->
            <div class="mb-3">
                <label for="status_id" class="form-label">وضعیت</label>
                <select class="form-select" id="status_id" name="status_id" required>
                    <option value="">انتخاب وضعیت</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit and Back buttons -->
            <button type="submit" class="btn btn-primary">ذخیره</button>
            <a href="/" class="btn btn-secondary">بازگشت</a>
        </form>
    </div>

</body>
</html>
