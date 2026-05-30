<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="x-apple-disable-message-reformatting">
  <meta name="color-scheme" content="light dark">
  <meta name="supported-color-schemes" content="light dark">
  <title></title>
  <style type="text/css">
    :root { color-scheme: light dark; }
    html, body { margin: 0 auto !important; padding: 0 !important; width: 100% !important; font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #333333; background-color: #ffffff; }
    .email-bg { background-color: #ffffff; }
    table { border-spacing: 0 !important; border-collapse: collapse !important; margin: 0 auto !important; }
    table, td { mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; }
    a, a:link, a:visited { color: #888888; text-decoration: none !important; }

    /* Dark Mode */
    @media (prefers-color-scheme: dark) {
      body { background-color: #1c1c1c !important; color: #eeeeee !important; }
      .email-bg { background-color: #424a4d !important; }
      .email-body { background-color: #2a2a2a !important; color: #eeeeee !important; }
      .email-text { color: #eeeeee !important; }
      .email-subtext { color: #aaaaaa !important; }
      .sig-td { background-color: #2a2a2a !important; border-top: 1px solid #444 !important; }
      .sig-text { color: #aaaaaa !important; }
      .sig-bold { color: #aaaaaa !important; }
      .orange { color: #fb923c !important; }
      a, a:link, a:visited { color: #aaaaaa !important; }
    }
    [data-ogsc] body { background-color: #1c1c1c !important; color: #eeeeee !important; }
  </style>
</head>
<body class="email-bg" style="margin:0; padding:0; background-color:#ffffff;">
<center style="width:100%;">
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
      <td class="email-bg" style="background-color:#ffffff; padding:24px 0 0 0;;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width:600px; width:100%; margin:0 auto;">

          <!-- Header -->
          <tr>
            <td style="background-color:#424a4d; padding:24px 32px; border-radius:6px;">
              <span style="font-family:monospace; font-size:20px; font-weight:bold; color:#ffffff;">
                <font color="#fb923c">[</font>web<font color="#fb923c">]</font>work
              </span>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="email-body" style="background-color:#ffffff; padding:32px; color:#333333;">
              <p class="email-text" style="margin:0 0 16px 0; color:#333333;">Hallo {{ $data['name'] }},</p>
              <p class="email-text" style="margin:0 0 16px 0; color:#333333;">vielen Dank für Ihre Anfrage! Ich habe Ihre Nachricht erhalten und melde mich so bald wie möglich bei Ihnen.</p>
              <p class="email-subtext" style="margin:24px 0 8px 0; color:#999999; font-size:12px; text-transform:uppercase; letter-spacing:1px;">Ihre Nachricht</p>
              <div class="msg-box" style="background-color:#f5f5f5; padding:16px; border-radius:6px; white-space:pre-wrap; font-size:14px; color:#333333; line-height:1.5;">{{ $data['message'] }}</div>
            </td>
          </tr>

          <!-- Signatur -->
          <tr>
            <td class="sig-td" style="background-color:#ffffff; padding:16px 32px 24px 32px; border-top:1px solid #eeeeee; border-radius:0 0 6px 6px;">
              <span class="sig-bold" style="font-size:13px; color:#888888; font-family:Arial,sans-serif;">
                <b class="sig-bold" style="color:#888888;">Mit besten Grüßen</b><br><br>
                <b class="sig-bold" style="color:#888888;">Beate Rohrmoser</b>
                <span class="sig-text" style="color:#888888;"> | B.Sc. Web- und Medieninformatik</span><br>
                <b class="sig-bold" style="color:#888888;"><font color="#fb923c">[</font>web<font color="#fb923c">]</font>work</b>
                <span class="sig-text" style="color:#888888;"> | Beate Rohrmoser Webpublishing | Dekan-Imminger-Str. 15 | DE-83607 Holzkirchen</span><br>
                <span class="sig-text" style="color:#888888;">Tel. 08024 4688225 | </span>
                <a href="mailto:mail@webwork-oberland.de" style="color:#888888;">mail@webwork-oberland.de</a>
                <span class="sig-text" style="color:#888888;"> | </span>
                <a href="https://www.webwork-oberland.de" style="color:#888888;">www.webwork-oberland.de</a>
              </span>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</center>
</body>
</html>
