<!DOCTYPE html>
<html>

<head>
    <title>Calculadora</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }

        .calculadora {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .pantalla {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            text-align: right;
            font-size: 24px;
            border-radius: 5px;
            min-height: 40px;
        }

        .botones {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        button {
            padding: 15px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #666;
            color: white;
        }

        button:hover {
            background-color: #777;
        }

        .operador {
            background-color: #ff9500;
        }

        .operador:hover {
            background-color: #ffaa33;
        }

        .igual {
            background-color: #2196F3;
        }

        .igual:hover {
            background-color: #1976D2;
        }

        .limpiar {
            background-color: #ff4444;
        }

        .limpiar:hover {
            background-color: #ff6666;
        }
    </style>
</head>

<body>
    <div class="calculadora">
        <div class="pantalla" id="pantalla">0</div>
        <div class="botones">
            <button class="limpiar" onclick="limpiar()">C</button>
            <button onclick="agregarOperador('(')">(</button>
            <button onclick="agregarOperador(')')">)</button>
            <button class="operador" onclick="agregarOperador('/')">÷</button>

            <button onclick="agregarNumero('7')">7</button>
            <button onclick="agregarNumero('8')">8</button>
            <button onclick="agregarNumero('9')">9</button>
            <button class="operador" onclick="agregarOperador('*')">×</button>

            <button onclick="agregarNumero('4')">4</button>
            <button onclick="agregarNumero('5')">5</button>
            <button onclick="agregarNumero('6')">6</button>
            <button class="operador" onclick="agregarOperador('-')">-</button>

            <button onclick="agregarNumero('1')">1</button>
            <button onclick="agregarNumero('2')">2</button>
            <button onclick="agregarNumero('3')">3</button>
            <button class="operador" onclick="agregarOperador('+')">+</button>

            <button onclick="agregarNumero('0')">0</button>
            <button onclick="agregarNumero('.')">.</button>
            <button onclick="borrarUltimo()">←</button>
            <button class="igual" onclick="calcular()">=</button>
        </div>
    </div>

    <script>
        let pantalla = document.getElementById('pantalla');
        let operacionActual = '0';

        function actualizarPantalla() {
            pantalla.textContent = operacionActual;
        }

        function agregarNumero(num) {
            if (operacionActual === '0') {
                operacionActual = num;
            } else {
                operacionActual += num;
            }
            actualizarPantalla();
        }

        function agregarOperador(op) {
            operacionActual += op;
            actualizarPantalla();
        }

        function limpiar() {
            operacionActual = '0';
            actualizarPantalla();
        }

        function borrarUltimo() {
            operacionActual = operacionActual.slice(0, -1);
            if (operacionActual === '') {
                operacionActual = '0';
            }
            actualizarPantalla();
        }

        function calcular() {
            try {
                operacionActual = eval(operacionActual).toString();
                actualizarPantalla();
            } catch (error) {
                operacionActual = 'Error';
                actualizarPantalla();
                setTimeout(limpiar, 1500);
            }
        }
    </script>
</body>

</html>