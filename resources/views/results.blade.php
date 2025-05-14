<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- ✅ Mobile responsiveness -->
    <title>نتایج جستجو</title>
    
    <!-- ✅ Bootstrap RTL and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

        body {
            font-family: 'Anjoman', sans-serif;
            background: url('/images/peydaVertical.jpg') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .content {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            max-width: 1000px;
            margin: auto;
        }

        /* Ensure the table is scrollable on small screens */
        .table-responsive {
            overflow-x: auto;
        }

        /* Adjust padding for smaller devices */
        @media (max-width: 768px) {
            .content {
                padding: 15px;
            }

            .table th, .table td {
                padding: 0.5rem;
            }

            .table {
                font-size: 0.9rem;
            }
        }

        /* Pagination Styling for small screens */
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
<!-- ✅ Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid d-flex flex-row-reverse justify-content-between">
            <a class="navbar-brand order-2" href="/">پیدا</a>
            <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="نمایش منو">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-3" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/results">لیست تمامی اسامی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/associationResults">لیست مراکز درمانی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">ارتباط با ما</a> 
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="overlay">
        <div class="content">
            <!-- Status Filter Form -->
            <form method="GET" action="{{ url('/results') }}" class="row mb-4">
                <div class="col-md-6 mb-2">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="جست و جو بر اساس نام">
                </div>

                <div class="col-md-4 mb-2">
                    <select name="status_id" class="form-select">
                        <option value="">همه</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}" {{ request('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 mb-2 text-end">
                    <button type="submit" class="btn btn-primary w-100">اعمال فیلتر</button>
                </div>
            </form>
            <!-- Make the table responsive on small screens -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>وضعیت</th>
                            <th>بیمارستان</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($people as $person)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->status->name }}</td>
                                <td>{{ $person->hospital }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">موردی یافت نشد.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $people->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</body>
</html>
