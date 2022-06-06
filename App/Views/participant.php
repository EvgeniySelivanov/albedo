<div class="container mt-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Field</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>
     

    <?php foreach($participants as $participant):
      if($participant->filename)
       {$src='small_'.$participant->filename;}
       else
       {$src='template/photo.jpg';}?>
        <tr>
          <th scope="row">Photo</th>
          <td colspan="2"><img src="upload/<?php echo $src?>" alt="hello"></td>
          
        </tr>
        <tr>
          <th scope="row">Full name</th>
          <td><?=$participant->fname.' '.$participant->lname?></td>
         
        </tr>
        <tr>
          <th scope="row">Report subject</th>
          <td colspan="2"><?=$participant->reportSubject?></td>
          
        </tr>
        <tr>
          <th scope="row">Email</th>
          <td colspan="2"><a href="mailto:<?=$participant->email?>"><?=$participant->email?></a></td>
        </tr>
        <?php endforeach?> 
      </tbody>
    </table>
</div>