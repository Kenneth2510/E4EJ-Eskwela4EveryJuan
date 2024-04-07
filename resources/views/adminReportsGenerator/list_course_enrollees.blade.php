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
            <h2>Course {{$course->course_name}} Enrollees Data</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Enrollment Status</th>
                    <th>Learner Name</th>
                    <th>Date Enrolled</th>
                    <th>Course Progress</th>
                    <th>Date Started</th>

                </tr>
            </thead>
            <tbody>
                @forelse  ($learner_courses as $learner_course)
                <tr>
                    <td>{{ $learner_course->status }}</td>
                    <td>{{ $learner_course->name }}</td>
                    <td>{{ $learner_course->created_at}}</td>
                    <td>{{ $learner_course->course_progress}}</td>
                    <td>{{ $learner_course->start_period }}</td>
                </tr>
                @empty
                    
                @endforelse
                <tr>
                    <td colspan="5">Total: {{ count($learner_courses) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
