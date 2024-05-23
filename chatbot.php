<?php
session_start();


function quitarTildes($cadena) 
{
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýýþÿŔŕ';
    $modificadas = 'AAAAAAACEEEEIIIIDNOOOOOUUUUYbsaaaaaaaceeeeiiiidnoooooouuuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode($cadena);
}

function enlace($enlace, $texto)
{
    return "<a href='".$enlace."' target='_blank'>".$texto."</a>";
}

function analyzeIntent($message) 
{
    $limpio = quitarTildes($message);
    $lowerMensaje = strtolower($limpio);
    $currentState = isset($_SESSION['chatbot-stado']) ? $_SESSION['chatbot-stado'] : 'empezamos';

    switch ($currentState) {
        case 'empezamos':
            if (strpos($lowerMensaje, 'hola') !== false || 
                strpos($lowerMensaje, 'holi') !== false || 
                strpos($lowerMensaje, 'buenas') !== false || 
                strpos($lowerMensaje, 'ola') !== false || 
                strpos($lowerMensaje, 'oli') !== false || 
                strpos($lowerMensaje, 'hey') !== false || 
                strpos($lowerMensaje, 'ey') !== false || 
                strpos($lowerMensaje, 'oye') !== false) {
                $respuestas = ["¡Hola! ¿En qué puedo ayudarte?", "¡Hola! ¿En qué te puedo ayudar?", 
                "Hola me llamo Marco, ¿Necesitas que te ayude con algo?", 
                "¡Hola! ¿Qué puedo hacer por ti?", 
                "¡Hola! ¿Cómo puedo ayudarte hoy?", 
                "¡Hola! ¿Qué te gustaría saber?", 
                "¡Hola! ¿En qué puedo ser de ayuda?"];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            } elseif(strpos($lowerMensaje, 'actua') !== false && strpos($lowerMensaje, 'datos') !== false || 
            strpos($lowerMensaje, 'actua') !== false && strpos($lowerMensaje, 'informac') !== false || 
            strpos($lowerMensaje, 'modif') !== false && strpos($lowerMensaje, 'informac') !== false ||
            strpos($lowerMensaje, 'modif') !== false && strpos($lowerMensaje, 'datos') !== false ||
            strpos($lowerMensaje, 'modifico') !== false && strpos($lowerMensaje, 'datos') !== false ||
            strpos($lowerMensaje, 'modifico') !== false && strpos($lowerMensaje, 'informac') !== false ||
            strpos($lowerMensaje, 'modifico') !== false && strpos($lowerMensaje, 'email') !== false ||
            strpos($lowerMensaje, 'modifico') !== false && strpos($lowerMensaje, 'contra') !== false ||
            strpos($lowerMensaje, 'cambiar') !== false && strpos($lowerMensaje, 'informac') !== false ||
            strpos($lowerMensaje, 'cambiar') !== false && strpos($lowerMensaje, 'datos') !== false ||
            strpos($lowerMensaje, 'cambiar') !== false && strpos($lowerMensaje, 'email') !== false ||
            strpos($lowerMensaje, 'modif') !== false && strpos($lowerMensaje, 'info') !== false ||
            strpos($lowerMensaje, 'cambiar') !== false && strpos($lowerMensaje, 'info') !== false ||
            strpos($lowerMensaje, 'actua') !== false && strpos($lowerMensaje, 'info') !== false ||
            strpos($lowerMensaje, 'modif') !== false && strpos($lowerMensaje, 'contra') !== false ||
            strpos($lowerMensaje, 'cambiar') !== false && strpos($lowerMensaje, 'contra') !== false ||
            strpos($lowerMensaje, 'actua') !== false && strpos($lowerMensaje, 'contra') !== false ||
            strpos($lowerMensaje, 'cambiar') !== false && strpos($lowerMensaje, 'correo') !== false ||
            strpos($lowerMensaje, 'modif') !== false && strpos($lowerMensaje, 'correo') !== false ||
            strpos($lowerMensaje, 'actua') !== false && strpos($lowerMensaje, 'correo') !== false ||
            strpos($lowerMensaje, 'cambiar') !== false && strpos($lowerMensaje, 'foto') !== false ||
            strpos($lowerMensaje, 'modif') !== false && strpos($lowerMensaje, 'foto') !== false ||
            strpos($lowerMensaje, 'actua') !== false && strpos($lowerMensaje, 'foto') !== false){    
                $respuestas = ["si, claro para actualizar tus datos escribenos a este correo: admision@arzobispoloayza.edu.pe", 
                "Sí, con gusto. Para actualizar tus datos, escríbenos a este correo: admision@arzobispoloayza.edu.pe.", 
                "Por supuesto, puedes actualizar tus datos enviando un correo a admision@arzobispoloayza.edu.pe.", 
                "Sí, claro. Envíanos un mensaje a admision@arzobispoloayza.edu.pe para actualizar tus datos.", 
                "Claro, envía un correo a admision@arzobispoloayza.edu.pe para actualizar tus datos.", 
                "Por supuesto, para actualizar tus datos, mándanos un correo a admision@arzobispoloayza.edu.pe.", 
                "Sí, para actualizar tus datos, escríbenos un email a admision@arzobispoloayza.edu.pe."];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            } elseif(strpos($lowerMensaje, 'no') !== false && strpos($lowerMensaje, 'notas') !== false || 
            strpos($lowerMensaje, 'no') !== false && strpos($lowerMensaje, 'nota') !== false ||
            strpos($lowerMensaje, 'mostrar') !== false && strpos($lowerMensaje, 'nota') !== false ||
            strpos($lowerMensaje, 'mostrar') !== false && strpos($lowerMensaje, 'notas') !== false ||
            strpos($lowerMensaje, 'ver') !== false && strpos($lowerMensaje, 'nota') !== false ||
            strpos($lowerMensaje, 'ver') !== false && strpos($lowerMensaje, 'notas') !== false ||
            strpos($lowerMensaje, 'quiero') !== false && strpos($lowerMensaje, 'nota') !== false ||
            strpos($lowerMensaje, 'quiero') !== false && strpos($lowerMensaje, 'notas') !== false ||
            strpos($lowerMensaje, 'visualizar') !== false && strpos($lowerMensaje, 'notas') !== false ||
            strpos($lowerMensaje, 'visualizar') !== false && strpos($lowerMensaje, 'nota') !== false ||
            strpos($lowerMensaje, 'no') !== false && strpos($lowerMensaje, 'calificacion') !== false ||
            strpos($lowerMensaje, 'no') !== false && strpos($lowerMensaje, 'calificaciones') !== false ||
            strpos($lowerMensaje, 'mostrar') !== false && strpos($lowerMensaje, 'calificacion') !== false ||
            strpos($lowerMensaje, 'mostrar') !== false && strpos($lowerMensaje, 'calificaciones') !== false ||
            strpos($lowerMensaje, 'ver') !== false && strpos($lowerMensaje, 'calificacion') !== false ||
            strpos($lowerMensaje, 'ver') !== false && strpos($lowerMensaje, 'calificaciones') !== false ||
            strpos($lowerMensaje, 'quiero') !== false && strpos($lowerMensaje, 'calificacion') !== false ||
            strpos($lowerMensaje, 'quiero') !== false && strpos($lowerMensaje, 'calificaciones') !== false ||
            strpos($lowerMensaje, 'visualizar') !== false && strpos($lowerMensaje, 'calificacion') !== false ||
            strpos($lowerMensaje, 'visualizar') !== false && strpos($lowerMensaje, 'calificaciones') !== false ||
            strpos($lowerMensaje, 'muestran') !== false && strpos($lowerMensaje, 'nota') !== false ||
            strpos($lowerMensaje, 'muestran') !== false && strpos($lowerMensaje, 'notas') !== false ||
            strpos($lowerMensaje, 'muestran') !== false && strpos($lowerMensaje, 'calificacion') !== false ||
            strpos($lowerMensaje, 'muestran') !== false && strpos($lowerMensaje, 'calificaciones') !== false){    
                $respuestas = ["Entiendo, si no puedes visualizar tus notas, por favor envía un correo a: nominas@arzobispoloayza.edu.pe.",
                "De acuerdo, si tienes problemas para ver tus notas, envía un email a: nominas@arzobispoloayza.edu.pe.",
                "Vale, si no puedes ver tus notas, por favor escríbenos a: nominas@arzobispoloayza.edu.pe.",
                "Está bien, si no logras visualizar tus notas, manda un correo a: nominas@arzobispoloayza.edu.pe.",
                "Ohh, si tienes dificultades para ver tus notas, por favor contacta a: nominas@arzobispoloayza.edu.pe.",
                "Entiendo, si no puedes acceder a tus notas, envía un correo a: nominas@arzobispoloayza.edu.pe.",
                "De acuerdo, si no puedes visualizar tus notas, por favor escríbenos a: nominas@arzobispoloayza.edu.pe.",
                "Vale, si no puedes ver tus calificaciones, por favor envía un email a: nominas@arzobispoloayza.edu.pe.",
                "Ok, si no logras ver tus notas, por favor contacta a: nominas@arzobispoloayza.edu.pe.",
                "Entiendo, si tienes problemas para ver tus calificaciones, envía un correo a: nominas@arzobispoloayza.edu.pe."];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            } elseif (strpos($lowerMensaje, 'olvide') !== false && strpos($lowerMensaje, 'contra') !== false || 
            strpos($lowerMensaje, 'acuerdo') !== false && strpos($lowerMensaje, 'contra') !== false || 
            strpos($lowerMensaje, 'no se') !== false && strpos($lowerMensaje, 'contra') !== false || 
            strpos($lowerMensaje, 'olvid') !== false && strpos($lowerMensaje, 'contra') !== false ||
            strpos($lowerMensaje, 'recupe') !== false && strpos($lowerMensaje, 'contra') !== false ||
            strpos($lowerMensaje, 'recupe') !== false && strpos($lowerMensaje, 'pass') !== false ||
            strpos($lowerMensaje, 'recupe') !== false && strpos($lowerMensaje, 'credencia') !== false ||
            strpos($lowerMensaje, 'olvide') !== false && strpos($lowerMensaje, 'passw') !== false || 
            strpos($lowerMensaje, 'auerdo') !== false && strpos($lowerMensaje, 'passw') !== false || 
            strpos($lowerMensaje, 'no se') !== false && strpos($lowerMensaje, 'passw') !== false || 
            strpos($lowerMensaje, 'olvid') !== false && strpos($lowerMensaje, 'passw') !== false || 
            strpos($lowerMensaje, 'olvide') !== false && strpos($lowerMensaje, 'credencia') !== false || 
            strpos($lowerMensaje, 'acuerdo') !== false && strpos($lowerMensaje, 'credencia') !== false || 
            strpos($lowerMensaje, 'no se') !== false && strpos($lowerMensaje, 'credencia') !== false || 
            strpos($lowerMensaje, 'olvid') !== false && strpos($lowerMensaje, 'credencia') !== false) {
                $respuestas = ["Si olvidaste tu contraseña, ", 
                "¿Olvidaste tu contraseña? ", 
                "¿Has olvidado tu contraseña? ", 
                "¿No recuerdas tu contraseña? ", 
                "¿Necesitas restablecer tu contraseña? ", 
                "¿Quieres recuperar tu contraseña? ", 
                "¿Has perdido tu contraseña? "];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria].enlace('https://istalcursos.edu.pe/intranet/auth/forgotPassword', 'haz clic aquí.');
            } elseif (strpos($lowerMensaje, 'obten') !== false && strpos($lowerMensaje, 'codig') !== false || 
            strpos($lowerMensaje, 'tene') !== false && strpos($lowerMensaje, 'codig') !== false || 
            strpos($lowerMensaje, 'sac') !== false && strpos($lowerMensaje, 'codig') !== false ||
            strpos($lowerMensaje, 'teng') !== false && strpos($lowerMensaje, 'codig') !== false) {
                $respuestas = ["Después de completar la matrícula, se entrega al alumno su código en la boleta de pago. El formato del código es de 9 dígitos. Ejemplo: 2016C0342", 
                "Una vez que se haya realizado la matrícula, el alumno recibe su código en la boleta de pago. El código tiene un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Al finalizar la matrícula, se proporciona al alumno su código en la boleta de pago. El código está compuesto por 9 dígitos. Ejemplo: 2016C0342.", 
                "Tras completar la matrícula, se le entrega al alumno su código en la boleta de pago, el cual tiene un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Una vez que la matrícula esté completa, el alumno recibirá su código en la boleta de pago. Este código tiene un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Cuando se realiza la matrícula, el alumno recibe su código en la boleta de pago, con un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Al finalizar la matrícula, el alumno recibe su código en la boleta de pago, el cual tiene un formato de 9 dígitos. Ejemplo: 2016C0342"];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            } elseif (strpos($lowerMensaje, 'acced') !== false && strpos($lowerMensaje, 'intran') !== false || 
            strpos($lowerMensaje, 'entra') !== false && strpos($lowerMensaje, 'intran') !== false || 
            strpos($lowerMensaje, 'ingresa') !== false && strpos($lowerMensaje, 'intran') !== false ||
            strpos($lowerMensaje, 'meter') !== false && strpos($lowerMensaje, 'intran') !== false) {
                $respuestas = ["Para acceder al intranet puedes hacerlo mediante la siguiente dirección ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Para inciar sesión use su código de alumno como usuario y clave.",
                "Visita ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet')." para acceder a la intranet. Inicia sesión con tu código de alumno como usuario y tu clave.",
                "Para ingresar al intranet, ve a ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Utiliza tu código de alumno como usuario y tu clave para iniciar sesión.",
                "Accede al intranet en ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Para iniciar sesión, utiliza tu código de alumno como nombre de usuario y tu clave.",
                "Dirígete a ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet')." para acceder al intranet. Usa tu código de alumno como usuario y tu clave para iniciar sesión.",
                "Puedes ingresar a la intranet mediante ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Inicia sesión con tu código de alumno y tu clave."];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }elseif (strpos($lowerMensaje, 'acced') !== false && strpos($lowerMensaje, 'biblio') !== false || 
            strpos($lowerMensaje, 'entra') !== false && strpos($lowerMensaje, 'biblio') !== false || 
            strpos($lowerMensaje, 'ingresa') !== false && strpos($lowerMensaje, 'biblio') !== false ||
            strpos($lowerMensaje, 'meter') !== false && strpos($lowerMensaje, 'biblio') !== false) {
                $respuestas = ["Para acceder a la Biblioteca Virtual, visita: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Usa tu código de alumno como nombre de usuario y tu clave para iniciar sesión.",
                "Ingresa a la Biblioteca Virtual en: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Utiliza tu código de alumno como usuario y tu clave para entrar.",
                "Puedes acceder a la Biblioteca Virtual a través de: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Inicia sesión con tu código de alumno y tu clave.",
                "Visita ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/')." para acceder a la Biblioteca Virtual. Usa tu código de alumno como nombre de usuario y tu clave para iniciar sesión.",
                "Accede a la Biblioteca Virtual en: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Para iniciar sesión, utiliza tu código de alumno como usuario y tu clave.",
                "Dirígete a ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/')." para entrar a la Biblioteca Virtual. Usa tu código de alumno como nombre de usuario y tu clave."];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }elseif (strpos($lowerMensaje, 'modl') !== false || 
                    strpos($lowerMensaje, 'mood') !== false) {
                $respuestas = ["La plataforma es el aula virtual donde se realizan los cursos, videos, evaluaciones, etc. Accede en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "La plataforma sirve como aula virtual para cursos, videos, evaluaciones, y más. Entra en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "El aula virtual, donde se encuentran los cursos, videos y evaluaciones, está disponible en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Accede al aula virtual para cursos, videos y evaluaciones en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Nuestra plataforma es el aula virtual para cursos, videos y evaluaciones. Visítala en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Encuentra todos los cursos, videos y evaluaciones en nuestra plataforma virtual: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "La plataforma es tu aula virtual para cursos, videos y evaluaciones. Accede aquí: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Para acceder a los cursos, videos y evaluaciones, usa nuestra plataforma en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php')];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }elseif (strpos($lowerMensaje, 'gracia') !== false ||
                strpos($lowerMensaje, 'thank') !== false) {
                    $respuestas = ["No te preocupes, estoy aqui para ayudarte",
                    "Tranquilo, estoy aquí para ayudarte.",
                    "No te preocupes, estoy aquí para apoyarte.",
                    "No te preocupes, estoy a tu disposición para ayudar.",
                    "No te preocupes, estoy aquí para echarte una mano.",
                    "No te preocupes, estoy aquí para ofrecerte ayuda."];
                    $claveAleatoria = array_rand($respuestas);
                    return $respuestas[$claveAleatoria];
            } elseif (strpos($lowerMensaje, 'informacion') !== false || 
                    strpos($lowerMensaje, 'info') !== false ||
                    strpos($lowerMensaje, 'ayud') !== false ||
                    strpos($lowerMensaje, 'auxili') !== false ||
                    strpos($lowerMensaje, 'sos') !== false) {
                $_SESSION['chatbot-stado'] = 'informacion-loayza';
                $respuestas = ["Por favor, selecciona una de estas opciones:<br>
                1 - ¿Cómo obtengo mi código de estudiante?<br>
                2 - ¿Cómo puedo ingresar a la Intranet?<br>
                3 - ¿Cómo puedo restablecer mi contraseña?<br>
                4 - ¿Cómo puedo acceder a la Biblioteca Virtual?<br>
                5 - ¿Cómo puedo actualizar mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Elige una de las siguientes opciones, por favor:<br>
                1 - ¿De qué manera obtengo mi código de alumno?<br>
                2 - ¿Cómo accedo a la Intranet?<br>
                3 - ¿Cómo puedo recuperar mi contraseña?<br>
                4 - ¿Cómo se accede a la Biblioteca Virtual?<br>
                5 - ¿Cómo actualizo mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Seleccione una de estas opciones, por favor:<br>
                1 - ¿Cómo obtener mi código de alumno?<br>
                2 - ¿Cómo ingresar a la Intranet?<br>
                3 - ¿Cómo recuperar mi contraseña?<br>
                4 - ¿Cómo acceder a la Biblioteca Virtual?<br>
                5 - ¿Cómo actualizar mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Por favor, elige una opción:<br>
                1 - ¿Cómo obtengo mi código de estudiante?<br>
                2 - ¿Cómo accedo a la Intranet?<br>
                3 - ¿Cómo recupero mi contraseña?<br>
                4 - ¿Cómo accedo a la Biblioteca Virtual?<br>
                5 - ¿Cómo actualizo mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Seleccione una opción, por favor:<br>
                1 - ¿Cómo puedo obtener mi código de alumno?<br>
                2 - ¿Cómo puedo acceder a la Intranet?<br>
                3 - ¿Cómo puedo restablecer mi contraseña?<br>
                4 - ¿Cómo puedo acceder a la Biblioteca Virtual?<br>
                5 - ¿Cómo puedo actualizar mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?"];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            } elseif (strpos($lowerMensaje, 'matricularme') !== false && strpos($lowerMensaje, 'loayza') !== false) {
                $_SESSION['chatbot-stado'] = 'matricula-loayza-confirmacion';
                return "Por supuesto, hay turno mañana y turno tarde. ¿Deseas matricularte en Loayza? Responde 'sí' o 'no'.";
            } else {
                return "Lo siento, no entendí eso.";
            }
            break;
        case 'informacion-loayza':
            if (strpos($lowerMensaje, '1') !== false) {
                unset($_SESSION['chatbot-stado']);
                $respuestas = ["Después de completar la matrícula, se entrega al alumno su código en la boleta de pago. El formato del código es de 9 dígitos. Ejemplo: 2016C0342", 
                "Una vez que se haya realizado la matrícula, el alumno recibe su código en la boleta de pago. El código tiene un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Al finalizar la matrícula, se proporciona al alumno su código en la boleta de pago. El código está compuesto por 9 dígitos. Ejemplo: 2016C0342.", 
                "Tras completar la matrícula, se le entrega al alumno su código en la boleta de pago, el cual tiene un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Una vez que la matrícula esté completa, el alumno recibirá su código en la boleta de pago. Este código tiene un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Cuando se realiza la matrícula, el alumno recibe su código en la boleta de pago, con un formato de 9 dígitos. Ejemplo: 2016C0342.", 
                "Al finalizar la matrícula, el alumno recibe su código en la boleta de pago, el cual tiene un formato de 9 dígitos. Ejemplo: 2016C0342"];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            } elseif (strpos($lowerMensaje, '2') !== false) {
                unset($_SESSION['chatbot-stado']);
                $respuestas = ["Para acceder al intranet puedes hacerlo mediante la siguiente dirección ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Para inciar sesión use su código de alumno como usuario y clave.",
                "Visita ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet')." para acceder a la intranet. Inicia sesión con tu código de alumno como usuario y tu clave.",
                "Para ingresar al intranet, ve a ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Utiliza tu código de alumno como usuario y tu clave para iniciar sesión.",
                "Accede al intranet en ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Para iniciar sesión, utiliza tu código de alumno como nombre de usuario y tu clave.",
                "Dirígete a ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet')." para acceder al intranet. Usa tu código de alumno como usuario y tu clave para iniciar sesión.",
                "Puedes ingresar a la intranet mediante ".enlace('https://istalcursos.edu.pe/intranet', 'https://istalcursos.edu.pe/intranet').". Inicia sesión con tu código de alumno y tu clave."];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }elseif (strpos($lowerMensaje, '3') !== false) {
                unset($_SESSION['chatbot-stado']);
                $respuestas = ["Si olvidaste tu contraseña, ", 
                "¿Olvidaste tu contraseña? ", 
                "¿Has olvidado tu contraseña? ", 
                "¿No recuerdas tu contraseña? ", 
                "¿Necesitas restablecer tu contraseña? ", 
                "¿Quieres recuperar tu contraseña? ", 
                "¿Has perdido tu contraseña? "];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria].enlace('https://istalcursos.edu.pe/intranet/auth/forgotPassword', 'haz clic aquí.');
            }elseif (strpos($lowerMensaje, '4') !== false) {
                unset($_SESSION['chatbot-stado']);
                $respuestas = ["Para acceder a la Biblioteca Virtual, visita: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Usa tu código de alumno como nombre de usuario y tu clave para iniciar sesión.",
                "Ingresa a la Biblioteca Virtual en: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Utiliza tu código de alumno como usuario y tu clave para entrar.",
                "Puedes acceder a la Biblioteca Virtual a través de: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Inicia sesión con tu código de alumno y tu clave.",
                "Visita ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/')." para acceder a la Biblioteca Virtual. Usa tu código de alumno como nombre de usuario y tu clave para iniciar sesión.",
                "Accede a la Biblioteca Virtual en: ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/').". Para iniciar sesión, utiliza tu código de alumno como usuario y tu clave.",
                "Dirígete a ".enlace('http://istalcursos.edu.pe/bibliotecaial/', 'http://istalcursos.edu.pe/bibliotecaial/')." para entrar a la Biblioteca Virtual. Usa tu código de alumno como nombre de usuario y tu clave."];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }elseif (strpos($lowerMensaje, '5') !== false) {
                unset($_SESSION['chatbot-stado']);
                $respuestas = ["si, claro para actualizar tus datos escribenos a este correo: admision@arzobispoloayza.edu.pe", 
                "Sí, con gusto. Para actualizar tus datos, escríbenos a este correo: admision@arzobispoloayza.edu.pe.", 
                "Por supuesto, puedes actualizar tus datos enviando un correo a admision@arzobispoloayza.edu.pe.", 
                "Sí, claro. Envíanos un mensaje a admision@arzobispoloayza.edu.pe para actualizar tus datos.", 
                "Claro, envía un correo a admision@arzobispoloayza.edu.pe para actualizar tus datos.", 
                "Por supuesto, para actualizar tus datos, mándanos un correo a admision@arzobispoloayza.edu.pe.", 
                "Sí, para actualizar tus datos, escríbenos un email a admision@arzobispoloayza.edu.pe."];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }elseif (strpos($lowerMensaje, '6') !== false) {
                unset($_SESSION['chatbot-stado']);
                $respuestas = ["La plataforma es el aula virtual donde se realizan los cursos, videos, evaluaciones, etc. Accede en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "La plataforma sirve como aula virtual para cursos, videos, evaluaciones, y más. Entra en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "El aula virtual, donde se encuentran los cursos, videos y evaluaciones, está disponible en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Accede al aula virtual para cursos, videos y evaluaciones en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Nuestra plataforma es el aula virtual para cursos, videos y evaluaciones. Visítala en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Encuentra todos los cursos, videos y evaluaciones en nuestra plataforma virtual: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "La plataforma es tu aula virtual para cursos, videos y evaluaciones. Accede aquí: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php'),
                    "Para acceder a los cursos, videos y evaluaciones, usa nuestra plataforma en: ".enlace('https://loayzavirtual.edu.pe/login/index.php', 'https://loayzavirtual.edu.pe/login/index.php')];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }else {
                $respuestas = ["Por favor, selecciona una de estas opciones:<br>
                1 - ¿Cómo obtengo mi código de estudiante?<br>
                2 - ¿Cómo puedo ingresar a la Intranet?<br>
                3 - ¿Cómo puedo restablecer mi contraseña?<br>
                4 - ¿Cómo puedo acceder a la Biblioteca Virtual?<br>
                5 - ¿Cómo puedo actualizar mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Elige una de las siguientes opciones, por favor:<br>
                1 - ¿De qué manera obtengo mi código de alumno?<br>
                2 - ¿Cómo accedo a la Intranet?<br>
                3 - ¿Cómo puedo recuperar mi contraseña?<br>
                4 - ¿Cómo se accede a la Biblioteca Virtual?<br>
                5 - ¿Cómo actualizo mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Seleccione una de estas opciones, por favor:<br>
                1 - ¿Cómo obtener mi código de alumno?<br>
                2 - ¿Cómo ingresar a la Intranet?<br>
                3 - ¿Cómo recuperar mi contraseña?<br>
                4 - ¿Cómo acceder a la Biblioteca Virtual?<br>
                5 - ¿Cómo actualizar mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Por favor, elige una opción:<br>
                1 - ¿Cómo obtengo mi código de estudiante?<br>
                2 - ¿Cómo accedo a la Intranet?<br>
                3 - ¿Cómo recupero mi contraseña?<br>
                4 - ¿Cómo accedo a la Biblioteca Virtual?<br>
                5 - ¿Cómo actualizo mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?",
                "Seleccione una opción, por favor:<br>
                1 - ¿Cómo puedo obtener mi código de alumno?<br>
                2 - ¿Cómo puedo acceder a la Intranet?<br>
                3 - ¿Cómo puedo restablecer mi contraseña?<br>
                4 - ¿Cómo puedo acceder a la Biblioteca Virtual?<br>
                5 - ¿Cómo puedo actualizar mi información personal en la Intranet?<br>
                6 - ¿Qué es la plataforma Moodle?"];
                $claveAleatoria = array_rand($respuestas);
                return $respuestas[$claveAleatoria];
            }
            break;
        case 'matricula-loayza-confirmacion':
            if (strpos($lowerMensaje, 'si') !== false) {
                unset($_SESSION['chatbot-stado']);
                return "¡Gracias! Tu matrícula ha sido confirmada.";
            } elseif (strpos($lowerMensaje, 'no') !== false) {
                unset($_SESSION['chatbot-stado']);
                return "Entendido. Si necesitas más ayuda, no dudes en preguntar.";
            } else {
                return "Lo siento, no entendí eso. ¿Deseas matricularte en Loayza? Responde 'sí' o 'no'.";
            }
            break;
        default:
            return "Lo siento, ha ocurrido un error.";
    }
}

$userMessage = isset($_POST['message']) ? $_POST['message'] : '';
$botResponse = analyzeIntent($userMessage);
echo $botResponse;
