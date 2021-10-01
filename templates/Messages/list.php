
<!-- MAIN SECTION -->
<section id="section_1" class="section-1" style="min-height:70vh;">

    <!-- HEADING CONTAINER -->
    <div id="heading_container" style="margin-top:130px;">

          <?= $this->Flash->render() ?>
          <table class="table thead-light" style="width:100%">
            <thead>
              <tr>
                <th scope="col">Time</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Message</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($messages as $m): ?>
              <tr>
                <td><?=date('d M y, H:i:s',strtotime($m['created_time']))?>
                </td>
                <td><?=$m['from_first_name'].' '.$m['from_last_name']?>
                </td>
                <td><?=$m['to_first_name'].' '. $m['to_last_name']?>
                </td>
                <td><?=$m['message_content']?>
                </td>
                <td>
                  <?php
                  if ($m['is_new']):
                    echo "<span class='badge badge-pill badge-light'>Unread</span>";
                  endif;
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
            <?php if (empty($messages)): ?>
              <tr> You have no messages.
              </td>
            <?php endif; ?>
            </tbody>
          </table>
    </div>
  </section>
