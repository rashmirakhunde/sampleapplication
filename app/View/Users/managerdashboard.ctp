<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <table class="table">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Phone No</th>
        <th>Resume</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($studentInfo as $studentInfos) { 
      $studId= $studentInfos['Student']['id']; 
      $studName= $studentInfos['Student']['name']; 
      ?>
      <tr>
        <td><a onclick='showPopup("<?php echo $studId; ?>","<?php echo $studName; ?>")' href="#"><?php echo $studentInfos['Student']['name']; ?></a></td>
        <td><?php echo $studentInfos['Student']['phone_no']; ?></td>
        <td><a href="<?php echo $studentInfos['Student']['resume']; ?>">Resume</a></td>
      </tr>
      <?php } ?>
     
    </tbody>
  </table>

  <div class="display" id="display" style="display:none">
    <form method="post" name="student" action="scheduleinterview">
    <input type="hidden" id="studentid" name="data[Student][id]" value="">
    <h2></h2><br>
   
    <label>Status</label>
    <input type="radio" name="data[Student][status]" value="Shortlist">Shortlisted
    <input type="radio" name="data[Student][status]" value="Rejected">Rejected
    <br>

    <label>Enter date</label>
    <input type="text" name="data[Student][date]" value=""/>

    <label>Enter time</label>
    <input type="text" name="data[Student][time]" value=""/>

    <input type="submit" id="save" value="Save">
  </form>
  </div>  

  <script type="text/javascript">
    function showPopup(studid,studname)
    {
      $("#display").css('display','block');
      $("#display h2").html(studname);
      $("#display #studentid").val(studid);
    }
  
  </script>

