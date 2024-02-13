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
    
</script>