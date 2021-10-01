<?php
use Cake\Core\Configure;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?=Configure::read('Domain.name')?> - Appointment Request Received on <?=Configure::read('Domain.name')?></title>
</head>
<body>

    <table width="100%" style="background:#F6F6F6;">
      <tbody>
        <tr>
          <td align="center" style="padding: 60px 15px 30px;">
            <table width="100%" style="background:#FFFFFF;max-width: 600px;padding:5px;">
              <tbody>
                <tr>
                  <td align="center" style="padding: 20px 0 0;">
                    <h3><?=Configure::read('Domain.name')?></h3>
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px 4% 20px 0; font-size: 14px; line-height:1.5;">
                    Hi <?=!empty($appt['student_first_name']) ? $appt['student_first_name'].' '.$appt['student_last_name'] : 'there'?>,
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Your appointment request has been <?=!empty($flag) ? 'accepted' : 'declined'?> by <?=empty($appt['Tutor']['first_name']) ? "the tutor": $appt['Tutor']['first_name']?>. Please login to view it ASAP</p>
                    <p>
                      <a style="display:inline-block;color:white;background-color: #d19200; font-size:1.2rem;padding:3px;width: 80px;text-align:center;text-decoration:none;border-radius:20px;"
                       href="<?=Configure::read('Domain.url').'login'?>">Login</a>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    &nbsp;
                  </td>
                </tr>
                <tr>
                  <td>
                    Customer Service @ <?=Configure::read('Domain.name')?>
                  </td>
                </tr>
                <tr>
                  <td>
                    &nbsp;
                  </td>
                </tr>
                <tr>
                  <td>
                    &nbsp;
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>

          <td align="center" style="padding-bottom:40px; color: #909090;">

              <p><?=Configure::read('Domain.company_name')?></p>
              <p></p>
          </td>
        </tr>
      </tbody>
    </table>

</body>
</html>
