<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Usuarios </title>
    <style>
        body {
    font-family: 'Helvetica Neue', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f9fc;
    color: #444;
}

h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 20px;
    font-size: 2.5em;
    letter-spacing: 1px;
}

.container {
    width: 85%;
    margin: 0 auto;
    padding-top: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: white;
    border-radius: 8px;
    padding: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
    font-size: 16px;
}

th {
    background-color: #3b5998;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f4f6f8;
}

tr:hover {
    background-color: #50b3a2;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.header {
    background-color: #3b5998;
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 1.5em;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-bottom: 4px solid #ff6f61;
}

.footer {
    text-align: center;
    padding: 15px;
    font-size: 14px;
    color: #999;
    background-color: #f1f1f1;
    position: fixed;
    bottom: 0;
    width: 100%;
    border-top: 1px solid #ddd;
}

.category {
    font-size: 1.8em;
    color: #34495e;
    margin-bottom: 25px;
    font-weight: 500;
}

    </style>
</head>
<body>

    <div class="container">
        <h1>Reporte de Usuarios</h1>
        
    <!--este formulario si se esta usando para hacer la vista de pdf-->
        <div class="category">
            <strong>recordatorio Seleccionado:</strong> {{ $usuario->first()->usuarios ?? 'No ahi usuarios ' }}
        </div>

        <table>
            <thead>
                <tr>
                <th>nombre</th>,
                <th>email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuario as $usuarios)
                <tr>
                <td>{{ $item->mombre }}</td>
                    <td>{{ $item->email }}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Generado el {{ now()->format('d-m-Y') }}</p>
    </div>

</body>
</html>