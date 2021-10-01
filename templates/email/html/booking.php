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
                    Hi <?=!empty($tutorUser['first_name']) ? $tutorUser['first_name'].' '.$tutorUser['last_name'] : 'there'?>,
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>You just received an appointment request from <?=empty($user['first_name']) ? "a student": $user['first_name']?>. Please click a button to accept or decline it ASAP</p>
                    <p>
                      <a style="display:inline-block;color:white;background-color: #00d100; font-size:1.2rem;padding:3px;width: 80px;text-align:center;text-decoration:none;border-radius:20px;"
                       href="<?=Configure::read('Domain.url').'appointments/accept/'.base64_encode($appt['appointment_id'])?>">Accept</a> &nbsp;&nbsp;&nbsp;<a style="display:inline-block;color:white;background-color: #fc2003; font-size:1.2rem;padding:3px;width: 80px;text-align:center;text-decoration:none;border-radius:20px;"
                       href="<?=Configure::read('Domain.url').'appointments/decline/'.base64_encode($appt['appointment_id'])?>">Decline</a>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><b>Appointment Details:</b></td>
                </tr>
                <tr>
                  <td>
                    <dt>Time:</dt><dd><?=date('d M Y, H:s', strtotime($appt['appt_start_time'])) .' - '.date('d M Y, H:s', strtotime($appt['appt_end_time']))?>  </dd>
                    <dt>Unit:</dt><dd><?=$unit['unit_code'].' '. $unit['unit_name'] .' AU$'. $unit['fees']?></dd>
                    <dt>Note:</dt><dd><?=$content?></dd>
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
