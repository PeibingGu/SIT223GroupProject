
<!-- MAIN SECTION -->
<section id="section_1" class="section-1" style="min-height:70vh;">

    <!-- HEADING CONTAINER -->
    <div id="heading_container" style="margin-top:130px;">

          <?= $this->Flash->render() ?>
          <table class="table thead-light" style="width:100%">
            <thead>
              <tr>
                <th scope="col">Time</th>
                <th scope="col">Student</th>
                <th scope="col">Tutor</th>
                <th scope="col">Appointment Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($appts as $appt): ?>
              <tr>
                <td><?=date('d M y, Ha',strtotime($appt['appt_start_time'])).' - '. date('d M y, Ha',strtotime($appt['appt_end_time']))?>
                </td>
                <td><?=$appt['student_first_name'].' '.$appt['student_last_name']?>
                </td>
                <td><?=$appt['tutor_first_name'].' '. $appt['tutor_last_name']?>
                </td>
                <td><?=$appt['status']?>
                </td>
                <td>
                  <?php
                    if ($appt['student_user_id'] == $user['user_id']):
                      if ($appt['status'] == 'Completed' && !empty($appt['stars']))
                      {
                        echo "<a class='btn btn-sm btn-warning' href='/appointments/view-rating/".base64_encode($appt['appointment_id'])."'>Write a Review&Rating</a>";
                      } elseif ($appt['status'] == 'Completed' && empty($appt['stars']))
                      {
                        echo "<a class='btn btn-sm btn-warning' href='/appointments/rating/".base64_encode($appt['appointment_id'])."'>Write a Review&Rating</a>";
                      } else {

                      }
                     elseif ($appt['tutor_user_id'] == $user['user_id']):
                       if ($appt['status'] == 'Requested')
                       {
                          echo "<a class='btn btn-sm btn-success mx-2' href='/appointments/accept/".base64_encode($appt['appointment_id'])."'>Accept</a>";

                          echo "<a class='btn btn-sm btn-warning mx-2' href='/appointments/decline/".base64_encode($appt['appointment_id'])."'>Decline</a>";

                       }elseif ($appt['status'] == 'Approved')
                       {
                         echo "<a class='btn btn-sm btn-success' href='/appointments/complete/".base64_encode($appt['appointment_id'])."'>Mark it 'Completed'</a>";
                       } else {

                       }
                    endif;
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
            <?php if (empty($appts)): ?>
              <tr> You have no appointments.
              </td>
            <?php endif; ?>
            </tbody>
          </table>
    </div>
  </section>
