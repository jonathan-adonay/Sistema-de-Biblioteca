<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de detalle prestamo</title>
    <style>
    table {
    width: 100%;
    font-size: 16px;
    border-collapse: collapse; /* Ajuste de estilo de colapso */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
    border-radius: 8px; /* Bordes redondeados */
    overflow: hidden; /* Oculta bordes redondeados correctamente */
}

th {
    background-color: #f4a261; /* Color burlywood modificado para un tono más moderno */
    border: none;
    color: white; /* Texto en blanco para mejor contraste */
    padding: 12px 15px;
    text-align: left;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 14px;
}

td {
    border: none; /* Sin bordes internos */
    padding: 12px 15px;
    background-color: #f9f9f9; /* Fondo suave para filas */
    color: #333;
}

tr:nth-child(even) {
    background-color: #f0f0f0; /* Alterna color en filas pares */
}

tr:hover {
    background-color: #e76f51; /* Color de fondo al pasar el ratón */
    color: white;
    transition: background-color 0.3s ease;
}
</style>
</head>

<body>
    <h1 align="center">Listado de Detalle de prestamos</h1>
    <hr><br>
    <table>
                <tr>
                <th>prestamo_id</th> 
                <th>libro_id</th>
                <th>cantidad</th>
                <th>estado_libro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item['prestamo_id']}}</td>
                    <td>{{ $item['libro_id']}}</td>
                    <td>{{ $item['cantidad']}}</td>
                    <td>{{ $item['estado_libro']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>