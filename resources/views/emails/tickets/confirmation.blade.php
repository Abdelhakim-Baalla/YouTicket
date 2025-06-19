@php
    $primaryColor = '#6366F1'; // Violet YouTicket
    $secondaryColor = '#8B5CF6'; // Violet plus clair
    $bgColor = '#F9FAFB'; // Fond légèrement grisé
    $cardBg = '#FFFFFF'; // Fond de carte blanc
    $textColor = '#111827'; // Texte foncé
    $lightText = '#6B7280'; // Texte secondaire
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Mêmes balises meta et styles que précédemment -->
    <title>Confirmation de création de ticket</title>
</head>
<body style="min-width:100%;Margin:0px;padding:0px;background-color:{{ $bgColor }};">
<!-- Structure similaire à l'email précédent -->
<table role="presentation" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="card" role="presentation" cellpadding="0" cellspacing="0" style="width:400px;background-color:{{ $cardBg }};border-radius:12px;border:1px solid #E5E7EB;padding:40px;">
                <tr>
                    <td align="center">
                        <h1 style="font-family:Inter,sans-serif;color:{{ $textColor }};font-size:24px;font-weight:600;margin-bottom:20px;">Votre ticket a été créé avec succès</h1>
                        <p style="font-family:Inter,sans-serif;color:{{ $lightText }};font-size:15px;line-height:22px;">
                            Bonjour {{ $user->prenom }},<br>
                            Votre ticket #{{ $ticket->id }} a bien été enregistré dans notre système.
                        </p>
                        
                        <div style="margin:30px 0;">
                            <a href="{{ $ticketUrl }}" style="background:linear-gradient(135deg, {{ $primaryColor }} 0%, {{ $secondaryColor }} 100%);color:#FFFFFF;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:700;font-size:15px;display:inline-block;">
                                Voir mon ticket
                            </a>
                        </div>
                        
                        <p style="font-family:Inter,sans-serif;color:{{ $lightText }};font-size:14px;line-height:22px;">
                            <strong>Titre :</strong> {{ $ticket->titre }}<br>
                            <strong>Priorité :</strong> {{ $ticket->priorite->nom }}<br>
                            <strong>Date de création :</strong> {{ $ticket->created_at->format('d/m/Y H:i') }}
                        </p>
                        
                        <p style="font-family:Inter,sans-serif;color:{{ $lightText }};font-size:12px;margin-top:30px;">
                            Vous recevez cet email car vous avez créé un ticket sur YouTicket.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- Footer identique à l'email précédent -->
</body>
</html>