<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet"
          href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">

    <script src="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css"></script>
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#153643"
                        style="padding: 40px 0 30px 0; color: #fffcf9; font-size: 20px; font-weight: bold; font-family: Arial, sans-serif;">
                        ¡Mensaje de Plataforma de Ticket Unidad Informática!
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 20px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                             <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 20px;">
                                    <br><br>
                                    <div bgcolor="#153643" class="callout callout-success">
                                        <h3>¡Peticion de Servicio!</h3>
                                        <p><small>Se ha Realizado una solicitud para el servicio: <b>{{ $data['nombre_servicio'] }}</b>.</small></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td width="260" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td>
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 20px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                            <ul>
                                                                <li>
                                                                    <small><b>Fecha / Hora Solicitud de Soporte:</b>
                                                                        <br>{{ $data['fecCreaSop'] }}</small>    
                                                                        
                                                                </li>
                                                                <li>
                                                                    <small><b>Funcionario Solicitante:</b>
                                                                        <br>{{ $data['name'] }}</small>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="font-size: 0; line-height: 0;" width="20">
                                                &nbsp;
                                            </td>
                                            <td width="260" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td>
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 20px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                            <ul>
                                                                <li>
                                                                   <small><b>Contacto Profesional:</b>
                                                                        <br>{{ $data['email'] }} {{ $data['anexo']}}
                                                                    </small>
                                                                </li>
                                                                <li>
                                                                    <small><b>Adjuntos:</b>
                                                                        <br>@if ($data['ajuntos'] == 1)
                                                                            Solicitud Contiene Adjuntos
                                                                            @else 
                                                                            Solicitud sin Adjuntos
                                                                            @endif
                                                                    </small>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                              
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <ul>
                                                   <li>
                                                    <small><b>Motivo:</b>
                                                     <br><p>
                                                            {{$data['motivo']}}
                                                        </p>
                                                    </small>
                                                    </li>
                                                 </ul>
                                            </td> 
                                        </tr>    
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#73BA5D" style="padding: 20px 20px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;"
                                    width="75%">
                                    &reg; 2019, Unidad Informática -<br/>
                                    <a href="#" style="color: #ffffff;"><font color="#ffffff">Plataforma de Soporte
                                            Informática</font></a> Gobierno Regional del Biobío.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!--analytics-->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://tutsplus.github.io/github-analytics/ga-tracking.min.js"></script>

</body>
</html>
