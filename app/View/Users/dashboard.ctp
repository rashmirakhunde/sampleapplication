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
    <form method="post" name="student" action="assignmanager">
    <input type="hidden" id="studentid" name="data[Student][id]" value="">
    <h2></h2><br>
   
    <label>Select Manager</label>
    <select id="manager" name="data[Student][manager]">
           <option value="">Select Manager</option>
           <?php foreach($managerInfo as $managerInfos) { ?>
           <option value="<?php echo $managerInfos['User']['name']; ?>"><?php echo $managerInfos['User']['name']; ?></option>
           <?php } ?>
    </select>
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
    /*function saveInfo()
    {
      var manager = $( "#manager" ).val();
      var studentId = $("#studentid").html(); 
      $.ajax({
               url: "<?php echo $this->webroot; ?>/users/assignmanager", 
               dataType: "json",
               contentType: "application/json",
               type: "POST",
               data: { manager: manager , studentId: studentId},
               success: function(result){
                alert("hi");
                return false;   
               }
             });
    }*/

  </script>

