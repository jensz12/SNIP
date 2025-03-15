<?php $this->load->view('defaults/header'); ?>

<div class="container my-4">
  <h1>
    <a href="<?php echo site_url('spamadmin'); ?>">Spamadmin</a> - Pastes for IP 
    <a target="_blank" rel="noreferrer" title="Check IP" href="https://tools.keycdn.com/geo?host=<?php echo $ip_address; ?>">
      <?php echo $ip_address; ?>
    </a>
  </h1>

  <form action="" method="post" class="mb-4">
    <div class="row g-3 align-items-center">
      <div class="col-auto">
        <input type="submit" name="confirm_remove" value="Remove all pastes below" class="btn btn-danger" />
      </div>
      <div class="col-auto">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="block_ip" name="block_ip" value="1" checked />
          <label class="form-check-label" for="block_ip">
            Block IP range <span class="text-muted">(<?php echo $ip_range; ?>)</span>
          </label>
        </div>
      </div>
    </div>
  </form>

  <?php
  if (!empty($pastes)) { ?>
    <table class="recent table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Name</th>
          <th scope="col">Language</th>
          <th scope="col">When</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pastes as $paste) { ?>
          <tr>
            <td>
              <a href="<?php echo site_url("view/".$paste['pid']); ?>" target="_blank">
                <?php echo $paste['title']; ?>
              </a>
            </td>
            <td><?php echo $paste['name']; ?></td>
            <td><?php echo $paste['lang']; ?></td>
            <td>
              <?php $p = explode(",", timespan($paste['created'], time())); echo $p[0]; ?> ago.
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <p class="alert alert-info"><?php echo lang('paste_missing'); ?> :(</p>
  <?php } ?>

  <?php echo $pages; ?>
</div>

<?php $this->load->view('defaults/footer'); ?>
