<?php $this->load->view('defaults/header'); ?>

<div class="container my-4">
  <h1>
    <a href="<?php echo site_url('spamadmin'); ?>">Spamadmin</a> - Blacklist
  </h1>

  <?php if (!empty($blocked_ips)) { ?>
    <table class="recent table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">IP range</th>
          <th scope="col">Blocked</th>
          <th scope="col">Spam attempts</th>
          <th scope="col">Unblock IP</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($blocked_ips as $ip_address) {
            $ip = explode('.', $ip_address['ip_address']);
            $ip_firstpart = $ip[0] . '.' . $ip[1] . '.';
            $ip_range = $ip_firstpart . '*.*';
        ?>
          <tr>
            <td><?php echo $ip_range; ?></td>
            <td>
              <?php 
                $p = explode(",", timespan($ip_address['blocked_at'], time())); 
                echo $p[0]; 
              ?> ago.
            </td>
            <td><?php echo $ip_address['spam_attempts']; ?></td>
            <td>
              <a href="<?php echo site_url('spamadmin/blacklist/unblock/' . $ip_address['ip_address']) ?>" class="btn btn-success">
                Unblock
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <p>No IP ranges blocked.</p>
  <?php } ?>

  <?php echo $pages; ?>
</div>

<?php $this->load->view('defaults/footer'); ?>
