<?php
use Cake\Core\Configure;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?=Configure::read('Domain.name')?> - Welcome to <?=Configure::read('Domain.name')?></title>
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
                    Hi <?=!empty($user['first_name']) ? $user['first_name'].' '.$user['last_name'] : 'there'?>,
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Congraduations! You have created an account successfully. </p>
                    <p>

                    </p>
                  </td>
                </tr>
                <tr>
                  <td>If you have anything, please drop a message on our website.
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
