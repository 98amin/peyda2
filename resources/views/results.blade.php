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
    <div class="overlay">
        <div class="content">

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
                {{ $people->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</body>
</html>
