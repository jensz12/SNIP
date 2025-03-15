<?php $this->load->view('defaults/header'); ?>

<div class="container my-4">
  <h1>Spamadmin</h1>
  <p>
    <?php echo $total_spam_attempts; ?> spam-pastes repelled. 
    <a href="<?php echo site_url('spamadmin/blacklist'); ?>">View blocked IPs</a>.
  </p>

  <?php if (!empty($pastes)) { ?>
    <table class="recent table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Name</th>
          <th scope="col">When</th>
          <th scope="col">IP</th>
          <th scope="col">Delete</th>
          <th scope="col" title="Quick remove" class="d-none">X</th>
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
            <td>
              <?php $p = explode(",", timespan($paste['created'], time())); echo $p[0]; ?> ago.
            </td>
            <td>
              <a href="<?php echo site_url('spamadmin/' . $paste['ip_address']) ?>" target="_blank" title="View all items related to this IP">
                <?php echo $paste['ip_address']; ?>
              </a>
            </td>
            <td>
              <a href="<?php echo site_url("spamadmin/del/".$paste['pid']); ?>" title="Delete this item">
                <?php echo $paste['pid']; ?>
              </a>
            </td>
            <td class="d-none">
              <a class="quick_remove" title="Quickly remove all entries with this IP & block the IP range" data-ip="<?php echo $paste['ip_address']; ?>" href="">
                X
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <form action="" method="post">
      <h2 class="confirm_title visually-hidden">Confirm deletion of the following pastes:</h2>
      <div class="paste_deletestack"></div>
      <input type="hidden" name="pastes_to_delete" />
      <input type="submit" name="delete_pastes" value="Delete selected pastes" class="btn btn-primary visually-hidden" />
    </form>

  <?php } else { ?>
    <p><?php echo lang('paste_missing'); ?> :(</p>
  <?php } ?>

  <?php echo $pages; ?>
</div>

<?php $this->load->view('defaults/footer'); ?>
