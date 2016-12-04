<?php foreach ($messageList as $value):?>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">
    <h5 class="list-group-item-heading"> <?php echo '<b>'.$value['dateMessage'].'</b>' ?> - <?php echo $value['pseudo'] ?></h5>
    <p class="list-group-item-text"> <?php echo $value['message'] ?></p>
  </a>
</div>
<?php endforeach;
