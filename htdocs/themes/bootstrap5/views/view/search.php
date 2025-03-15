<form action="<?php echo site_url('lists'); ?>" class="mb-0">
    <?php
        $searchValue = $this->input->get('search');
        $encodedSearch = $searchValue !== null ? htmlspecialchars($searchValue, ENT_QUOTES, 'UTF-8') : '';
    ?>
    <input id="search" name="search" type="text" class="form-control" placeholder="Search..." value="<?php echo $encodedSearch; ?>">
</form>
