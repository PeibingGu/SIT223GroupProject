
<!-- MAIN SECTION -->
<section id="section_1" class="section-1" style="min-height: 70vh;">

    <!-- HEADING CONTAINER -->
    <div id="heading_container" style="margin-top:130px;">

          <?= $this->Flash->render() ?>
        <?php if (empty($errors)): ?>
            <h3 class="text-danger">You just declined the appointment. </h3>
            <p>We will inform the student shortly.
            </p>
        <?php else: ?>
          <?php foreach ($errors as $error): ?>
            <div class="alert message text-danger"><?=$error?></div>
          <?php endforeach; ?>
        <?php endif; ?>
  </div>
</section>
