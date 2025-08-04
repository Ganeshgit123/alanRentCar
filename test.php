<?php

//index.php

include('product_ajax_for_invoice.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br />
    <div class="container">
      <h3 align="center"></h3>
      <br />
      <h4 align="center">Enter Item Details</h4>
      <br />
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <span id="error"></span>
          <input type="text" name="nametext" id="nameid">
          <table class="table table-bordered" id="item_table">
            <thead>
              <tr>
                <th>Enter Item Name</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Insert" />
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
<script>
    $(document).ready(function(){
      
      var count = 0;

      $(document).on('click', '.add', function(){
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
        html += '<td><select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value="">Select Category</option><?php  fill_select_box(); ?></select></td>';
        // html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category'+count+'"><option value="">Select Sub Category</option></select></td>';
          html += '<td><input type="text" id="item_sub_category" name="item_sub_category[]" class="form-control item_name" /></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        $('tbody').append(html);
      });

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

      $(document).on('change', '.item_category', function(){

        var category_id = $(this).val();
         // alert ("sdsd"+category_id);
        var sub_category_id = $(this).data('sub_category_id');
        $.ajax({
          url:"product_description_for_invoice.php",
          method:"POST",
          data:{category_id:category_id},
          success:function(data)
          {
            // alert(data);
            // var html =  data;
          $('#item_sub_category').val(data);
          }
        })
      });

      $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';
        $('.item_name').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Enter Item name at '+count+' Row</p>';
            return false;
          }
          count = count + 1;
        });
        $('#nameid').each(function(){
        
          if($(this).val() == '')
          {
            error += '<p>Enter Item sdfsrdgdfhRow</p>';
            return false;
          }
         
        });

        $('.item_category').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item Category at '+count+' row</p>';
            return false;
          }

          count = count + 1;

        });

        $('.item_sub_category').each(function(){

          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item Sub category '+count+' Row</p> ';
            return false;
          }

          count = count + 1;

        });

        var form_data = $(this).serialize();

        if(error == '')
        {
          $.ajax({
            url:"insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
              if(data == 'ok')
              {
                $('#item_table').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
              }
            }
          });
        }
        else
        {
          $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }

      });
      
    });
</script>
