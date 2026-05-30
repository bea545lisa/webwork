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
    a, a:link, a:visited { color: #fb923c; text-decoration: none !important; }

    @media (prefers-color-scheme: dark) {
      body { background-color: #1c1c1c !important; color: #eeeeee !important; }
      .email-bg { background-color: #424a4d !important; }
      .email-body { background-color: #2a2a2a !important; color: #eeeeee !important; }
      .email-text { color: #eeeeee !important; }
      .label { color: #aaaaaa !important; }
      .msg-box { background-color: #2a2a2a !important; color: #ffffff !important; border: none !important; }
      .orange { color: #fb923c !important; }
      a, a:link, a:visited { color: #fb923c !important; }
    }
  </style>
</head>
<body class="email-bg" style="margin:0; padding:0; background-color:#ffffff;">
<center style="width:100%;">
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
      <td class="email-bg" style="background-color:#ffffff; padding:24px 0 0 0;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width:600px; width:100%; margin:0 auto;">

          <!-- Header -->
          <tr>
            <td style="background-color:#424a4d; padding:24px 32px; border-radius:6px;">
              <span style="font-family:monospace; font-size:20px; font-weight:bold; color:#ffffff;">
                <font color="#fb923c">[</font>web<font color="#fb923c">]</font>work<br>Neue Kontaktanfrage
              </span>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="email-body" style="background-color:#ffffff; padding:32px; color:#333333;">

              <!-- Name + E-Mail 2-spaltig -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                <tr>
                  <td width="50%" style="vertical-align:top; padding-right:16px;">
                    <p class="label" style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:#999999; margin:0 0 4px 0;">Name</p>
                    <p class="email-text" style="margin:0; color:#333333;">{{ $data['name'] }}</p>
                  </td>
                  <td width="50%" style="vertical-align:top;">
                    <p class="label" style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:#999999; margin:0 0 4px 0;">E-Mail</p>
                    <p style="margin:0;"><a href="mailto:{{ $data['email'] }}" style="color:#fb923c; text-decoration:none;">{{ $data['email'] }}</a></p>
                  </td>
                </tr>
              </table>

              <!-- Nachricht -->
              <p class="label" style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:#999999; margin:20px 0 8px 0;">Nachricht</p>
              <div class="msg-box" style="background-color:#efefef; padding:16px; border-radius:6px; white-space:pre-wrap; font-size:14px; line-height:1.5;">{{ $data['message'] }}</div>

            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</center>
</body>
</html>
