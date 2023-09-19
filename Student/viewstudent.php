<title> View Student Details </title>
<html>
    <head>
    <style> 
	a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #04AA6D;
  color: white;
}

.round {
  border-radius: 50%;
}
 body {
    background-image: url('source/background.jpg');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-color: #f0f0f0;
  }
   .container {
    background-image: url('source/background.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
    padding: 20px;
    }
</style>
        <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- JS, Popper.js, and jQuery -->
        <script  src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">    
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
    </head>
    <body>
    
    
    </div>
    </div>
    
   
    <div class="container">
          <p><br />
              
            <br />
          </p>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9"> 
                          <h3>Student Details</h3>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Select Page</span>
                                </div>
                                <select name="pagelist" id="pagelist" class="form-control"></select>
                                <div class="input-group-append">
                                    <span class="input-group-text">of&nbsp;<span id="totalpages"></span></span>

                              </div>
                            </div>
                        </div>
                    </div>
              </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Students' NIC number</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Address</th>  
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Program</th>
                                  
                                </tr>
                            </thead>
                        </table>             
                   </div>
                </div>
          </div>
    </div>
        <div align="right"><br />
          <br />
          
          <?php
        $previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
} ?>
          
          
          <table width="295" border="0">
            <tr>
              <th width="210" scope="row"> <a href="managestudent.php" class="previous">&laquo; Back</a> &nbsp;</th>
              <td width="90">&nbsp;</td>
              </tr>
          </table>
        </div>
    </body>
</html>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
    function load_data(start, length)
    {
        var dataTable = $('#customer_table').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order" : [],
           "retrieve": true,
            "ajax" : {
                url:"viewstudentfetch.php",
                method:"POST",
                data:{start:start, length:length}
            },
            "drawCallback" : function(settings){
                var page_info = dataTable.page.info();
                $('#totalpages').text(page_info.pages);
                var html = '';
                var start = 0;
                var length = page_info.length;
                for(var count = 1; count <= page_info.pages; count++)
                {
                    var page_number = count - 1;
                    html += '<option value="'+page_number+'" data-start="'+start+'" data-length="'+length+'">'+count+'</option>';
                    start = start + page_info.length;
                }
                $('#pagelist').html(html);
                $('#pagelist').val(page_info.page);
            }
        });
    }
    load_data();
    $('#pagelist').change(function(){
        var start = $('#pagelist').find(':selected').data('start');
        var length = $('#pagelist').find(':selected').data('length');
        load_data(start, length);
        var page_number = parseInt($('#pagelist').val());
       var test_table = $('#customer_table').dataTable();
        test_table.fnPageChange(page_number);
    });  
});

</script>