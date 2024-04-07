<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        /* Reset default margin and padding */
        body, h1, h2, h3, h4, h5, h6, p, table, th, td {
            margin: 0;
            padding: 0;
        }

        /* Set font family */
        body {
            font-family: Arial, sans-serif;
        }

        /* Set basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Set styling for the headings */
        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 10px;
        }

        /* Set styling for the container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Set styling for the header */
        .header {
            background-color: #f7f7f7;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Set styling for the title */
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #025c26;
        }

        /* Set styling for the table headings */
        .table-head {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        /* Set styling for the table rows */
        .table-row {
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="datetime">
            <?php echo date('Y-m-d H:i:s'); ?>
        </div>
        <div class="header">
            <h1 class="title">Eskwela4EveryJuan</h1>
            <h2>Course Data</h2>
        </div>

        <div class="container">
            <div class="header">
                <h1 class="title">{{ $courseData->course_name }}</h1>
                <h2>Course Details</h2>
            </div>
    
            <div>
                <h3>Course Information</h3>
                <p><strong>Course ID:</strong> {{ $courseData->course_id }}</p>
                <p><strong>Course Status:</strong> {{ $courseData->course_status }}</p>
                <p><strong>Course Difficulty:</strong> {{ $courseData->course_difficulty}}</p>
                <p><strong>Date Created:</strong> {{ $courseData->created_at }}</p>
                <p><strong>Course Description:</strong><br> {{ $courseData->course_description }}</p>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <div>
                <h3>Syllabus Contents</h3>
                <table>
                    <thead>
                        <th>Topic ID</th>
                        <th>Category</th>
                        <th>Topic Title</th>
                    </thead>
                    <tbody>
                        @forelse ($syllabusData as $syllabus)
                            <tr>
                                <td>{{$syllabus->topic_id}}</td>
                                <td>{{$syllabus->category}}</td>
                                <td>{{$syllabus->topic_title}}</td>\
                            </tr>
                        @empty
                            <tr>
                                <td>No Course Syllabus Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>