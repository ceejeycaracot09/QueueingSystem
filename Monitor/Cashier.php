
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>
  <div id="pendingQueue">
  <span id="span-list">

<script>
    $(document).ready(function() {
      setInterval(fetchPendingQueue, 5000);
    });

    function fetchQueue(){
        $.ajax({
            url: 'cashier-queue.php',
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
        url: 'cashier-queue.php',
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

