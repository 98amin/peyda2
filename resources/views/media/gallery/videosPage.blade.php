<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>گالری</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <style>
        .gallery-item {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }

        .video-wrapper, .image-wrapper {
            overflow: hidden;
            border-radius: 8px;
        }

        .video-wrapper video {
            width: 100%; /* Take full width of the parent */
            height: 200px; /* Fixed height for videos */
            object-fit: cover; /* Ensure content fits within the box */
            display: block;
        }
    </style>
</head>
<body class="container py-4">

    <h2 class="text-center mb-4">گالری تصاویر و ویدیوها</h2>

    <div class="row g-3">
        @foreach($media as $item)
            <div class="col-6 col-md-4 col-lg-3">
                @if($item['type'] === 'image')
                    <div class="image-wrapper">
                        <img src="{{ asset($item['path']) }}" alt="media" class="gallery-item">
                    </div>
                @elseif($item['type'] === 'video')
                    <div class="video-wrapper">
                        <video class="gallery-item" controls>
                            <source src="{{ asset($item['path']) }}" type="video/mp4">
                            مرورگر شما از نمایش ویدیو پشتیبانی نمی‌کند.
                        </video>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</body>
</html>
