<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>New Booking</title>
</head>

<body style="margin:0; padding:0; background:#f4f4f4; font-family: Arial, sans-serif;">

  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" style="padding:20px;">

        <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border:1px solid #ddd;">

          <!-- Header -->
          <tr>
            <td style="background:#000; color:#fff; padding:15px; text-align:center;">
              <h2 style="margin:0;">New Booking Order</h2>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="padding:20px;">

              <h3 style="margin-bottom:10px;">Customer Details</h3>

              <table width="100%" cellpadding="8" cellspacing="0" border="1" style="border-collapse:collapse;">
                <tr>
                  <td><strong>Name</strong></td>
                  <td>{{ $name }}</td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>{{ $email }}</td>
                </tr>
                <tr>
                  <td><strong>Phone</strong></td>
                  <td>{{ $contact }}</td>
                </tr>
                <tr>
                  <td><strong>Date</strong></td>
                  <td>{{ $date }}</td>
                </tr>
              </table>

              <br>

              <h3 style="margin-bottom:10px;">Services Requested</h3>

              <table width="100%" cellpadding="8" cellspacing="0" border="1" style="border-collapse:collapse;">
                @foreach($services as $service)
                <div>{{ $service }}</div>
                @endforeach
              </table>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background:#f1f1f1; text-align:center; padding:10px; font-size:12px;">
              © {{ date('Y') }} Janta Garage <br>
              This is an automated order email.
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>

</html>