<script>

function showStudentForm()
        {
            var studentForm = document.getElementById("studentForm");
            studentForm.style.display = "block";

            var othersForm = document.getElementById("othersForm");
            othersForm.style.display = "none";
        }
 
        function showOthersForm()
        {
            var studentForm = document.getElementById("studentForm");
            studentForm.style.display = "none";

            var othersForm = document.getElementById("othersForm");
            othersForm.style.display = "block";
        }

$(document).ready(function() {
      setInterval(fetchPendingQueue, 5000);
    });

    function fetchQueue(){
        $.ajax({
            url: 'monitor.php',
            type: 'GET',
            success: function(response){
                $('#span-list').html(response);
            },
            error: function(xhr, status, error){
                console.log('Error: ' + error);
            }
        });
    }

    function loadSecondDropdown() {
        var firstDropdown = document.getElementById("first-dropdown");
        var selectedValue = firstDropdown.value;
        var secondDropdown = document.getElementById("second-dropdown");
        
        secondDropdown.innerHTML = '<option value="">Select an option</option>';
        
        if (selectedValue !== "") {

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "getcategory.php?selectedValue=" + selectedValue, true);
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var options = JSON.parse(xhr.responseText);
                    
                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement("option");
                        option.value = options[i].value;
                        option.textContent = options[i].label;
                        secondDropdown.appendChild(option);
                    }
                }
            };
            
            xhr.send();
        }
    }
    function loadSecondDropdownOther() {
        var firstDropdown = document.getElementById("first-dropdown-other");
        var selectedValue = firstDropdown.value;
        var secondDropdown = document.getElementById("second-dropdown-other");
        
        secondDropdown.innerHTML = '<option value="">Select an option</option>';
        
        if (selectedValue !== "") {

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "getcategory.php?selectedValue=" + selectedValue, true);
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var options = JSON.parse(xhr.responseText);
                    
                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement("option");
                        option.value = options[i].value;
                        option.textContent = options[i].label;
                        secondDropdown.appendChild(option);
                    }
                }
            };
            
            xhr.send();
        }
    }

    function fetchPendingQueue() {
      $.ajax({
        url: 'monitor.php',
        type: 'GET',
        success: function(response) {
          $('#pendingQueue').html(response);
        },
        error: function(xhr, status, error) {
          console.log('Error: ' + error);
        }
      });
    }

  $("#btn-next").click(function(){
    $.ajax({
     type: "GET",
     url: "next-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
       alert(msg)
     }
    })
  })

  $("#btn-recall").click(function(){
    $.ajax({
     type: "GET",
     url: "recall-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
     }
    })
  })

  $("#btn-update").click(function(){
    $.ajax({
     type: "GET",
     url: "update-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
     }
    })
  })

  $("#btn-cancel").click(function(){
    $.ajax({
     type: "GET",
     url: "cancel-queue.php",
     success: function(msg){
       $("#span-list").html(msg);
     }
    })
  })

  function notify(){
    var audio = document.getElementById("notification");
    audio.play();
  }
  
</script>