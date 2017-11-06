<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script type="text/javascript">
	 $("#license").submit(function(event){
        
    event.preventDefault(); 
        if($('#user').val()=="")
            {
            $('html, body').animate({ scrollTop: 0 }, 'fast');
            $("#error").addClass("text-danger");
            $('#error').html(" Please supply with user email");
            $('.form-group').addClass("has-error");
            }
        else{//prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data
    }).done(function(response){
       //
        c=response.trim();
        if(c=="login successfull..!!")
            {
            $('html, body').animate({ scrollTop: 0 }, 'fast');
            $('#message').removeClass("bg-danger");
            $('#message').addClass("bg-success");
            $('#message').fadeIn("slow");
            $("#message").html(response);
            $('#message').fadeOut(3000);
        window.location.replace("dashboard.php");
            }
                else
                    {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        $('#message').fadeIn("slow");
        $('#message').html("checking....");
        $("#message").html(response);
                    }
        clearInput();
    });
        }
});
</script>
</body>
    </head>
</html>