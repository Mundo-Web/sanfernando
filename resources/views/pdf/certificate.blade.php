<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Certificado de Finalización</title>
  <style>
   body {
  font-family: Arial, sans-serif;
}

.container {
  margin-left: auto;
  margin-right: auto;
  display: flex;
  justify-content: center;
}

.diploma {
  width: 1000px;
  height: 700px;
  display: flex;
}

.diploma-left {
  width: 150px;
  height: 100%;
  background-color: #CF072C;
  border-top-right-radius: 50px;
  background-size: cover;
  background-image: url('images/img/fondoizquierdo.png');
}

.diploma-right {
  width: 850px;
  height: 100%;
  padding: 2rem;
  position: relative;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo img {
  width: 200px;
}

.qr-code img {
  width: 90px;
}

.title {
  color: #CF072C;
  text-transform: uppercase;
  font-size: 30px;
  text-align: center;
  font-weight: bold;
  max-width: 700px;
  margin: 0 auto;
}

.description {
  font-size: 17px;
  color: black;
  text-align: center;
  max-width: 700px;
  margin: 0 auto;
}

.highlighted {
  text-transform: uppercase;
  font-style: italic;
  font-weight: bold;
  font-size: 18px;
}

.student-name {
  text-align: center;
  font-size: 25px;
  font-weight: bold;
  margin: 0 auto;
}

.signatures {
  display: flex;
  justify-content: center;
  gap: 2rem;
  margin-top: 4rem;
}

.signature {
  text-align: center;
  color: black;
  font-size: 18px;
  font-weight: bold;
  border-top: 1px solid black;
  width: 250px;
}

.signature span {
  font-weight: normal;
  font-size: 17px;
}

.certifications h2 {
  font-weight: 600;
  font-size: 17px;
}

.certificates {
  margin-top: 0.75rem;
  display: flex;
  gap: 1.25rem;
}

.certificates img {
  width: 4.5rem;
}

.puntos-derecha {
  position: absolute;
  top: 8rem;
  right: 0;
}

.puntos-derecha img {
  width: 25px;
}
  </style>
</head>

{{-- <body class="bg-white">

  <div style="margin-left: auto; margin-right: auto;">
    <div style="width: 1000px; height: 650px; display: flex; margin-left: auto; margin-right: auto; margin-top: 2.5rem; margin-bottom: 2.5rem;">
        <div style="width: 150px; height: 100%; background-color: #CF072C; border-top-right-radius: 50px; background-size: cover; background-image: url({{asset('images/img/fondoizquierdo.png')}});">
        </div>
        <div style="width: 850px; height: 100%; padding-left: 5rem; padding-right: 5rem; padding-top: 2.5rem; padding-bottom: 2.5rem; position: relative;">
            <div style="display: flex; flex-direction: column; gap: 3rem; align-items: flex-start; justify-content: center;">
                <div style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; align-items: center;">
                    <div style="width: 200px;">
                        <img src="{{asset('images/img/logorojordiploma.png')}}" alt="logo" style="width: 100%;" />
                    </div>
                    <div style="width: 90px;">
                        <img src="{{asset('images/img/qrprueba.png')}}" alt="logo" style="width: 100%;" />
                    </div>
                </div>
                <div style="color: #CF072C; text-transform: uppercase; font-size: 2.25rem; text-align: center; font-weight: bold; margin-left: auto; margin-right: auto;">
                    DIPLOMADO EN {{ $attemp->evaluation->course->producto }}
                </div>
                <div style="font-size: 1.25rem; color: black; padding-left: 0.75rem; padding-right: 0.75rem; max-width: 700px; text-align: center; margin-left: auto; margin-right: auto;">
                    En mérito a su participación en nuestro <span style="text-transform: uppercase; font-style: italic; font-weight: bold; font-size: 1.875rem;">{{ $attemp->evaluation->course->producto }}.</span>
                    <br>Organizado por EGESPP, con una duracion de {{ $attemp->evaluation->course->duration / 60 }} horas lectivas del {{ date('Y') }}.
                </div>
                <div style="text-align: center; font-size: 1.875rem; font-weight: bold; width: 100%; margin-left: auto; margin-right: auto;">
                    {{ $attemp->user->name }} {{ $attemp->user->lastname }}
                </div>
                <div style="display: flex; flex-direction: row; gap: 5rem; margin-top: 4rem;">
                    <div style="text-align: center; color: black; font-size: 1.25rem; font-weight: bold; border-top: 1px solid black; width: 250px;">
                        Gerente General<br>
                        <span style="font-weight: normal; font-size: 1.125rem;">Patricia Heredia Olivera</span>
                    </div>
                    <div style="text-align: center; color: black; font-size: 1.25rem; font-weight: bold; border-top: 1px solid black; width: 250px;">
                        Sub. Gerente Académico<br>
                        <span style="font-weight: normal; font-size: 1.125rem;">Edwin Chichipe Salazar</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-weight: 600; font-size: 1.125rem;">Nuestros Convenios</h2>
                    <div style="margin-top: 0.75rem; display: flex; flex-direction: row; gap: 1.25rem;">
                        <img src="{{asset('images/img/certif.png')}}" alt="certif_1" style="width: 5rem;" />
                        <img src="{{asset('images/img/certif.png')}}" alt="certif_1" style="width: 5rem;" />
                        <img src="{{asset('images/img/certif.png')}}" alt="certif_1" style="width: 5rem;" />
                    </div>
                </div>
            </div>
            <div style="position: absolute; top: 5rem; right: 0;">
                <img src="{{asset('images/img/puntosderecha.png')}}" alt="logo" style="width: 25px" />
            </div>
        </div>
    </div>
</div>

</body> --}}
 {{-- <img
                    src="https://api.qrserver.com/v1/create-qr-code/?data={{ rawurlencode(env('APP_NAME') . '/certificate/' . $attemp->id) }}"
                    alt="Logo" class="logo-image" loading="lazy" /> --}}

<body>
  <div class="container">
    
     <div class="diploma">
       
            <div class="diploma-left"></div>
            <div class="diploma-right">
                    <table style="width: 100%">
                        <tbody>
                        <tr>
                            <td align="left" style="vertical-align: middle">
                                <div class="logo">
                                    <img src="images/img/logorojodiploma.png" alt="logo" />
                                </div>
                            </td>
                            <td align="right" style="vertical-align: middle; margin-right:25px">
                                <div class="qr-code">
                                    <img src="images/img/qrprueba.png" alt="QR Code" />
                                </div>
                            </td>
                        
                        </tr>
                        </tbody>
                    </table>    
                   
                    <div class="title">
                        DIPLOMADO EN REACT AVANZADO REACT AVANZADO REACT AVANZADO
                    </div>

                    <div class="description">
                        En mérito a su participación en nuestro
                        <span class="highlighted">REACT AVANZADO</span>. <br />
                        Organizado por EGESPP, con una duración de 300 horas lectivas del 2024.
                    </div>

                    <div class="student-name">DIEGO MARTINEZ RAYME</div>

                    <div class="signatures">
                        <div class="signature">
                            Gerente General <br />
                            <span>Patricia Heredia Olivera</span>
                        </div>
                        <div class="signature">
                            Sub. Gerente Académico <br />
                            <span>Edwin Chichipe Salazar</span>
                        </div>
                    </div>

                    <div class="certifications">
                        <h2>Nuestros Convenios</h2>
                        <div class="certificates">
                            <img src="images/img/certif.png" alt="certif_1" />
                            <img src="images/img/certif.png" alt="certif_2" />
                            <img src="images/img/certif.png" alt="certif_3" />
                        </div>
                    </div>
                    
                    <div class="puntos-derecha">
                        <img src="images/img/puntosderecha.png" alt="puntos" />
                    </div>

            </div>
       
     </div>
   
  </div>
</body>


</html>
