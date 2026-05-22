<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: Arial, sans-serif; font-size: 15px; color: #333; }
    .label { font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #999; margin-bottom: 2px; }
    .value { margin-bottom: 20px; }
    .message { background: #f5f5f5; padding: 16px; border-radius: 6px; white-space: pre-wrap; }
  </style>
</head>
<body>
  <h2 style="color:#fb923c">[web]work oberland – Neue Kontaktanfrage</h2>

  <p class="label">Name</p>
  <p class="value">{{ $data['name'] }}</p>

  <p class="label">E-Mail</p>
  <p class="value"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>

  <p class="label">Nachricht</p>
  <div class="message">{{ $data['message'] }}</div>
</body>
</html>
