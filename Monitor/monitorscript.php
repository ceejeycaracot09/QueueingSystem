<body>
    <div class = "container">
  <h1>Pending Queue Monitor</h1>

<script>
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
  </script>

