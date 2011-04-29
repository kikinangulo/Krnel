<?php include 'templates/header.php'; ?>
  <h1 id="hi" onclick="ajax.appendSecrets();"><?php echo $this->view_data['hello']; ?></h1>
  <div id="appendHere">
    <?php for($i=0;$i<=100;$i++): ?>
    <p>holaaaaaaaaa</p>
    <?php endfor; ?>
  </div>
  <h1 id="hi" onclick="ajax.appendSecrets();"><?php echo $this->view_data['hello']; ?></h1>
<?php include 'templates/footer.php'; ?>