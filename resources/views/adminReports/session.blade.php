<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Data</title>
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
            <h2>Session Data</h2>
        </div>
        <table>
            <thead>
                <tr class="table-head">
                    <th>User ID</th>
                    <th>User Type</th>
                    <th>Name</th>
                    <th>Session In</th>
                    <th>Session Out</th>
                    <th>Time Difference</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sessionData as $session)
                <tr class="table-row">
                    <td>{{ $session->session_user_id }}</td>
                    <td>{{ $session->session_user_type }}</td>
                    <td>{{ $session->session_user_type === 'LEARNER' ? $session->learner_name : $session->instructor_name }}</td>
                    <td>{{ $session->session_in }}</td>
                    <td>{{ $session->session_out }}</td>
                    <td>
                        @if ($session->time_difference !== null)
                            {{ gmdate("H:i:s", $session->time_difference) }}
                        @endif
                    </td>
                </tr>
                @empty
                    <tr>
                        <td>No session logs available</td>
                    </tr>
                @endforelse 
                <tr>
                    <td colspan="6">Total: {{ count($sessionData) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
