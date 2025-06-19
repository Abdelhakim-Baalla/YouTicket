@php
    $primaryColor = '#6366F1';
    $secondaryColor = '#8B5CF6';
    $bgColor = '#F9FAFB';
    $cardBg = '#FFFFFF';
    $textColor = '#111827';
    $lightText = '#6B7280';
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Mêmes balises meta et styles que précédemment -->
    <title>Ticket modifié</title>
</head>
<body style="min-width:100%;Margin:0px;padding:0px;background-color:{{ $bgColor }};">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="card" role="presentation" cellpadding="0" cellspacing="0" style="width:400px;background-color:{{ $cardBg }};border-radius:12px;border:1px solid #E5E7EB;padding:40px;">
                <tr>
                    <td align="center">
                        <h1 style="font-family:Inter,sans-serif;color:{{ $textColor }};font-size:24px;font-weight:600;margin-bottom:20px;">Ticket #{{ $ticket->id }} modifié</h1>
                        <p style="font-family:Inter,sans-serif;color:{{ $lightText }};font-size:15px;line-height:22px;">
                            Bonjour {{ $agent->prenom }},<br>
                            Le ticket qui vous est assigné a été mis à jour.
                        </p>
                        
                       
                        
                        <div style="margin:30px 0;">
                            <a href="{{ $ticketUrl }}" style="background:linear-gradient(135deg, {{ $primaryColor }} 0%, {{ $secondaryColor }} 100%);color:#FFFFFF;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:700;font-size:15px;display:inline-block;">
                                Examiner le ticket
                            </a>
                        </div>
                        
                        <p style="font-family:Inter,sans-serif;color:{{ $lightText }};font-size:12px;">
                            Modifié par : {{ $modifiedBy->prenom }}  {{ $modifiedBy->nom }} à {{ now()->format('H:i') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- Footer identique -->
</body>
</html>